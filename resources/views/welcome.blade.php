@extends('layouts._layout')

@section('style')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
<style>
    body {
        height: 100vh;
        width: 100vw;
        background-image: url("/assets/index_bg.png");
        background-repeat: no-repeat;
        background-position: center bottom;
        background-size: cover;
    }
</style>
@endsection

@section('content')
<div class="main-container">
    <div class="row">
        <div class="col-md-12">
            <h1>Let's Be Curious</h1>
            <h2>How do you participate politically?</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-4 d-flex justify-content-center">
            <a href="/quiz"><button class="btn btn-primary btn-1">Take the quiz</button></a>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 bottom-container">
            <h3>Want to know more?</h3>
            <button class="btn btn-primary btn-2 mt-2"  data-bs-toggle="modal" data-bs-target="#PPModal">Political Participation</button>
            <button class="btn btn-primary btn-2 mt-2"  data-bs-toggle="modal" data-bs-target="#AboutModal">About the Project</button>
            <hr>
            <button class="btn btn-secondary btn-2 mt-2" data-bs-toggle="modal" data-bs-target="#loginModal">Admin Login</button>
        </div>
    </div>
</div>


<div class="modal fade" id="loginModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

			<div class="modal-body">
				<form method="POST" action="{{ route('post.login') }}">
					<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <div class="mb-3">
                        <label for="username" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-block btn-primary float-right">Log In</button>
                    </div>
			    </form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="AboutModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">
                <h3>About the project</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

			<div class="modal-body">
            <p>
            The purpose of this study is to gather verities and insights as well as an extensive analysis in regards to the level of Political Participation of the Citizens using K-Means Clustering Algorithm in Muntinlupa City, Philippines, 2021
                </p>
               
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="PPModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">
                <h3>Political Participation</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

			<div class="modal-body">
				<p>
                Political participation refers to a variety of public-spirited activities that aim to impact public policy, 
                either directly or indirectly, by influencing the people who decide those policies. 
                It involves legal activities by citizens that are more or less directly targeted at influencing the selection
                 of governmental personnel and/or the actions they take.  Political campaigning, demonstrating, voting, rioting, 
                 providing money to candidates or causes, contacting public officials, petitioning, 
                 collaborating with others on issues, and other comparable behaviors are all included.
                </p>
                 <p>
                     Having said that, participating in politics is one of the most effective methods for regular people
                  to make a significant difference in their communities. Citizens who are more involved in their 
                  country's politics will have a better understanding of where the government is going wrong. 
                  They will be better positioned to combat political challenges if they have a deeper understanding of them. 
                  Consequently, the government will have an in-depth knowledge of why inhabitants are upset and it will be far
                   more difficult for a government to disregard the needs of the people. As a result,
                    more political participation should indicate that more is being done to solve political and social issues.
                </p>
			</div>
		</div>
	</div>
</div>
@endsection