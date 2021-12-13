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
            'questions' => $questions
        ]);
    }

    public function submit(Request $request) {
        $entry = new SurveyEntry;
        $entry->name = $request->name;
        $entry->age = $request->age;
        $entry->gender = $request->gender;
        $entry->barangay = $request->barangay;

        $entry->C1 = $request->C1;
        $entry->C2 = $request->C2;
        $entry->C3 = $request->C3;
        $entry->C4 = $request->C4;
        $entry->C5 = $request->C5;
        $entry->C6 = $request->C6;
        $entry->C7 = $request->C7;
        $entry->C_Score = $this->average(array($request->C1, $request->C2, $request->C3, $request->C4, $request->C5, $request->C6, $request->C7));

        $entry->UC1 = $request->UC1;
        $entry->UC2 = $request->UC2;
        $entry->UC3 = $request->UC3;
        $entry->UC4 = $request->UC4;
        $entry->UC5 = $request->UC5;
        $entry->UC6 = $request->UC6;
        $entry->UC_Score = $this->average(array($request->UC1, $request->UC2, $request->UC3, $request->UC4, $request->UC5, $request->UC6));

        $entry->KS1 = $request->KS1;
        $entry->KS2 = $request->KS2;
        $entry->KS3 = $request->KS3;
        $entry->KS_Score = $this->average(array($request->KS1, $request->KS2, $request->KS3));

        $entry->IP1 = $request->IP1;
        $entry->IP2 = $request->IP2;
        $entry->IP_Score = $this->average(array($request->IP1, $request->IP2));

        $entry->save();

        return redirect()->route('survey.success');
    }

    public function success() {
        return view('survey-success');
    }

    public function average($arr) {
        if (!is_array($arr)) return false;
        return array_sum($arr)/count($arr);
    }
}
