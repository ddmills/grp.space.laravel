<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/new',       ['as' => 'room.create', 'uses' => 'RoomController@create']);
    Route::post('/new',      ['as' => 'room.store',  'uses' => 'RoomController@store']);
    Route::get('/at/{room}', ['as' => 'room.show',   'uses' => 'RoomController@show']);

});
