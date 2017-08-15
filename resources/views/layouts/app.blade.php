<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@if ($flash = session('message'))
<div id="flash-message" class="alert alert-success" role="alert">
  {{ $flash }}
</div>
@endif
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    <!--@if(Auth::check())
                        <li> <a href="{{ route('profile', ['slug' => Auth::user()->slug]) }}"> Profile </li>
                    @endif-->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                    
                            <li class="dropdown">
                            <img src="{{url('/img/chicksloveme.png')}}" alt="Avatar" style="width:32px; height:32px; position:absolute; top:10px; right:80px; border-radius:50%;">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li> 
                                        <a href="{{ route('profile', ['slug' => Auth::user()->slug]) }}">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                                            Profile 
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        @if(Auth::check())
        <div id="app">
            <notification :id"{{ Auth::id() }}"></notification>
        </div>
        @endif
    </div>

    <!-- Scripts -->
    <script src='{{ asset('js/app.js') }}'></script>
    <!--SCRIPT FOR VUE -->
    
    
    
    
    
</body>
</html>
