@extends('layouts.room')

@section('page.title')
    {{ $room->name }}
@endsection

@section('content')
    @include('room.partials.members')
@endsection
