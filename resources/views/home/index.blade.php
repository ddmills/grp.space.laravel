@extends('layouts.master')

@section('content')
<h1><i class="fa fa-fw fa-anchor"></i> GRP.SPACE</h1>
<div class="btn-group btn-group-justified">
    <a href='{{ route("auth.register") }}' class="btn btn-primary">
        Sign up
    </a>
    <a href='{{ route("room.create") }}' class="btn btn-default">
        create room
    </a>
    <a href='{{ route("auth.login") }}' class="btn btn-default">
        Sign in
    </a>
</div>
@endsection
