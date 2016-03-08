@extends('layouts.master')

@section('page.header')
    <header class='page-header'>
        <div class='container'>
            <h2 class="page-title">
                {{ Lang::get('room.create.header') }}
            </h2>
        </div>
        <div class="container">
            <p class="page-lead">
                {{ Lang::get('room.create.tagline') }}
            </p>
        </div>
    </header>
@endsection

@section('content')

    @include('other.steps', ['actions' => false])

    <form action="{{ route('room.store') }}" method="post" accept-charset="utf-8">

        {{ csrf_field() }}

        <div class='form-group'>
            <label for="input-name">Room Name</label>
            <span class="note">Name can only contain hyphens (-), tildes (~), and lowercase alphanumeric characters (a-z, 0-9).</span>
            <input type="text" class="form-control" id="input-name" name="name" value="{{ old('name') }}">
        </div>

        <div class='form-group'>
            <label for="input-description">Description <small>(optional)</small></label>
            <input type="text" class="form-control" id="input-description" name="description" value="{{ old('description') }}">
        </div>

        <div class='form-group radio-group'>
            <label>
                <input type="radio" name="access" value="public" checked>
                <i class="fa fa-eye fa-fw fa-2x room-access-icon"></i>
                Public
            </label>
            <span class='note'>Anyone can see this room.</span>

            <label>
                <input type="radio" name="access" value="private" disabled>
                <i class="fa fa-lock fa-fw fa-2x room-access-icon"></i>
                Private <small>(Feature Disabled)</small>
            </label>
            <span class='note'>You choose who can see this room.</span>
        </div>

        <button type="submit" class="btn btn-primary pull-right">
            {{ Lang::get('room.create.finalize') }}
        </button>

    </form>

@endsection
