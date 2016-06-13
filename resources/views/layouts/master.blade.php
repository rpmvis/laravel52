<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>DataTables / Editor -> Laravel</title>

        <link rel="stylesheet" type="text/css" href="css/app.css">

        <!-- Fonts -->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:400,300'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https:////oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https:////oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="css/editor.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/editor.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://nightly.datatables.net/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://nightly.datatables.net/buttons/css/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://nightly.datatables.net/select/css/select.dataTables.min.css">

        <script type="text/javascript" charset="utf-8" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="https://nightly.datatables.net/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="https://nightly.datatables.net/buttons/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="https://nightly.datatables.net/select/js/dataTables.select.min.js"></script>

        {{--<script type="text/javascript" charset="utf-8" src="js/dt-codetoweb.dataTables.editor.js"></script>--}}
        <script type="text/javascript" charset="utf-8" src="js/dataTables.editor.min.js"></script>
    </head>
    <body class="bootstrap">
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
