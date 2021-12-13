@extends('layouts._layout')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/survey.css') }}">
<link rel="stylesheet" href="{{ asset('css/radio.css') }}"> 
@endsection

@section('content')

<div class="grid-container full fluid mt-5 mb-5">
    <div class="head"></div>
    <form>
        
        <h3>Analysis on the Level of Political Participation of the citizens from each Barangay in Muntinlupa City: A Survey</h3>
        <p class="desc"> 
            Good day!
            <br><br>
            We are fourth-year college students from the Pamantasan ng Lungsod ng Muntinlupa, 
            Bachelor of Science in Computer Science program. As part of our requirements as
            graduating students, we are here to conduct an online survey for our thesis entitled, 
            Analysis on the Level of Political Participation of the citizens from each Barangay in 
            Muntinlupa City using K-Means Clustering Algorithm
            <br><br>
            By participating in this survey, we are therefore granted permission to utilize the data we have 
            acquired. However,rest assured that all of the information gathered here will only be used for 
            thesis and research purposes only and that we solemnly abide by the Republic Act 
            10173 - Data Privacy Act of 2012.
        </p>

        <hr>

        <p style="text-align: center">
            Thank you for taking your time in answering this survey.<br>
            Your answers has been successfully submitted.
            <br><br>
            <a href="/">Back to Home</a>
        </p>

    </form>

</div>

@endsection