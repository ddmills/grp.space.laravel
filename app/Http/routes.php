<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/',           ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/new',        ['as' => 'room.create', 'uses' => 'RoomController@create']);
    Route::post('/new',       ['as' => 'room.store',  'uses' => 'RoomController@store']);
    Route::get('/at/{room}',  ['as' => 'room.show',   'uses' => 'RoomController@show']);
    Route::get('/at',         ['as' => 'room.index',  'uses' => 'RoomController@index']);
    Route::get('/styleguide', ['as' => 'styleguide',  'uses' => function(Faker\Generator $faker) {
        return view('other.styleguide', compact('faker'));
    }]);

    Route::get('login',  ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
    Route::post('login', ['as' => 'auth.authenticate', 'uses' => 'Auth\AuthController@authenticate']);
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

    Route::get('join',  ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);
    Route::post('join', ['as' => 'auth.store', 'uses' => 'Auth\AuthController@store']);

    Route::get('/u/{user}',  ['as' => 'dashboard.index',   'uses' => 'DashboardController@index']);
});
