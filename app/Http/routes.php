<?php

Route::get('/',
    ['as' => '/', 'uses' => 'HomeController@index']);

Route::get('/test', function () {
    return view('test');
});

Route::get('/welcome2',
    ['as' => 'welcome2', 'uses' => 'Welcome2Controller@welcome2']);


Route::get('/home',
    ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('guest_login',
    ['as' => 'guest_login', 'uses' => 'Auth\AuthController@GuestLogin']);

// *** USER ***
// list users
Route::get('users',
    ['as' => 'users', 'uses' => 'UserController@getView']
);

// ajax get (selection of) users
Route::get('get_users_data',
    ['as' => 'get_users_data', 'uses' => 'UserController@getData']
);

// ajax post user
Route::post('post_user_data',
    ['as' => 'post_user_data', 'uses' => 'UserController@postData']);

// *** SITE ***
// get sites view
Route::get('sites',
    ['as' => 'sites', 'uses' => 'SiteController@getView']
);

// ajax get (selection of) sites
Route::get('get_sites_data',
    ['as' => 'get_sites_data', 'uses' => 'SiteController@getData']
);

// ajax post site
Route::post('post_site_data',
    ['as' => 'post_site_data', 'uses' => 'SiteController@postData' ]);

// *** SITE+USER (SU)***
// get SU view
Route::get('sites_users',
    ['as' => 'sites_users', 'uses' => 'SiteUserController@getView']
);

// ajax get SU sites
Route::get('get_SU_sites_data',
    ['as' => 'get_SU_sites_data', 'uses' => 'SiteUserController@getSitesData']
);

// ajax get SU users
Route::get('get_SU_users_data',
    ['as' => 'get_SU_users_data', 'uses' => 'SiteUserController@getUsersData']
);

// ajax post SU site data
Route::post('post_SU_site_data',
    ['as' => 'post_SU_site_data', 'uses' => 'SiteUserController@postSiteData']);

// ajax post SU user data
Route::post('post_SU_user_data',
    ['as' => 'post_SU_user_data', 'uses' => 'SiteUserController@postUserData']);

// *** Authentication routes ***
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// *** Registration routes ***
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('auth/register', function () {
    return view('app.welcome');
});

Route::post('auth/register', function () {
    return view('app.welcome');
});

Route::auth();

Route::get('/thiswebsite',
    ['as' => 'thiswebsite', 'uses' => 'AboutController@thiswebsite']);
