@extends('layouts.master')

@section('subheader')
    <div class="center">
        <i class="fa fa-fw fa-shield fa-3x"></i>
    </div>
    <br>
    <h2 class='app-subheader-title center'>Sign in to grp.space</h2>
@endsection

@section('content')
<div class="login-body">
    <form action="{{ route('auth.verify') }}" method="post" accept-charset="utf-8">

        {{ csrf_field() }}

        <div class='form-group'>
            <label for="input-username">Username</label>
            <input type="text" class="form-control" id="input-username" name="username">
        </div>

        <div class='form-group'>
            <label for="input-password">Password</label>
            <input type="password" class="form-control" id="input-password" name="password">
        </div>

        <button type="submit" class="btn btn-primary btn-block">
            {{ Lang::get('user.login.finalize') }}
        </button>

    </form>

    <p class="login-new">
        New to grp.space?
        <a href="{{ route('auth.register') }}">Create an account</a>.
    </p>

</div>
@endsection
