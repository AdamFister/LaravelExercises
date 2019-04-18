@extends('layout')

@section('content')
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content topmargin">
            <div class="links">
                <a href="https://adamfister.github.io/" target="_blank">My website</a>
                <a href="https://github.com/AdamFister" target="_blank">Github</a>
                <a href="https://www.linkedin.com/in/adam-fister/" target="_blank">Linkedin</a>
            </div>  

            
                <div class="title m-b-md">
                    Adam Fister Portfolio
                </div>

                <div class="links">
                    
                    <a href="/clock">Clock</a>
                    <a href="/countdown">Countdown</a>
                    <a href="/tictactoe">TicTacToe</a>
                    <a href="/mindreader">Mindreader</a>
                    <br>
                    <a href="/calculator">Calculator</a>
                    <a href="/restaurant">Restaurant</a>
                    <a href="/todo">To-Do List</a>
                    <a href="/weather">Weather</a>
                </div>
            </div>
        </div>
@endsection
