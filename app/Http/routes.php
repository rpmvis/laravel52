<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome2',
    ['as' => 'welcome2', 'uses' => 'Welcome2Controller@welcome2']);
