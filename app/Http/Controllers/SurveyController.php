<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurveyEntry;

class SurveyController extends Controller
{
    public function index() {
    	$brgy = ['Alabang', 'Ayala Alabang', 'Bayanan', 'Buli', 'Cupang', 'Poblacion', 'Putatan', 'Sucat', 'Tunasan'];
        $questions = [
            [
                'id' => 'C1',
                'question' => 'I work for a political party or candidates during elections',
            ],
            [
                'id' => 'C2',
                'question' => 'I attend political meetings',
            ],
            [
                'id' => 'C3',
                'question' => 'I am/was a member of a political party',
                
            ],
            [
                'id' => 'C4',
                'question' => 'I always vote in elections',
                
            ],
            [
                'id' => 'C5',
                'question' => 'I attend political rallies',
                
            ],
            [
                'id' => 'C6',
                'question' => 'I discuss about Politics with my friends, relatives and Colleagues',
                
            ],
            [
                'id' => 'C7',
                'question' => 'I participate actively to solve the community problems',
                
            ],
            [
                'id' => 'UC1',
                'question' => 'I take part in strikes to influence government',
                
            ],
            [
                'id' => 'UC2',
                'question' => 'I file petitions against the government',
                
            ],
            [
                'id' => 'UC3',
                'question' => 'I refuse to pay government rent and taxes to influence government decisions',
                
            ],
            [
                'id' => 'UC4',
                'question' => 'I take part in blockades to influence government',
                
            ],
            [
                'id' => 'UC5',
                'question' => 'I take part in demonstration to influence government',
                
            ],
            [
                'id' => 'UC6',
                'question' => 'I take part in boycotts to influence government',
                
            ],
            [
                'id' => 'KS1',
                'question' => 'I use electronic media (TV/Radio) to know about politics',
                
            ],
            [
                'id' => 'KS2',
                'question' => 'I search on internet about politics',
                
            ],
            [
                'id' => 'KS3',
                'question' => 'I read about politics in Print Media (Newspapers/Magazines etc.)',
                
            ],
            [
                'id' => 'IP1',
                'question' => 'I try to influence my friends, relatives and colleagues on formation of political opinion',
                
            ],
            [
                'id' => 'IP2',
                'question' => 'I try to convince my friends, relatives and colleagues to vote',
                
            ],

        ];

        return view('survey', [
            'brgy' => $brgy,
            'questions' => json_encode($questions)
        ]);
    }

    public function submit(Request $request) {
        $entry = new SurveyEntry;
        $entry->name = $request->name;
        $entry->age = $request->age;
        $entry->gender = $request->gender;
        $entry->barangay = $request->barangay;
        $entry->registeredvoter = $request->registeredvoter;
        $entry->votersid = $request->votersid;

        $answers = explode (",", $request->answers);
        $category_result = array();

        $entry->C1 = $answers[0];
        $entry->C2 = $answers[1];
        $entry->C3 = $answers[2];
        $entry->C4 = $answers[3];
        $entry->C5 = $answers[4];
        $entry->C6 = $answers[5];
        $entry->C7 = $answers[6];
        $entry->C_Score = $this->average(array($answers[0], $answers[1], $answers[2], $answers[3], $answers[4], $answers[5], $answers[6]));
        $category_result['C_Score'] = $entry->C_Score;

        $entry->UC1 = $answers[7];
        $entry->UC2 = $answers[8];
        $entry->UC3 = $answers[9];
        $entry->UC4 = $answers[10];
        $entry->UC5 = $answers[11];
        $entry->UC6 = $answers[12];
        $entry->UC_Score = $this->average(array($answers[7], $answers[8], $answers[9], $answers[10], $answers[11], $answers[12]));
        $category_result['UC_Score'] = $entry->UC_Score;

        $entry->KS1 = $answers[13];
        $entry->KS2 = $answers[14];
        $entry->KS3 = $answers[15];
        $entry->KS_Score = $this->average(array($answers[13], $answers[14], $answers[15]));
        $category_result['KS_Score'] = $entry->KS_Score;

        $entry->IP1 = $answers[16];
        $entry->IP2 = $answers[17];
        $entry->IP_Score = $this->average(array($answers[16], $answers[17]));
        $category_result['IP_Score'] = $entry->IP_Score;

        $entry->finalAvg = $this->average($answers);

        $entry->save();      

        return view('result', [
            'pp' => array_search(max($category_result), $category_result)
        ]);
    }

    public function success() {
        return view('result');
    }

    public function average($arr) {
        if (!is_array($arr)) return false;
        return array_sum($arr)/count($arr);
    }
}
