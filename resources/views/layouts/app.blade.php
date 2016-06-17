<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel 5.2 - admin showcase</title>

    <link rel="stylesheet" type="text/css" href="css/app.css">

    <!-- bootstrap.min.css: navbar-nav -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https:////oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
    <!--<script src="https:////oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <link rel="stylesheet" type="text/css" href="css/editor.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/editor.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://nightly.datatables.net/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://nightly.datatables.net/buttons/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://nightly.datatables.net/select/css/select.dataTables.min.css">

    <script type="text/javascript" charset="utf-8"
            src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    {{--bootstrap.js: for dropdown menu --}}
    <script type="text/javascript" charset="utf-8"
            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf-8"
            src="https://nightly.datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf-8"
            src="https://nightly.datatables.net/buttons/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf-8"
            src="https://nightly.datatables.net/select/js/dataTables.select.min.js"></script>
    <script type="text/javascript" charset="utf-8"
            src="js/dataTables.editor.min.js"></script>
    <script type="text/javascript" charset="utf-8"
            src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" charset="utf-8"
            src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf-8"
            src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf-8"
            src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf-8"
            src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
    {{--buttons.flash.js: for Flash export buttons--}}
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.flash.js"></script>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
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

                {{--<!-- Branding Image -->--}}
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                    {{--Laravel, weet je--}}
                {{--</a>--}}
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
