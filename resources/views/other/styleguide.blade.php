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

    <h3>Large</h3>
    <button type='button' class="btn btn-lg btn-default">btn-default</button>
    <button type='button' class="btn btn-lg btn-info">btn-info</button>
    <button type='button' class="btn btn-lg btn-primary">btn-primary</button>
    <button type='button' class="btn btn-lg btn-warning">btn-warning</button>
    <button type='button' class="btn btn-lg btn-danger">btn-danger</button>

    <h3>Default</h3>
    <button type='button' class="btn btn-default">btn-default</button>
    <button type='button' class="btn btn-info">btn-info</button>
    <button type='button' class="btn btn-primary">btn-primary</button>
    <button type='button' class="btn btn-warning">btn-warning</button>
    <button type='button' class="btn btn-danger">btn-danger</button>

    <h3>Small</h3>
    <button type='button' class="btn btn-sm btn-default">btn-default</button>
    <button type='button' class="btn btn-sm btn-info">btn-info</button>
    <button type='button' class="btn btn-sm btn-primary">btn-primary</button>
    <button type='button' class="btn btn-sm btn-warning">btn-warning</button>
    <button type='button' class="btn btn-sm btn-danger">btn-danger</button>

    <h3>Extra Small</h3>
    <button type='button' class="btn btn-xs btn-default">btn-default</button>
    <button type='button' class="btn btn-xs btn-info">btn-info</button>
    <button type='button' class="btn btn-xs btn-primary">btn-primary</button>
    <button type='button' class="btn btn-xs btn-warning">btn-warning</button>
    <button type='button' class="btn btn-xs btn-danger">btn-danger</button>

    <h2>Button Groups</h2>

    <div class='btn-group btn-group-lg'>
        <button type='button' class="btn btn-default">btn-default</button>
        <button type='button' class="btn btn-info">btn-info</button>
        <button type='button' class="btn btn-primary">btn-primary</button>
        <button type='button' class="btn btn-warning">btn-warning</button>
        <button type='button' class="btn btn-danger">btn-danger</button>
    </div>

    <br>

    <div class='btn-group'>
        <button type='button' class="btn btn-default">btn-default</button>
        <button type='button' class="btn btn-info">btn-info</button>
        <button type='button' class="btn btn-primary">btn-primary</button>
        <button type='button' class="btn btn-warning">btn-warning</button>
        <button type='button' class="btn btn-danger">btn-danger</button>
    </div>

    <br>

    <div class='btn-group btn-group-sm'>
        <button type='button' class="btn btn-default">btn-default</button>
        <button type='button' class="btn btn-info">btn-info</button>
        <button type='button' class="btn btn-primary">btn-primary</button>
        <button type='button' class="btn btn-warning">btn-warning</button>
        <button type='button' class="btn btn-danger">btn-danger</button>
    </div>

    <br>

    <div class='btn-group btn-group-xs'>
        <button type='button' class="btn btn-default">btn-default</button>
        <button type='button' class="btn btn-info">btn-info</button>
        <button type='button' class="btn btn-primary">btn-primary</button>
        <button type='button' class="btn btn-warning">btn-warning</button>
        <button type='button' class="btn btn-danger">btn-danger</button>
    </div>

    <h3>Button Group Justified</h3>

    <div class='btn-group btn-group-justified'>
        <a href='#' class="btn btn-default">btn-default</a>
        <a href='#' class="btn btn-info">btn-info</a>
        <a href='#' class="btn btn-primary">btn-primary</a>
        <a href='#' class="btn btn-warning">btn-warning</a>
        <a href='#' class="btn btn-danger">btn-danger</a>
    </div>

    <h2>Button States</h2>
    <a href='#' class="btn btn-default disabled">btn-default</a>
    <a href='#' class="btn btn-info disabled">btn-info</a>
    <a href='#' class="btn btn-primary disabled">btn-primary</a>
    <a href='#' class="btn btn-warning disabled">btn-warning</a>
    <a href='#' class="btn btn-danger disabled">btn-danger</a>

    <br>

    <button type="button" class="btn btn-default " disabled>btn-default</button>
    <button type="button" class="btn btn-info " disabled>btn-info</button>
    <button type="button" class="btn btn-primary " disabled>btn-primary</button>
    <button type="button" class="btn btn-warning " disabled>btn-warning</button>
    <button type="button" class="btn btn-danger " disabled>btn-danger</button>
</div>

<div class='styleguide-section'>
    <h1 class='styleguide-header'>Alerts</h1>

    <div class='alert'>
        <i class="alert-icon icon-puzzle"></i>
        <span class="alert-body">
            <b>Hey</b>, this is some information&hellip;
        </span>
    </div>

    <div class='alert alert-info'>
        <i class="alert-icon icon-info-circled"></i>
        <span class="alert-body">
            <b>Okay&hellip;</b> This is some information&hellip;
        </span>
    </div>

    <div class='alert alert-danger'>
        <i class="alert-icon icon-flag"></i>
        <span class="alert-body">
            <b>Danger!</b> This is some information&hellip;
        </span>
    </div>

    <div class='alert alert-warning'>
        <i class="alert-icon icon-attention"></i>
        <span class="alert-body">
            <b>Careful!</b> This is some information&hellip;
        </span>
    </div>

    <div class='alert alert-success'>
        <i class="alert-icon icon-award"></i>
        <span class="alert-body">
            <b>GG Eazy</b> You did something right.
        </span>
    </div>
</div>

@endsection
