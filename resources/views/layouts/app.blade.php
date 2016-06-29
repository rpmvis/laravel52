<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel 5.2 - showcase "Web Admin"</title>

    <link href="css/styles.min.css" rel="stylesheet" type="text/css">
    <script src="js/main.min.js"></script>

    {{--<script src="js/bootstrap.min.js"></script>--}}
    {{--<script src="js/buttons.flash.min.js"></script>--}}
    {{--<script src="js/buttons.html5.min.js"></script>--}}
    {{--<script src="js/buttons.print.min.js"></script>--}}
    {{--<script src="js/dataTables.buttons.min.js"></script>--}}
    {{--<script src="js/dataTables.editor.min.js"></script>--}}
    {{--<script src="js/dataTables.select.min.js"></script>--}}
    {{--<script src="js/jquery.dataTables.min.js"></script>--}}
    {{--<script src="js/jquery-1.11.3.min.js"></script>--}}
    {{--<script src="js/jszip.min.js"></script>--}}
    {{--<script src="js/pdfmake.min.js"></script>--}}
    {{--<script src="js/vfs_fonts.js"></script>--}}

    <style>
        body {font-family: 'Lato';}
        .fa-btn {margin-right: 6px;}
    </style>
</head>
<body class="bootstrap" id="app-layout">
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
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/home') }}">Home</a>
                    </li>

                    @if (Auth::check())
                        <li @if (Request::is('sites')) class="active" @endif>
                            <a href="/sites">Sites</a>
                        </li>
                        <li @if (Request::is('users')) class="active" @endif>
                            <a href="/users">Users</a>
                        </li>
                        <li @if (Request::is('sites_users')) class="active" @endif>
                            <a href="/sites_users">Sites and Users</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                About <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/thiswebsite') }}"><i class="fa fa-btn fa-sign-out"></i>This web site</a></li>
                            </ul>
                        </li>

                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
