<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Clustering\KMeans;
use Phpml\Math\Distance\Euclidean;
use App\Models\SurveyEntry;
use Illuminate\Support\Facades\DB;
use Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $participants = SurveyEntry::all();
        $average = SurveyEntry::avg('finalAvg');

        $registered = SurveyEntry::Where('registeredvoter', 1)->get();
        $notregistered = SurveyEntry::Where('registeredvoter', 0)->get();

        $q_average = DB::table('survey_entries')
                     ->select(
                        DB::raw('round(AVG(C1),1) as Q1'), DB::raw('round(AVG(C2),1) as Q2'), DB::raw('round(AVG(C3),1) as Q3'),
                        DB::raw('round(AVG(C4),1) as Q4'), DB::raw('round(AVG(C5),1) as Q5'), DB::raw('round(AVG(C6),1) as Q6'),
                        DB::raw('round(AVG(C7),1) as Q7'), DB::raw('round(AVG(UC1),1) as Q8'), DB::raw('round(AVG(UC2),1) as Q9'),
                        DB::raw('round(AVG(UC3),1) as Q10'), DB::raw('round(AVG(UC4),1) as Q11'), DB::raw('round(AVG(UC5),1) as Q12'),
                        DB::raw('round(AVG(UC6),1) as Q13'), DB::raw('round(AVG(KS1),1) as Q14'), DB::raw('round(AVG(KS2),1) as Q15'),
                        DB::raw('round(AVG(KS3),1) as Q16'), DB::raw('round(AVG(IP1),1) as Q17'), DB::raw('round(AVG(IP2),1) as Q18')
                    )->get();

    	return view('dashboard', [
    		'participants' => $participants,
            'average' => round($average, 2),
            'registered' => $registered,
            'notregistered' => $notregistered,
            'questions' => $this->getQuestions(),
            'q_values' => json_encode($q_average),
    	]);
    }

    public function participants()
    {
        $participants = SurveyEntry::all();

        $gender = DB::table('survey_entries')->select('gender', DB::raw("COUNT(*) as gender_count"))->groupby('gender')->get();
        $gender_label = json_decode(json_encode($gender->pluck('gender')), true);
        $gender_count = json_decode(json_encode($gender->pluck('gender_count')), true);

        $brgy = DB::table('survey_entries')->select('barangay', DB::raw("COUNT(*) as barangay_count"))->groupby('barangay')->get();
        $brgy_label = json_decode(json_encode($brgy->pluck('barangay')), true);
        $brgy_count = json_decode(json_encode($brgy->pluck('barangay_count')), true);

        return view('participants', [
            'participants' => $participants,
            'gender_label' => json_encode($gender_label),
            'gender_count' => json_encode($gender_count),
            'brgy_label' => json_encode($brgy_label),
            'brgy_count' => json_encode($brgy_count)
        ]);
    }

    public function analysis(Request $request)
    {
        if(is_null($request->col1)) $col1 = 'age';
        else $col1 = $request->col1;

        if(is_null($request->col2)) $col2 = 'finalAvg';
        else $col2 = $request->col2;

        if(is_null($request->k)) $k = 2;
        else $k = $request->k;

        $resultSet = $this->getData($col1, $col2);

        // Getting the best K (1-10) using SSE (Error Sum of Squares)
        $sse = array();
        for ($i=1; $i<=10; $i++) {
            $clusterer = new KMeans($i);
            $clusters = $clusterer->cluster($resultSet);
            $centronoids = $clusterer->centronoids();

            $sum = 0;
            foreach ($centronoids as $key => $centronoid) {
                $sum += $this->squaredDistance($centronoid, $clusters[$key]);
            }

            array_push($sse, $sum);
        }

        // By default: K is 2
        $clusterer = new KMeans($k);
        $clusters = $clusterer->cluster($resultSet);

        $formattedClusters = array();
        $clusterDemographics = array();
        $demographicAnalysis = array();
        foreach ($clusters as $key => $value) {
            array_push($formattedClusters, $this->formatClusters($value));
            array_push($clusterDemographics, $this->getClusterDemographics($value));
            array_push($demographicAnalysis, $this->demographicAnalysis($value));
        }

        return view('analysis', [
            'col1' => $col1,
            'col2' => $col2,
            'k' => $k,
            'sse_arr' => $sse,
            'sse' => json_encode($sse),
            'clusters' => json_encode($formattedClusters),
            'clusterDemographics' => json_encode($clusterDemographics),
            'demographicAnalysis' => $demographicAnalysis,
            'filters' => $this->getColumns()
        ]);
    }

    // Additional Functions
    public function demographicAnalysis($cluster) {
        $analysis = array();
        $categories = array();

        $id = array_keys($cluster);
        $analysis['total'] = count($id);

        $young = DB::table('survey_entries')
                    ->select(DB::raw("COUNT(*) as count"))
                    ->where('age', '>=', 18)
                    ->where('age', '<=', 29)
                    ->whereIn('id', $id)
                    ->first();

        $young_2 = DB::table('survey_entries')
                    ->select(DB::raw("COUNT(*) as count"))
                    ->where('age', '>=', 30)
                    ->where('age', '<=', 39)
                    ->whereIn('id', $id)
                    ->first();

        $middle = DB::table('survey_entries')
                    ->select(DB::raw("COUNT(*) as count"))
                    ->where('age', '>=', 40)
                    ->where('age', '<=', 59)
                    ->whereIn('id', $id)
                    ->first();

        $old = DB::table('survey_entries')
                    ->select(DB::raw("COUNT(*) as count"))
                    ->where('age', '>=', 60)
                    ->where('age', '<=', 99)
                    ->whereIn('id', $id)
                    ->first();

        $analysis['age'] = [
            'young' => $young->count,
            'young_2' => $young_2->count,
            'middle' => $middle->count,
            'old' => $old->count
        ];

        $age_group = [
            'young' => $young->count,
            'young_2' => $young_2->count,
            'middle' => $middle->count,
            'old' => $old->count
        ];

        $analysis['max_age']  = array_search(max($age_group), $age_group);

        $gender_female = DB::table('survey_entries')
                    ->select('gender', DB::raw("COUNT(*) as count"))
                    ->groupby('gender')
                    ->whereIn('id', $id)
                    ->where('gender', 'Female')
                    ->first();

        $gender_male = DB::table('survey_entries')
                    ->select('gender', DB::raw("COUNT(*) as count"))
                    ->groupby('gender')
                    ->whereIn('id', $id)
                    ->where('gender', 'Male')
                    ->first();

        $analysis['gender'] = [
            'Female' => $gender_female->count,
            'Male' => $gender_male->count
        ];

        $barangay = DB::table('survey_entries')
                    ->select('barangay', DB::raw("COUNT(*) as count"))
                    ->groupby('barangay')
                    ->whereIn('id', $id)
                    ->get();

        $arr = array();
        foreach ($barangay as $key => $value) {
            $arr[$value->barangay] = $value->count;
        }

        $analysis['barangay'] = $arr;

        $c_average = DB::table('survey_entries')
                    ->select(DB::raw("round(AVG(C_Score),1) as average"))
                    ->whereIn('id', $id)
                    ->first();
        
        $analysis['c_average'] = $c_average->average;
        $categories['c_average'] = $c_average->average;

        $uc_average = DB::table('survey_entries')
                    ->select(DB::raw("round(AVG(UC_Score),1) as average"))
                    ->whereIn('id', $id)
                    ->first();
        
        $analysis['uc_average'] = $uc_average->average;
        $categories['uc_average'] = $uc_average->average;

        $ks_average = DB::table('survey_entries')
                    ->select(DB::raw("round(AVG(KS_Score),1) as average"))
                    ->whereIn('id', $id)
                    ->first();
        
        $analysis['ks_average'] = $ks_average->average;
        $categories['ks_average'] = $ks_average->average;

        $ip_average = DB::table('survey_entries')
                    ->select(DB::raw("round(AVG(IP_Score),1) as average"))
                    ->whereIn('id', $id)
                    ->first();
        
        $analysis['ip_average'] = $ip_average->average;
        $categories['ip_average'] = $ip_average->average;

        $final = DB::table('survey_entries')
                    ->select(DB::raw("round(AVG(finalAvg),1) as average"))
                    ->whereIn('id', $id)
                    ->first();
        
        $analysis['final'] = $final->average;

        $analysis['min_category']  = array_search(min($categories), $categories);
        $analysis['max_category']  = array_search(max($categories), $categories);

        return $analysis;
    }

    public function getData($col1, $col2) {
        $resultSet = DB::table('survey_entries')->select('id', $col1, $col2)->get();
        $id = json_decode(json_encode($resultSet->pluck('id')), true);
        $col1_res = json_decode(json_encode($resultSet->pluck($col1)), true);
        $col2_res = json_decode(json_encode($resultSet->pluck($col2)), true);
        $resultSet = $this->combineArray($id, $col1_res, $col2_res, count($resultSet));

        return $resultSet;
    }

    public function formatClusters($cluster)
    {
        $c = array();
        foreach ($cluster as $key => $value) {
            array_push($c, array('x' => $value[0], 'y' => $value[1], 'r' => 10));
        }

        return $c;
    }

    public function getClusterDemographics($cluster)
    {
        $c = array();
        foreach ($cluster as $key => $value) {
            $p = SurveyEntry::Where('id', $key)->first();
            array_push($c, array(
                'age' => $p->age, 
                'gender' => $p->gender, 
                'barangay' => $p->barangay,
                'registeredvoter' => $p->registeredvoter,
                'C_Score' => $p->C_Score,
                'UC_Score' => $p->UC_Score,
                'KS_Score' => $p->KS_Score,
                'IP_Score' => $p->IP_Score,
                'finalAvg' => $p->finalAvg
            ));
        }

        return $c;
    }

    public function combineArray($label, $arr1, $arr2, $count)
    {
        $arr = array();

        for($i = 0; $i < $count; $i++) {
            $arr[$label[$i]] = array($arr1[$i], $arr2[$i]);
        }

        return $arr;
    }

    public function squaredDistance(array $center, array $cluster): float
    {
        $sum = 0;
        $metric = new Euclidean();
        foreach ($cluster as $point) {
            $sum += $metric->sqDistance($center, $point);
        }

        return $sum;
    }

    public function getQuestions()
    {
        return [
            ['id' => 'Q1', 'question' => 'I work for a political party or candidates during elections'],
            ['id' => 'Q2', 'question' => 'I attend political meetings'],
            ['id' => 'Q3','question' => 'I am/was a member of a political party'],
            ['id' => 'Q4', 'question' => 'I always vote in elections'],
            ['id' => 'Q5', 'question' => 'I attend political rallies'],
            ['id' => 'Q6', 'question' => 'I discuss about Politics with my friends, relatives and Colleagues'],
            ['id' => 'Q7', 'question' => 'I participate actively to solve the community problems'],
            ['id' => 'Q8', 'question' => 'I take part in strikes to influence government'],
            ['id' => 'Q9', 'question' => 'I file petitions against the government'],
            ['id' => 'Q10', 'question' => 'I refuse to pay government rent and taxes to influence government decisions'],
            ['id' => 'Q11', 'question' => 'I take part in blockades to influence government'],
            ['id' => 'Q12', 'question' => 'I take part in demonstration to influence government'],
            ['id' => 'Q13', 'question' => 'I take part in boycotts to influence government'],
            ['id' => 'Q14', 'question' => 'I use electronic media (TV/Radio) to know about politics'],
            ['id' => 'Q15', 'question' => 'I search on internet about politics'],
            ['id' => 'Q16', 'question' => 'I read about politics in Print Media (Newspapers/Magazines etc.)'],
            ['id' => 'Q17', 'question' => 'I try to influence my friends, relatives and colleagues on formation of political opinion'],
            ['id' => 'Q18', 'question' => 'I try to convince my friends, relatives and colleagues to vote']
        ];
    }

    public function getColumns()
    {
        return [
            ['id' => 'age', 'text' => 'Age'],
            ['id' => 'registeredvoter', 'text' => 'Is Registered Voter?'],
            ['id' => 'C_Score', 'text' => 'Conventional Type Score'],
            ['id' => 'UC_Score', 'text' => 'Unconventional Type Score'],
            ['id' => 'KS_Score', 'text' => 'Knowledge Seeking Type Score'],
            ['id' => 'IP_Score', 'text' => 'Influential Type Score'],
            ['id' => 'finalAvg', 'text' => 'Total Average Score'],
        ];
    }
}
