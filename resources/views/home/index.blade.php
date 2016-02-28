@extends('layouts.master')

@section('content')
    <h1><i class="fa fa-fw fa-anchor"></i> Group Space</h1>
    @can('room-create')
        <a href="{{ route('room.create') }}" class="btn btn-primary">Create room</a>
    @endcan
@endsection
