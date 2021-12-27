<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon//favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="/{{ asset('favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        
        <title>Dashboard | Political Participation Analyzer</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,800;1,900&display=swap" rel="stylesheet">

        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>

        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- CSS -->
        @yield('style')

    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        @yield('nav')
                    </div>
                    <div class="sb-sidenav-footer pt-3">
                        <div class="d-grid gap-2">
                            <form method="POST" action="{{ route('logout') }}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <button type="submit" class="btn btn-block btn-danger float-right">Log Out</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Political Participation Analyzer 2021</div>
                            <div>
                                Prototype System for Thesis &nbsp; | &nbsp; Presented by Doroteo, Medina and Fausto
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

        <script src="{{ asset('js/scripts.js') }}"></script>
        @yield('scripts')
    </body>
</html>
