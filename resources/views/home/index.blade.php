@extends('layouts.master')

@section('content')

<div class="row">
    <div class="column one-half">
        <a href='{{ route("room.create") }}' class="btn btn-default btn-block">
            create room
        </a>
    </div>
    <div class="column one-half">
        <a href='{{ route("auth.register") }}' class="btn btn-default btn-block">
            Sign up
        </a>
    </div>
</div>
@endsection
