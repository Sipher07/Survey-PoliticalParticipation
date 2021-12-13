@extends('layouts._layout')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/survey.css') }}">
<link rel="stylesheet" href="{{ asset('css/radio.css') }}"> 
@endsection

@section('content')

<div class="grid-container full fluid mt-5 mb-5">
    <div class="head"></div>
    <form method="POST" action="{{ route('survey.submit') }}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

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

        <div>
            <label class="form-label for="name">Name (Optional)</label>
            <input class="form-control" type="text" id="name" name="name">
        </div>

        <div>
            <label class="form-label for="age">Age</label>
            <select class="form-select" id="age" name="age" required>
                @for($i = 18; $i <= 90; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div>
            <label class="form-label for="gender">Gender</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>

        <div>
            <label class="form-label for="barangay">Barangay</label>
            <select class="form-select" id="barangay" name="barangay" required>
                @foreach($brgy as $b)
                    <option value="{{ $b }}">{{ $b }}</option>
                @endforeach
            </select>
        </div>

        @foreach($questions as $q)
            <hr>
            <div class="row">
                <div class="col-md-12 radio-cont">
                    <p>{{ $q['question'] }}</p>
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="{{ $q['id'] }}" id="{{ $q['id'] }}_1" value="1" autocomplete="off">
                        <label class="btn btn-outline-primary m-0" for="{{ $q['id'] }}_1">Never</label>

                        <input type="radio" class="btn-check" name="{{ $q['id'] }}" id="{{ $q['id'] }}_2" value="2" autocomplete="off">
                        <label class="btn btn-outline-primary m-0" for="{{ $q['id'] }}_2">Rarely</label>

                        <input type="radio" class="btn-check" name="{{ $q['id'] }}" id="{{ $q['id'] }}_3" value="3" autocomplete="off">
                        <label class="btn btn-outline-primary m-0" for="{{ $q['id'] }}_3">Sometimes</label>

                        <input type="radio" class="btn-check" name="{{ $q['id'] }}" id="{{ $q['id'] }}_4" value="4" autocomplete="off">
                        <label class="btn btn-outline-primary m-0" for="{{ $q['id'] }}_4">Often</label>

                        <input type="radio" class="btn-check" name="{{ $q['id'] }}" id="{{ $q['id'] }}_5" value="5" autocomplete="off" checked>
                        <label class="btn btn-outline-primary m-0" for="{{ $q['id'] }}_5">Always</label>
                    </div>
                </div>
            </div>
        @endforeach

        <hr>

        <button type="submit" class="btn btn-primary float-right mb-3">Submit</button>
    </form>

</div>

@endsection