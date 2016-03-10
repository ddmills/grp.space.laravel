@extends('layouts.master')

@section('page.header')
    <header class="page-header room-header">
        <div class="container">
            <h2 class='page-title'>
                @yield('page.title')
            </h2>
            <div class="page-actions btn-group btn-group-sm">
                @yield('page.actions')
            </div>
        </div>
        <div class="container">
            @include('room.subnav')
        </div>
    </header>
@endsection
