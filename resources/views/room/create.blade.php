@extends('layouts.master')

@section('subheader')

    <h2>{{ Lang::get('room.create.header') }}</h2>
    <p>{{ Lang::get('room.create.tagline') }}</p>

@endsection

@section('content')

<form action="{{ route('room.store') }}" method="post" accept-charset="utf-8">

    {{ csrf_field() }}

    <label for="input-name">Room Name<label>
    <input type="text" id="input-name" name="name">

    <label for="input-description">Description<label>
    <input type="text" id="input-description" name="description">

    <label>
        <input type="radio" name="privilege" value="public">
        Public
    </label>

    <label>
        <input type="radio" name="privilege" value="private">
        Private
    </label>

    <button type="submit">{{ Lang::get('room.create.finalize') }}</button>

</form>

@endsection
