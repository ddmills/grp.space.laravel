@extends('layouts.master')

@section('subheader')
    <h2 class='app-subheader-title'>
        grp.space/at/{{ $room->name }}
        @if($room->access == 'public')
            <i class='fa fa-fw fa-eye pull-right' title='This room is public'></i>
        @elseif($room->access == 'private')
            <i class='fa fa-fw fa-lock pull-right' title='This room is private'></i>
        @endif
    </h2>
    <p class='app-subheader-tagline'>{{ $room->description }}</p>
@endsection

@section('content')
    {{ $room->access }}
@endsection
