@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if (! Auth::check())
                        Welcome
                    @else
                        Showcase "Web Admin"
                    @endif
                </div>

                <div class="panel-body">
                    @if (! Auth::check())
                            This application is show casing a "Web Admin" built in Laravel<br><br>
                            Use <a href="{{ URL::route('guest_login') }}">guest login</a> for a quick start.
                            <br>
                    @else
                        You are logged in as {{ Auth::user()->name }}.<br>
                        Please examine the Admin pages for administrating tables: <br><br>
                        <ul>
                            <li><a href="/sites">Sites</a></li>
                            <li><a href="/users">Users</a></li>
                            <li><a href="/sites_users">Sites and Users</a></li>
                        </ul>
                        <hr>
                        "Web Admin" is showcasing:<br>
                        <ul>
                            <li>a Laravel backend application.</li>
                            <li>a friendly user interface:<br>
                                shown tables are sortable, searchable and provided with pagination.<br>
                                Various options for table data export are offered.</li>
                        </ul><br>
                        PHP source code is on {!! Html::link('https://github.com/rpmvis/laravel52.git', 'GitHub', ['target'=>'_blank']) !!},
                        more technical details are <a href="/thiswebsite">here</a>.
                        <hr>
                        Comments are welcome at my {!! Html::mailto('rpmvis@gmail.com', 'email') !!} address.
                    @endif

                    <br><br>
                    Rene Vis<br>
                    Web Developer

                </div>
            </div>
        </div>
    </div>
</div>
@endsection




