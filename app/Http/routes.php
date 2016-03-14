<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/',           ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/new',        ['as' => 'room.create', 'uses' => 'RoomController@create']);
    Route::post('/new',       ['as' => 'room.store',  'uses' => 'RoomController@store']);

    Route::get('/at',         ['as' => 'room.index',  'uses' => 'RoomController@index']);
    Route::get('/at/join/{token}',  ['as' => 'room.join',   'uses' => 'RoomController@join']);
    Route::get('/at/{room}',  ['as' => 'room.show',   'uses' => 'RoomController@show']);
    Route::get('/at/{room}/emit',  ['as' => 'room.emit',   'uses' => 'RoomController@emit']);
    Route::post('/at/{room}/chat',  ['as' => 'room.emit',   'uses' => 'RoomController@chat']);
    Route::get('/at/{room}/settings',  ['as' => 'room.settings',   'uses' => 'RoomController@settings']);
    Route::get('/at/{room}/directory',  ['as' => 'room.directory',   'uses' => 'RoomController@directory']);
    Route::post('/at/{room}/invite',  ['as' => 'room.invite',   'uses' => 'RoomController@invite']);

    Route::get('/styleguide', ['as' => 'styleguide',  'uses' => function(Faker\Generator $faker) {
        return view('other.styleguide', compact('faker'));
    }]);

    Route::get('login',  ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
    Route::post('login', ['as' => 'auth.authenticate', 'uses' => 'Auth\AuthController@authenticate']);
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

    Route::get('join',  ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);
    Route::post('join', ['as' => 'auth.store', 'uses' => 'Auth\AuthController@store']);

    Route::get('/user',  ['as' => 'user.index',   'uses' => 'UserController@index']);
    Route::get('/user/{user}',  ['as' => 'user.show',   'uses' => 'UserController@show']);
    Route::get('/user/{user}/dashboard',  ['as' => 'user.dashboard',   'uses' => 'UserController@dashboard']);
});
