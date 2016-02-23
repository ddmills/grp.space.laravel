@extends('layouts.master')

@section('content')
<style>
.styleguide-header {
    margin-top : 0;

}

.styleguide-section {
    margin      : 60px 0;
    display     : block;
    border-top  : 1px dashed #ccc;
    padding-top : 60px;
}
</style>

<h1>Styleguide</h1>

<div class='styleguide-section'>
    <h1 class='styleguide-header'>Header</h1>
    <h1>{{ $faker->company }} <small>{{ $faker->companySuffix }}</small></h1>
    <p>{{ $faker->catchPhrase }}</p>
    <h2>{{ $faker->company }} <small>{{ $faker->companySuffix }}</small></h2>
    <p>{{ $faker->catchPhrase }}</p>
    <h3>{{ $faker->company }} <small>{{ $faker->companySuffix }}</small></h3>
    <p>{{ $faker->catchPhrase }}</p>
    <h4>{{ $faker->company }} <small>{{ $faker->companySuffix }}</small></h4>
    <p>{{ $faker->catchPhrase }}</p>
    <h5>{{ $faker->company }} <small>{{ $faker->companySuffix }}</small></h5>
    <p>{{ $faker->catchPhrase }}</p>
    <h6>{{ $faker->company }} <small>{{ $faker->companySuffix }}</small></h6>
    <p>{{ $faker->catchPhrase }}</p>
</div>

<div class='styleguide-section'>
    <h1 class='styleguide-header'>Paragraph</h1>

    <p>{{ $faker->realText(250) }}</p>
    <p>{{ $faker->realText(500) }}</p>
    <p>{{ $faker->realText(300) }}</p>
</div>

<div class='styleguide-section'>
    <h1 class='styleguide-header'>Forms</h1>

    <div class='form-group'>
        <label for="input-name">Room Name</label>
        <span class='note'>Name can only contain hyphens (-), tildes (~), and alphanumeric characters (a-z, 0-9).</span>
        <input type="text" class="form-control" id="input-name" name="name">
    </div>

    <div class='form-group'>
        <label for="input-description">Description <small>(optional)</small></label>
        <input type="text" class="form-control" id="input-description" name="description">
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
</div>

<div class='styleguide-section'>
    <h1 class='styleguide-header'>Buttons</h1>

    <button type='button' class="btn btn-default">btn-default</button>
    <button type='button' class="btn btn-info">btn-info</button>
    <button type='button' class="btn btn-primary">btn-primary</button>
    <button type='button' class="btn btn-warning">btn-warning</button>
    <button type='button' class="btn btn-danger">btn-danger</button>
</div>

<div class='styleguide-section'>
    <h1 class='styleguide-header'>Alerts</h1>

    <div class='alert'><b>Hey</b>, this is some information&hellip;</div>
    <div class='alert alert-info'><b>Okay&hellip;</b> This is some information&hellip;</div>
    <div class='alert alert-danger'><b>Danger!</b> This is some information&hellip;</div>
    <div class='alert alert-warning'><b>Careful!</b> This is some information&hellip;</div>
    <div class='alert alert-success'><b>GG Eazy</b> You did something right.</div>
</div>

@endsection