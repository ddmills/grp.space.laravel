@extends('layouts.master')

@section('subheader')
    <h2 class='app-subheader-title'>Join grp.space</h2>
    <p class='app-subheader-tagline'>The best way to hang out with ur frans</p>
@endsection

@section('content')

<h4>Create your personal account <i class="fa fa-fw fa-male"></i></h4>
<br>
<form action="{{ route('auth.store') }}" method="post" accept-charset="utf-8">

    {{ csrf_field() }}

    <div class='form-group'>
        <label for="input-username">Username</label>
        <input type="text" class="form-control" id="input-username" name="username">
        <span class='note'>Username can only contain hyphens (-), tildes (~), and alphanumeric characters (a-z, 0-9).</span>
    </div>

    <div class='form-group'>
        <label for="input-description">Email Address</label>
        <input type="email" class="form-control" id="input-email" name="email">
        <span class="note">You will occasionally receive account related emails. We promise not to share your email with anyone.</span>
    </div>

    <div class='form-group'>
        <label for="input-password">Password</label>
        <input type="password" class="form-control" id="input-password" name="password">
        <span class="note">Make your p4ssword as insecure as u want</span>
    </div>

    <button type="submit" class="btn btn-primary pull-right">
        Create account
    </button>

</form>
@endsection
