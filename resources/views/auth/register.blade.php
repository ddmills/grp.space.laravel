@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h2 class="page-title">{!! Lang::get('auth.register.header') !!}</h2>
        <p class="page-lead">{!! Lang::get('auth.register.tagline') !!}</p>
    </div>

    @include('other.steps', ['actions' => false])

    <form action="{{ route('auth.store') }}" method="post" accept-charset="utf-8">

        {{ csrf_field() }}

        <div class='form-group'>
            <label for="input-username">Username</label>
            <input type="text" class="form-control" id="input-username" name="username" value="{{ old('username') }}">
            <span class='note'>Username can only contain hyphens (-), tildes (~), and alphanumeric characters (a-z, 0-9).</span>
        </div>

        <div class='form-group'>
            <label for="input-email">Email Address</label>
            <input type="email" class="form-control" id="input-email" name="email" value="{{ old('email') }}">
            <span class="note">You will occasionally receive account related emails. We promise not to share your email with anyone.</span>
        </div>

        <div class='form-group'>
            <label for="input-password">Password</label>
            <input type="password" class="form-control" id="input-password" name="password">
            <span class="note">Password must be at least six characters long.</span>
        </div>

        <button type="submit" class="btn btn-primary pull-right">
            {{ Lang::get('auth.register.finalize') }}
        </button>

    </form>
@endsection
