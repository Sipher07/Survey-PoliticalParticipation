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
    This is the result
</div>
@endsection

@section('scripts')
<script>
    
</script>
@endsection