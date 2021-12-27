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

    span {
        color: black;
        background-color: yellow;
    }
</style>
@endsection

@section('content')
<div class="main-container">
    @switch ($pp)
        @case('C_Score')
            <h2>You are a <span>Conventional Type</span></h2><br>
            <h5 style="max-width: 50vw; text-align: center;">Conventional political activities are traditional, often institutionalized, and party-related forms of participation (e.g., supporting an election campaign). These activities ask for a higher degree of commitment and a more extensive investment of time by its activists.</h5>
            @break
        @case('UC_Score')
            <h2>You are a <span>Unconventional Type</span></h2><br>
            <h5 style="max-width: 50vw; text-align: center;">Unconventional political activities refer to a broad range of less institutionalized and usually less time-intensive or committed political participation located outside political parties (e.g., attending a non-violent political protest march) that often deal with rather narrow social or political issues or aim at solving a certain political problem. Alternatively, this kind of participation could be labeled “issue-based participation” since individuals are joining political movements first-hand. </h5>
            @break
        @case('KS_Score')
            <h2>You are a <span>Knowledge-Seeking Type</span></h2><br>
            <h5 style="max-width: 50vw; text-align: center;">Knowledge-seeking type of individual in terms of political participation is more likely into the acquisition of political information for self-interest goals that lead to the motivational force. Why? Due to the fact that it is a multifunctional variable wherein it enhances the likelihood of efficiently achieving one's own political objectives.</h5>
            @break
        @case('IP_Score')
        <h2>You are a <span>Influential Type</span></h2><br>
            <h5 style="max-width: 50vw; text-align: center;">Influential type of individual in terms of political participation is the product of personal interests in the form of lobbying. In this case, citizens who are being dependent on the political beliefs or judgments of others are doubtlessly being swayed.</h5>
            @break
    @endswitch

    <button class="btn btn-secondary btn-2 mt-5"  data-bs-toggle="modal" data-bs-target="#PPModal">Want to know more about the Faces of Political Participation?</button>
    <a href="/"><button class="btn btn-primary btn-2 mt-2">Go back home</button></a>
</div>

<div class="modal fade" id="PPModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">
            <h3>Faces of Political Participation</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

			<div class="modal-body">
            <h5><b>Conventional Type of Political Participation</b></h5>
            <p>
                By the word itself, “conventional” is based on or in accordance with what is generally done or believed.
             The use of established institutions of representative government, especially campaigning for candidates 
             and voting in elections. These are activities that we expect of responsible citizens. 
             Most people only participate in elections every few years. 
             People who are deeply invested in politics are more inclined to participate on a regular basis.
             Voting, volunteering for a political campaign, making a campaign donation, subscribing to activist groups, 
             and serving in public office are all examples of Conventional Political Participation.
            </p>

            <h5><b>Unconventional Type of Political Participation</b></h5>
            <p> 
            Challenges or defies established institutions or the dominant culture. 
            They usually engage in protesting, boycotting, and refusing to abide by certain laws in which most people choose to participate conventionally, by voting, donating money to candidates for political office, or even running for office.  
            These are activities that are legal but are frequently regarded as undesirable. 
            Young people, students, and others who have serious reservations about a regime's 
            policies are more inclined to participate in nontraditional ways. 
            Signing petitions, supporting boycotts, and staging demonstrations and protests 
            are all examples of unconventional political participation.
            </p>

            <h5><b>Knowledge Seeking Type of Political Participation</b></h5>
            <p> 
            Participants used empirical political evidence that contributes to more stable and consistent political attitudes, 
            helps citizens achieve their own interests and make decisions that conform with their attitudes and preferences,
            promotes support for democratic values, facilitates trust in the political system, and motivates political participation. 
            </p>

            <h5><b>Influential Type of Political Participation</b></h5>
            <p> 
            Education, gender, age, peers, and family are some of the many factors that affect their political participation and decision. 
            </p>

			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
    
</script>
@endsection