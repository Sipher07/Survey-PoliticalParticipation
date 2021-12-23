<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Clustering\KMeans;
use App\Models\SurveyEntry;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {


        $gender = DB::table('survey_entries')->select(DB::raw("AVE(finalAvg) as gender_count"))->get();
        $gender_label = json_decode(json_encode($gender->pluck('gender')), true);
        $gender_count = json_decode(json_encode($gender->pluck('gender_count')), true);

        $brgy = DB::table('survey_entries')->select('barangay', DB::raw("COUNT(*) as barangay_count"))->groupby('barangay')->get();
        $brgy_label = json_decode(json_encode($brgy->pluck('barangay')), true);
        $brgy_count = json_decode(json_encode($brgy->pluck('barangay_count')), true);

        $K = 3;

        // Get C Score
        $resultSet = DB::table('survey_entries')->select('age', 'C_Score')->get();
        $age = json_decode(json_encode($resultSet->pluck('age')), true);
        $score = json_decode(json_encode($resultSet->pluck('C_Score')), true);
        $resultSet = $this->combineArray($age, $score, count($resultSet));

		$kmeans = new KMeans($K);
		$c_cluster = $kmeans->cluster($resultSet);


        // Get UC Score
        $resultSet = DB::table('survey_entries')->select('age', 'UC_Score')->get();
        $age = json_decode(json_encode($resultSet->pluck('age')), true);
        $score = json_decode(json_encode($resultSet->pluck('UC_Score')), true);
        $resultSet = $this->combineArray($age, $score, count($resultSet));

        $kmeans = new KMeans($K);
        $uc_cluster = $kmeans->cluster($resultSet);

        // Get KS Score
        $resultSet = DB::table('survey_entries')->select('age', 'KS_Score')->get();
        $age = json_decode(json_encode($resultSet->pluck('age')), true);
        $score = json_decode(json_encode($resultSet->pluck('KS_Score')), true);
        $resultSet = $this->combineArray($age, $score, count($resultSet));

        $kmeans = new KMeans($K);
        $ks_cluster = $kmeans->cluster($resultSet);

        // Get IP Score
        $resultSet = DB::table('survey_entries')->select('age', 'IP_Score')->get();
        $age = json_decode(json_encode($resultSet->pluck('age')), true);
        $score = json_decode(json_encode($resultSet->pluck('IP_Score')), true);
        $resultSet = $this->combineArray($age, $score, count($resultSet));

        $kmeans = new KMeans($K);
        $ip_cluster = $kmeans->cluster($resultSet);

        // dd($c_cluster, $uc_cluster, $ks_cluster, $ip_cluster);

    	return view('dashboard', [
    		'c_score' => json_encode($c_cluster),
            'uc_score' => json_encode($uc_cluster),
            'ks_score' => json_encode($ks_cluster),
            'ip_score' => json_encode($ip_cluster),
            'gender_label' => json_encode($gender_label),
            'gender_count' => json_encode($gender_count),
            'brgy_count' => json_encode($brgy_count),
            'brgy_label' => json_encode($brgy_label)
    	]);
    }

    public function combineArray($arr1, $arr2, $count) {
        $arr = array();

        for($i = 0; $i < $count; $i++) {
            array_push($arr, array($arr1[$i], $arr2[$i]));
        }

        return $arr;
    }

    public function participants() {
        return view('participants');
    }
}
