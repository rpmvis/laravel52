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
                        Home
                    @endif
                </div>

                <div class="panel-body">
                    @if (! Auth::check())
                            This application is show casing a Laravel Admin application<br>
                            Efforts have been made for a rich and still easy to use interface for database table administration.<br><br>
                            Use <a href="{{ URL::route('guest_login') }}">guest login</a> for a quick start.
                            <br>
                    @else
                        You are logged in as {{ Auth::user()->name }}.<br><br>

                        Please examine the Admin pages for administrating tables: <br><br>
                        <ul>
                            <li>Sites</li>
                            <li>Users</li>
                            <li>Sites and Users.</li>
                        </ul>
                        <br>
                        Admin pages are made with:
                        <ul>
                            <li>Laravel 5.2</li>
                            <li>{!! Html::link('https://editor.datatables.net', 'DataTables/Editor', ['target'=>'_blank']) !!}, a third party tool of &copy;SpryMedia Ltd.</li>
                        </ul>
                        Shown tables are sortable, searchable and provided with pagination and export options.
                        <br><br>
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
