@extends('layouts.master')

@section('page.header')
    <header class="page-header">
        <div class="container">
            <h2 class='page-title'>
                User Index
            </h2>
        </div>
    </header>
@endsection

@section('content')

    @foreach ($users as $user)
        <p>
            {{ $user->id }} &middot;
            {{ $user->username }}
        </p>
    @endforeach

@endsection
