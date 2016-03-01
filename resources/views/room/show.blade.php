@extends('layouts.master')


@section('content')
    <header class="page-header">
        <h2 class="page-title">
            {{ $room->name }}
            @if($room->access == 'public')
                <i class="fa fa-fw fa-eye pull-right" title="This room is public"></i>
            @elseif($room->access == 'private')
                <i class="fa fa-fw fa-lock pull-right" title="This room is private"></i>
            @endif
        </h2>
        <p class='page-lead'>{{ $room->description }}</p>
    </header>

    <p>Welcome 2 the dank room</p>

    {{ $room->access }}
@endsection
