<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome',
    ['as' => 'welcome', 'uses' => 'WelcomeController@index']);