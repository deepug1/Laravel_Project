<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab Test Hub</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    </head>
<body>
<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="{{'/'}}"><img src="{{ url('Images/logo.png')}}" width="200px"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="{{ url('') }}">Home</a></li>
                    <li><a href="{{ url('/book') }}">Book Lab Test</a></li>
                    <li><a href="{{ url('service') }}">Service</a></li>
                    <li><a href="{{ url('about') }}">About</a></li>
                    <li><a href="{{ url('contact') }}">Contact</a></li>

                    @if(!Session::has('loginid'))
                    <li><a href="{{ url('signin') }}">Sign-in/Register</a></li>
                    @else
                    <li><a href="{{ url('profile') }}">Profile</a></li>
            @endif
            </nav>
        </div>
    </div>
</div>
