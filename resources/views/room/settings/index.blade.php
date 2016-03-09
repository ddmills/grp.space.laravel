@extends('layouts.master')

@section('page.header')
    <header class='page-header'>
        <div class='container'>
            <h2 class="page-title">
                {{ $room->name }}
            </h2>
            <div class="page-actions btn-group btn-group-sm">
                <a href="{{ route('room.show', $room->name) }}" class="btn btn-default">
                    <i class="fa fa-fw fa-home"></i> View room
                </a>
            </div>
        </div>
        <div class='container'>
            <p class='page-lead'>
                Settings
            </p>
        </div>
    </header>
@endsection

@section('content')

    @can('invite', $room)
        <div class="panel">
            <div class="panel-header">
                <h4 class="panel-title">
                    <i class="fa fa-fw fa-users"></i> Members
                </h4>
            </div>
            <div class="panel-body">
                <ul>
                    <li>{{ $room->owner->username }} (owner)</li>
                    @foreach($room->members as $member)
                        <li>{{ $member->username }}</li>
                    @endforeach
                </ul>
                <form action="{{ route('room.invite', ['room' => $room->name]) }}" method="post" accept-charset="utf-8">

                    {{ csrf_field() }}

                    <div class="row">
                        <div class='column three-fourths'>
                            <input type="text" class="form-control" id="input-identifier" name="identifier" value="{{ old('identifier') }}" placeholder="Username or email">
                        </div>
                        <div class='column one-fourth'>
                            <button type="submit" class="btn btn-block btn-primary">
                                <i class="fa fa-fw fa-user-plus"></i> Invite user
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    @endcan
@endsection
