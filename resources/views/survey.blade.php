@extends('layouts._layout')

@section('style')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
<link rel="stylesheet" href="{{ asset('css/survey.css') }}">
<style>
    body {
        height: 100vh;
        width: 100vw;
        background-image: url("/assets/quiz_bg.png");
        background-repeat: no-repeat;
        background-position: center bottom;
        background-size: cover;
    }
</style>
@endsection

@section('content')
<div class="main-container">
    <div id="p_card">
        <div class="row">
            <div class="col-md-12">
                <h2 id="p_text">What is your name?</h2>

                <input type="text" class="form-control quiz-text" name="name" id="name" autofocus="true" />

                <select class="form-select quiz-text" id="age" name="age">
                    @for($i = 18; $i <= 90; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select class="form-select quiz-text" id="gender" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <select class="form-select quiz-text" id="barangay" name="barangay" required>
                    @foreach($brgy as $b)
                        <option value="{{ $b }}">{{ $b }}</option>
                    @endforeach
                </select>

                <input type="text" class="form-control quiz-text" name="voters_id" id="voters_id" autofocus="true" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4 d-flex justify-content-center">
                <button class="btn btn-primary btn-1" id="next">Next</button>
            </div>
        </div>
    </div>

    <div id="q_card">
        <div class="row mb-5">
            <div class="col-md-12">
                <h3><span id="q_num">1</span> of 18</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2 id="q_text"></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" id="survey_options_1" name="answer" value="1" autocomplete="off">
                    <label class="btn btn-primary-radio" for="survey_options_1">Never</label>

                    <input type="radio" class="btn-check" id="survey_options_2" name="answer" value="2" autocomplete="off">
                    <label class="btn btn-primary-radio" for="survey_options_2">Rarely</label>

                    <input type="radio" class="btn-check" id="survey_options_3" name="answer" value="3" autocomplete="off">
                    <label class="btn btn-primary-radio" for="survey_options_3">Sometimes</label>

                    <input type="radio" class="btn-check" id="survey_options_4" name="answer" value="4" autocomplete="off">
                    <label class="btn btn-primary-radio" for="survey_options_4">Often</label>

                    <input type="radio" class="btn-check" id="survey_options_5" name="answer" value="5" autocomplete="off">
                    <label class="btn btn-primary-radio" for="survey_options_5">Always</label>
                </div>
            </div>
        </div>
    </div>

    <div id="success">
        <div class="row">
            <div class="col-md-12">
                <h1 id="success_msg1" style="font-size: 4em;"></h1>
                <h2 id="success_msg2" class="mt-3"></h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 bottom-container">
            <a href="/"><button class="btn btn-secondary btn-2 mt-2">Go back to home</button></a>
        </div>
    </div>

    <div>
        <input type="hidden" id="questions" value="{{ $questions }}"/>

        <form method="POST" action="{{ route('survey.submit') }}" id="quiz_form">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <input type="hidden" id="frm_name" name="name">
            <input type="hidden" id="frm_age" name="age">
            <input type="hidden" id="frm_gender" name="gender">
            <input type="hidden" id="frm_barangay" name="barangay">
            <input type="hidden" id="frm_voters_id" name="votersid">
            <input type="hidden" id="frm_answers" name="answers">
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var currIndex = 0;
    var answers = [];
    var questions = [];
    $("#success").hide();
    $("#q_card").hide();
    $("#age").hide();
    $("#gender").hide();
    $("#barangay").hide();
    $("#voters_id").hide();

    var name, age, gender, barangay, voters_id;
    var pnum = 1; /* 1: Name, 2: Age, 3: Gender, 4: Barangay, 5: Voters ID Number */

    $(document).ready(function()
    {
        questions = JSON.parse($("#questions").val());
        $("#q_text").text(questions[currIndex].question);

        $(document).on("click", "input:radio[name='answer']", function()
        {
            nextQuestion($('input[name="answer"]:checked').val());
        });

        $(document).on("click", "#next", function()
        {
            switch (pnum)
            {
                case 1:
                    name = $("#name").val();
                    $("#name").hide();
                    $("#p_text").text("What is your age?");
                    $("#age").show();
                    pnum++;
                    break;
                case 2:
                    age = $("#age").val();
                    $("#age").hide();
                    $("#p_text").text("What is your gender?");
                    $("#gender").show();
                    pnum++;
                    break;
                case 3:
                    gender = $("#gender").val();
                    $("#gender").hide();
                    $("#p_text").text("What is your barangay?");
                    $("#barangay").show();
                    pnum++;
                    break;
                case 4:
                    barangay = $("#barangay").val();
                    $("#barangay").hide();
                    $("#p_text").text("What is your voter's id?");
                    $("#voters_id").show();
                    pnum++;
                    break;
                case 5:
                    voters_id = $("#voters_id").val();
                    $("#voters_id").hide();
                    $("#p_text").text("All good! Let's now proceed with the questions.");
                    pnum++;
                    break;
                case 6:
                    $("#p_card").hide();
                    $("#q_card").show();
                    pnum++;
            }
        });
    });

    function nextQuestion(answer) {
        if(answers.length+1 == questions.length)
        {
            currIndex++;
            answers.push(answer);

            $("#q_card").hide();
            $("#success_msg1").text("How's the quiz?");
            $("#success_msg2").text("We are currently analyzing your answers.. Please wait for a moment.");
            $("#success").show(200);

            $("#frm_name").val(name);
            $("#frm_age").val(age);
            $("#frm_gender").val(gender);
            $("#frm_barangay").val(barangay);
            $("#frm_voters_id").val(voters_id);
            $("#frm_answers").val(answers);

            setTimeout(function(){
              $("#quiz_form").submit();
            }, 1000);
        } 
        else
        {
            currIndex++;
            answers.push(answer);
            $("#q_text").text(questions[currIndex].question);
            $("#q_num").text(currIndex+1);
        }
    }
</script>
@endsection