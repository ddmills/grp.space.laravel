@extends('layouts.master')

@section('page.header')
    <header class="page-header">
        <div class="container">
            <h2 class='page-title'>
                @if ($user->hasRole('admin'))
                    <i class="icon-crown"></i>
                @else
                    <i class="icon-user"></i>
                @endif
                {{ $user->username}}
            </h2>
            <div class="page-actions btn-group btn-group-sm">
                    @can('viewDashboard', $user)
                        <a href="{{ route('user.dashboard', $user->username) }}" class="btn btn-default">
                            <i class="icon-gauge"></i> Dashboard
                        </a>
                    @endcan
                    @if (Auth::user()->id == $user->id)
                        <a href="{{ route('auth.logout') }}" class="btn btn-default">
                            <i class="icon-logout"></i> Sign out
                        </a>
                    @endif
            </div>
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
