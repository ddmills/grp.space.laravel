@extends('layouts.room')

@section('page.title')
    {{ $room->name }}
@endsection

@section('page.actions')
    <a href="{{ route('room.show', $room->name) }}" class="btn btn-default">
        <i class="fa fa-fw fa-home"></i> View room
    </a>
    <a href="{{ route('room.show', $room->name) }}" class="btn btn-danger">
        <i class="fa fa-fw fa-times"></i> Delete room
    </a>
@endsection

@section('content')
    @include('room.partials.members')
@endsection
