@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Test</div>

                <div class="panel-body">
                    <p>this is a test for the Html facade</p>
                    <p>{!! Html::link('https://editor.datatables.net', 'DataTables/Editor', ['target'=>'_blank']) !!}, a third party tool of &copy;SpryMedia Ltd.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
