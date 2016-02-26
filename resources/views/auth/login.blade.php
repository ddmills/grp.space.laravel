@extends('layouts.master')

@section('subheader')
    <div class="center">
        <i class="fa fa-fw fa-shield fa-3x"></i>
    </div>
    <br>
    <h2 class='app-subheader-title center'>{{ Lang::get('auth.login.header') }}</h2>
@endsection

@section('content')
<div class="login-body">

    <form action="{{ route('auth.authenticate') }}" method="post" accept-charset="utf-8">

        {{ csrf_field() }}

        <div class='form-group'>
            <label for="input-identifier">Username or email</label>
            <input type="text" class="form-control" id="input-identifier" name="identifier">
        </div>

        <div class='form-group'>
            <label for="input-password">Password</label>
            <input type="password" class="form-control" id="input-password" name="password">
        </div>

        <button type="submit" class="btn btn-primary btn-block">
            {{ Lang::get('auth.login.finalize') }}
        </button>

    </form>

    <p class="login-new">
        New to grp.space?
        <a href="{{ route('auth.register') }}">Create an account</a>.
    </p>

</div>
@endsection
