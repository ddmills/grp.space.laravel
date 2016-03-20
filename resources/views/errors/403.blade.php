@extends('layouts.error')

@section('content')
    <h2><i class="icon-shield"></i> 403.</h2>
    <p class='lead'>Ayyy you can't be here. <a href="{{ route('home') }}">Go home</a>.</p>
@endsection
