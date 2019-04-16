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

            <div class="content">
                <div class="title m-b-md">
                    Adam Fister Portfolio
                </div>

                <div class="links">
                    <a href="/">Home</a>
                    <a href="/clock">Clock</a>
                    <a href="/countdown">Countdown</a>
                    <a href="/tictactoe">TicTacToe</a>
                    <a href="/mindreader">Mindreader</a>
                    <a href="/calculator">Calculator</a>
                    <a href="/restaurant">Restaurant</a>
                    <a href="/todo">To Do List</a>
                </div>
            </div>
        </div>
@endsection
