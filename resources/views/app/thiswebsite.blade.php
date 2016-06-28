@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if (Auth::check())
                        Showcase "Web Admin"
                    @endif
                </div>

                <div class="panel-body">
                    @if ( Auth::check())
                        Technical specifications:<br>
                        <ol>
                            <li>built in PHP framework Laravel 5.2</li>
                            <li>third party tool {!! Html::link('https://editor.datatables.net', 'DataTables/Editor', ['target'=>'_blank']) !!}</li>
                            <li>deployed on {!! Html::link('https://www.openshift.com/', 'OPENSHIFT', ['target'=>'_blank']) !!} ONLINE, a RedHat hosting platform</li>
                            <li>code base is on {!! Html::link('https://github.com/rpmvis/laravel52.git', 'GitHub', ['target'=>'_blank']) !!};<br>
                            see directory '.openshift' in code base for action hooks used in deployment on OPENSHIFT.</li>
                        </ol>
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




