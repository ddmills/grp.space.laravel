@extends('layouts.master')

@section('page.header')
    <header class="page-header">
        <div class="container">
            <h2 class='page-title'>
                <i class="icon-user"></i> {{ $user->username}}
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="row">
        <div class="column one-fourth">
            <div class="user-image">
                <img src="http://lorempixel.com/155/155/abstract" width="155" height="155">
            </div>
            <h4 class="user-name">{{ $user->name }}</h4>
            <p class="user-username">{{ $user->username}}</h4>
            <p>{{ $user->created_at }}</p>
        </div>
        <div class="column three-fourths">
        </div>
    </div>
@endsection
