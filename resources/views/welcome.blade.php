@extends('layouts._layout')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection

@section('content')
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container px-5">
        <a class="navbar-brand" href="#page-top">PLMUN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Header-->
<header class="masthead text-center text-white">
    <div class="masthead-content">
        <div class="container px-5">
            <h1 class="masthead-heading mb-0">Political Participation Analyzer</h1>
            
            <a class="btn btn-primary btn-xl rounded-pill mt-5" href="/survey">Answer the Political Survey</a>
        </div>
    </div>
    
</header>
<!-- Content section 1-->
<section id="scroll">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5"><img class="img-fluid rounded-circle" src="{{ asset('assets/img/Aristotle.png') }}" alt="Aristotle" /></div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="p-5">
                    <h2 class="display-4">Aristotle</h2>
                    <p>Democracy arises out of the notion that those who are equal in any respect are equal in all respects; because men are equally free, they claim to be absolutely equal.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section 2-->
<section>
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <div class="p-5"><img class="img-fluid rounded-circle" src="{{ asset('assets/img/Roosevelts.jpg') }}" alt="Roosevelts" /></div>
            </div>
            <div class="col-lg-6">
                <div class="p-5">
                    <h2 class="display-4">Franklin D. Roosevelt</h2>
                    <p>Let us never forget that government is ourselves and not an alien power over us. The ultimate rulers of our democracy are not a President and senators and congressmen and government officials, but the voters of this country.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section 3-->
<section>
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5"><img class="img-fluid rounded-circle" src="{{ asset('assets/img/Ronald.jpg') }}" alt="Ronald Reagan" /></div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="p-5">
                    <h2 class="display-4">Ronald Reagan</h2>
                    <p>Government exists to protect us from each other. Where government has gone beyond its limits is in deciding to protect us from ourselves.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-black">
    <div class="container px-5"><p class="m-0 text-center text-white small">PAMANTASAN NG LUNGSOD NG MUNTINLUPA</p></div>
</footer>

<div class="modal fade" id="loginModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

				<form method="POST" action="{{ route('post.login') }}">
					<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
					<div class="input-group mt-2">
						<input type="text" class="form-control" id="username" name="username" placeholder="username">
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
					</div>
					<div class="input-group">
						<button type="submit" class="btn btn-primary">Log In</button>
					</div>
			    </form>
			</div>
		</div>
	</div>
</div>
@endsection