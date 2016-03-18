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

.i-code {
    display: none;
}

.demo-icon:hover .i-code {
    display: inline-block;
}
.demo-icon {
    font-family: "wander";
    font-style: normal;
    font-weight: normal;
    speak: none;
    display: inline-block;
    text-decoration: inherit;
    font-size: 35px;
    text-align: center;
    -webkit-font-smoothing: antialiased;
    display: block;
    text-align: center;
    padding: 20px 0px;
}

.i-name {
    display: block;
    text-align: center;
    padding: 4px;
    margin: 0px 8px;
    color: #292929;
}

.icon-row {
    float: left;
    width: 25%;
    height: 130px;
}

.icon-row.demo-icon {
    content-before : none;
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

    <h3>alert</h3>
    <div class='alert'>
        <i class="alert-icon icon-puzzle"></i>
        <span class="alert-body">
            <b>Hey</b>, this is some information&hellip;
        </span>
    </div>

    <h3>alert-info</h3>
    <div class='alert alert-info'>
        <i class="alert-icon icon-info-circled"></i>
        <span class="alert-body">
            <b>Okay&hellip;</b> This is some information&hellip;
        </span>
    </div>

    <h3>alert-danger</h3>
    <div class='alert alert-danger'>
        <i class="alert-icon icon-flag"></i>
        <span class="alert-body">
            <b>Danger!</b> This is some information&hellip;
        </span>
    </div>

    <h3>alert-warning</h3>
    <div class='alert alert-warning'>
        <i class="alert-icon icon-attention"></i>
        <span class="alert-body">
            <b>Careful!</b> This is some information&hellip;
        </span>
    </div>

    <h3>alert-success</h3>
    <div class='alert alert-success'>
        <i class="alert-icon icon-award"></i>
        <span class="alert-body">
            <b>GG Eazy</b> You did something right.
        </span>
    </div>
</div>

<div class='styleguide-section'>
    <h1 class='styleguide-header'>Icons</h1>
    <div class="row">
        <div title="Code: 0xe800" class="icon-row">
            <i class="demo-icon icon-wrench"></i>
            <span class="i-name">icon-wrench</span>
            <span class="i-code">0xe800</span>
        </div>
        <div title="Code: 0xe801" class="icon-row">
            <i class="demo-icon icon-anchor"></i>
            <span class="i-name">icon-anchor</span>
            <span class="i-code">0xe801</span>
        </div>
        <div title="Code: 0xe802" class="icon-row">
            <i class="demo-icon icon-chart-pie"></i>
            <span class="i-name">icon-chart-pie</span>
            <span class="i-code">0xe802</span>
        </div>
        <div title="Code: 0xe803" class="icon-row">
            <i class="demo-icon icon-gauge"></i>
            <span class="i-name">icon-gauge</span>
            <span class="i-code">0xe803</span>
        </div>
        <div title="Code: 0xe804" class="icon-row">
            <i class="demo-icon icon-graduation-cap"></i>
            <span class="i-name">icon-graduation-cap</span>
            <span class="i-code">0xe804</span>
        </div>
        <div title="Code: 0xe805" class="icon-row">
            <i class="demo-icon icon-flash"></i>
            <span class="i-name">icon-flash</span>
            <span class="i-code">0xe805</span>
        </div>
        <div title="Code: 0xe806" class="icon-row">
            <i class="demo-icon icon-umbrella"></i>
            <span class="i-name">icon-umbrella</span>
            <span class="i-code">0xe806</span>
        </div>
        <div title="Code: 0xe807" class="icon-row">
            <i class="demo-icon icon-home"></i>
            <span class="i-name">icon-home</span>
            <span class="i-code">0xe807</span>
        </div>
        <div title="Code: 0xe808" class="icon-row">
            <i class="demo-icon icon-eye"></i>
            <span class="i-name">icon-eye</span>
            <span class="i-code">0xe808</span>
        </div>
        <div title="Code: 0xe809" class="icon-row">
            <i class="demo-icon icon-eye-off"></i>
            <span class="i-name">icon-eye-off</span>
            <span class="i-code">0xe809</span>
        </div>
        <div title="Code: 0xe80a" class="icon-row">
            <i class="demo-icon icon-bell"></i>
            <span class="i-name">icon-bell</span>
            <span class="i-code">0xe80a</span>
        </div>
        <div title="Code: 0xe80b" class="icon-row">
            <i class="demo-icon icon-flag"></i>
            <span class="i-name">icon-flag</span>
            <span class="i-code">0xe80b</span>
        </div>
        <div title="Code: 0xe80c" class="icon-row">
            <i class="demo-icon icon-tools"></i>
            <span class="i-name">icon-tools</span>
            <span class="i-code">0xe80c</span>
        </div>
        <div title="Code: 0xe80d" class="icon-row">
            <i class="demo-icon icon-stopwatch"></i>
            <span class="i-name">icon-stopwatch</span>
            <span class="i-code">0xe80d</span>
        </div>
        <div title="Code: 0xe80e" class="icon-row">
            <i class="demo-icon icon-down-circle"></i>
            <span class="i-name">icon-down-circle</span>
            <span class="i-code">0xe80e</span>
        </div>
        <div title="Code: 0xe80f" class="icon-row">
            <i class="demo-icon icon-left-circle"></i>
            <span class="i-name">icon-left-circle</span>
            <span class="i-code">0xe80f</span>
        </div>
        <div title="Code: 0xe810" class="icon-row">
            <i class="demo-icon icon-right-circle"></i>
            <span class="i-name">icon-right-circle</span>
            <span class="i-code">0xe810</span>
        </div>
        <div title="Code: 0xe811" class="icon-row">
            <i class="demo-icon icon-up-circle"></i>
            <span class="i-name">icon-up-circle</span>
            <span class="i-code">0xe811</span>
        </div>
        <div title="Code: 0xe812" class="icon-row">
            <i class="demo-icon icon-pencil"></i>
            <span class="i-name">icon-pencil</span>
            <span class="i-code">0xe812</span>
        </div>
        <div title="Code: 0xe813" class="icon-row">
            <i class="demo-icon icon-easel"></i>
            <span class="i-name">icon-easel</span>
            <span class="i-code">0xe813</span>
        </div>
        <div title="Code: 0xe814" class="icon-row">
            <i class="demo-icon icon-sun-inv"></i>
            <span class="i-name">icon-sun-inv</span>
            <span class="i-code">0xe814</span>
        </div>
        <div title="Code: 0xe815" class="icon-row">
            <i class="demo-icon icon-theatre"></i>
            <span class="i-name">icon-theatre</span>
            <span class="i-code">0xe815</span>
        </div>
        <div title="Code: 0xe816" class="icon-row">
            <i class="demo-icon icon-garden"></i>
            <span class="i-name">icon-garden</span>
            <span class="i-code">0xe816</span>
        </div>
        <div title="Code: 0xe817" class="icon-row">
            <i class="demo-icon icon-glass"></i>
            <span class="i-name">icon-glass</span>
            <span class="i-code">0xe817</span>
        </div>
        <div title="Code: 0xe819" class="icon-row">
            <i class="demo-icon icon-cogs"></i>
            <span class="i-name">icon-cogs</span>
            <span class="i-code">0xe819</span>
        </div>
        <div title="Code: 0xe81a" class="icon-row">
            <i class="demo-icon icon-cog"></i>
            <span class="i-name">icon-cog</span>
            <span class="i-code">0xe81a</span>
        </div>
        <div title="Code: 0xe81b" class="icon-row">
            <i class="demo-icon icon-key"></i>
            <span class="i-name">icon-key</span>
            <span class="i-code">0xe81b</span>
        </div>
        <div title="Code: 0xe81c" class="icon-row">
            <i class="demo-icon icon-database"></i>
            <span class="i-name">icon-database</span>
            <span class="i-code">0xe81c</span>
        </div>
        <div title="Code: 0xe81d" class="icon-row">
            <i class="demo-icon icon-lock-alt"></i>
            <span class="i-name">icon-lock-alt</span>
            <span class="i-code">0xe81d</span>
        </div>
        <div title="Code: 0xe81e" class="icon-row">
            <i class="demo-icon icon-lock-open-alt"></i>
            <span class="i-name">icon-lock-open-alt</span>
            <span class="i-code">0xe81e</span>
        </div>
        <div title="Code: 0xe81f" class="icon-row">
            <i class="demo-icon icon-person"></i>
            <span class="i-name">icon-person</span>
            <span class="i-code">0xe81f</span>
        </div>
        <div title="Code: 0xe820" class="icon-row">
            <i class="demo-icon icon-block"></i>
            <span class="i-name">icon-block</span>
            <span class="i-code">0xe820</span>
        </div>
        <div title="Code: 0xe821" class="icon-row">
            <i class="demo-icon icon-user"></i>
            <span class="i-name">icon-user</span>
            <span class="i-code">0xe821</span>
        </div>
        <div title="Code: 0xe822" class="icon-row">
            <i class="demo-icon icon-megaphone"></i>
            <span class="i-name">icon-megaphone</span>
            <span class="i-code">0xe822</span>
        </div>
        <div title="Code: 0xe823" class="icon-row">
            <i class="demo-icon icon-credit-card"></i>
            <span class="i-name">icon-credit-card</span>
            <span class="i-code">0xe823</span>
        </div>
        <div title="Code: 0xe824" class="icon-row">
            <i class="demo-icon icon-clipboard"></i>
            <span class="i-name">icon-clipboard</span>
            <span class="i-code">0xe824</span>
        </div>
        <div title="Code: 0xe825" class="icon-row">
            <i class="demo-icon icon-users"></i>
            <span class="i-name">icon-users</span>
            <span class="i-code">0xe825</span>
        </div>
        <div title="Code: 0xe826" class="icon-row">
            <i class="demo-icon icon-cubes"></i>
            <span class="i-name">icon-cubes</span>
            <span class="i-code">0xe826</span>
        </div>
        <div title="Code: 0xe827" class="icon-row">
            <i class="demo-icon icon-cube"></i>
            <span class="i-name">icon-cube</span>
            <span class="i-code">0xe827</span>
        </div>
        <div title="Code: 0xe828" class="icon-row">
            <i class="demo-icon icon-coffee"></i>
            <span class="i-name">icon-coffee</span>
            <span class="i-code">0xe828</span>
        </div>
        <div title="Code: 0xe829" class="icon-row">
            <i class="demo-icon icon-leaf"></i>
            <span class="i-name">icon-leaf</span>
            <span class="i-code">0xe829</span>
        </div>
        <div title="Code: 0xe82a" class="icon-row">
            <i class="demo-icon icon-extinguisher"></i>
            <span class="i-name">icon-extinguisher</span>
            <span class="i-code">0xe82a</span>
        </div>
        <div title="Code: 0xe82b" class="icon-row">
            <i class="demo-icon icon-login"></i>
            <span class="i-name">icon-login</span>
            <span class="i-code">0xe82b</span>
        </div>
        <div title="Code: 0xe82c" class="icon-row">
            <i class="demo-icon icon-logout"></i>
            <span class="i-name">icon-logout</span>
            <span class="i-code">0xe82c</span>
        </div>
        <div title="Code: 0xe82d" class="icon-row">
            <i class="demo-icon icon-thumbs-up-alt"></i>
            <span class="i-name">icon-thumbs-up-alt</span>
            <span class="i-code">0xe82d</span>
        </div>
        <div title="Code: 0xe82e" class="icon-row">
            <i class="demo-icon icon-thumbs-down-alt"></i>
            <span class="i-name">icon-thumbs-down-alt</span>
            <span class="i-code">0xe82e</span>
        </div>
        <div title="Code: 0xe82f" class="icon-row">
            <i class="demo-icon icon-comment"></i>
            <span class="i-name">icon-comment</span>
            <span class="i-code">0xe82f</span>
        </div>
        <div title="Code: 0xe830" class="icon-row">
            <i class="demo-icon icon-chat"></i>
            <span class="i-name">icon-chat</span>
            <span class="i-code">0xe830</span>
        </div>
        <div title="Code: 0xe831" class="icon-row">
            <i class="demo-icon icon-volume-up"></i>
            <span class="i-name">icon-volume-up</span>
            <span class="i-code">0xe831</span>
        </div>
        <div title="Code: 0xe832" class="icon-row">
            <i class="demo-icon icon-volume-down"></i>
            <span class="i-name">icon-volume-down</span>
            <span class="i-code">0xe832</span>
        </div>
        <div title="Code: 0xe833" class="icon-row">
            <i class="demo-icon icon-volume-off"></i>
            <span class="i-name">icon-volume-off</span>
            <span class="i-code">0xe833</span>
        </div>
        <div title="Code: 0xe834" class="icon-row">
            <i class="demo-icon icon-up-micro"></i>
            <span class="i-name">icon-up-micro</span>
            <span class="i-code">0xe834</span>
        </div>
        <div title="Code: 0xe835" class="icon-row">
            <i class="demo-icon icon-down-micro"></i>
            <span class="i-name">icon-down-micro</span>
            <span class="i-code">0xe835</span>
        </div>
        <div title="Code: 0xe836" class="icon-row">
            <i class="demo-icon icon-town-hall"></i>
            <span class="i-name">icon-town-hall</span>
            <span class="i-code">0xe836</span>
        </div>
        <div title="Code: 0xe837" class="icon-row">
            <i class="demo-icon icon-trash"></i>
            <span class="i-name">icon-trash</span>
            <span class="i-code">0xe837</span>
        </div>
        <div title="Code: 0xe838" class="icon-row">
            <i class="demo-icon icon-warehouse"></i>
            <span class="i-name">icon-warehouse</span>
            <span class="i-code">0xe838</span>
        </div>
        <div title="Code: 0xe839" class="icon-row">
            <i class="demo-icon icon-tree-2"></i>
            <span class="i-name">icon-tree-2</span>
            <span class="i-code">0xe839</span>
        </div>
        <div title="Code: 0xe83a" class="icon-row">
            <i class="demo-icon icon-tree-1"></i>
            <span class="i-name">icon-tree-1</span>
            <span class="i-code">0xe83a</span>
        </div>
        <div title="Code: 0xe83b" class="icon-row">
            <i class="demo-icon icon-pitch"></i>
            <span class="i-name">icon-pitch</span>
            <span class="i-code">0xe83b</span>
        </div>
        <div title="Code: 0xe83c" class="icon-row">
            <i class="demo-icon icon-bin"></i>
            <span class="i-name">icon-bin</span>
            <span class="i-code">0xe83c</span>
        </div>
        <div title="Code: 0xe83d" class="icon-row">
            <i class="demo-icon icon-signal"></i>
            <span class="i-name">icon-signal</span>
            <span class="i-code">0xe83d</span>
        </div>
        <div title="Code: 0xe83e" class="icon-row">
            <i class="demo-icon icon-tag"></i>
            <span class="i-name">icon-tag</span>
            <span class="i-code">0xe83e</span>
        </div>
        <div title="Code: 0xe83f" class="icon-row">
            <i class="demo-icon icon-attention"></i>
            <span class="i-name">icon-attention</span>
            <span class="i-code">0xe83f</span>
        </div>
        <div title="Code: 0xe840" class="icon-row">
            <i class="demo-icon icon-info-circled"></i>
            <span class="i-name">icon-info-circled</span>
            <span class="i-code">0xe840</span>
        </div>
        <div title="Code: 0xe841" class="icon-row">
            <i class="demo-icon icon-help-circled"></i>
            <span class="i-name">icon-help-circled</span>
            <span class="i-code">0xe841</span>
        </div>
        <div title="Code: 0xe842" class="icon-row">
            <i class="demo-icon icon-trophy"></i>
            <span class="i-name">icon-trophy</span>
            <span class="i-code">0xe842</span>
        </div>
        <div title="Code: 0xe843" class="icon-row">
            <i class="demo-icon icon-shield"></i>
            <span class="i-name">icon-shield</span>
            <span class="i-code">0xe843</span>
        </div>
        <div title="Code: 0xe844" class="icon-row">
            <i class="demo-icon icon-star"></i>
            <span class="i-name">icon-star</span>
            <span class="i-code">0xe844</span>
        </div>
        <div title="Code: 0xe845" class="icon-row">
            <i class="demo-icon icon-star-empty"></i>
            <span class="i-name">icon-star-empty</span>
            <span class="i-code">0xe845</span>
        </div>
        <div title="Code: 0xe846" class="icon-row">
            <i class="demo-icon icon-heart-empty"></i>
            <span class="i-name">icon-heart-empty</span>
            <span class="i-code">0xe846</span>
        </div>
        <div title="Code: 0xe847" class="icon-row">
            <i class="demo-icon icon-heart"></i>
            <span class="i-name">icon-heart</span>
            <span class="i-code">0xe847</span>
        </div>
        <div title="Code: 0xe848" class="icon-row">
            <i class="demo-icon icon-user-add"></i>
            <span class="i-name">icon-user-add</span>
            <span class="i-code">0xe848</span>
        </div>
        <div title="Code: 0xe849" class="icon-row">
            <i class="demo-icon icon-doc"></i>
            <span class="i-name">icon-doc</span>
            <span class="i-code">0xe849</span>
        </div>
        <div title="Code: 0xe84a" class="icon-row">
            <i class="demo-icon icon-docs"></i>
            <span class="i-name">icon-docs</span>
            <span class="i-code">0xe84a</span>
        </div>
        <div title="Code: 0xe84b" class="icon-row">
            <i class="demo-icon icon-book"></i>
            <span class="i-name">icon-book</span>
            <span class="i-code">0xe84b</span>
        </div>
        <div title="Code: 0xe84c" class="icon-row">
            <i class="demo-icon icon-puzzle"></i>
            <span class="i-name">icon-puzzle</span>
            <span class="i-code">0xe84c</span>
        </div>
        <div title="Code: 0xe84d" class="icon-row">
            <i class="demo-icon icon-bank"></i>
            <span class="i-name">icon-bank</span>
            <span class="i-code">0xe84d</span>
        </div>
        <div title="Code: 0xe84e" class="icon-row">
            <i class="demo-icon icon-building-filled"></i>
            <span class="i-name">icon-building-filled</span>
            <span class="i-code">0xe84e</span>
        </div>
        <div title="Code: 0xe84f" class="icon-row">
            <i class="demo-icon icon-bookmarks"></i>
            <span class="i-name">icon-bookmarks</span>
            <span class="i-code">0xe84f</span>
        </div>
        <div title="Code: 0xe850" class="icon-row">
            <i class="demo-icon icon-bookmark"></i>
            <span class="i-name">icon-bookmark</span>
            <span class="i-code">0xe850</span>
        </div>
        <div title="Code: 0xe851" class="icon-row">
            <i class="demo-icon icon-alert"></i>
            <span class="i-name">icon-alert</span>
            <span class="i-code">0xe851</span>
        </div>
        <div title="Code: 0xe852" class="icon-row">
            <i class="demo-icon icon-shuffle"></i>
            <span class="i-name">icon-shuffle</span>
            <span class="i-code">0xe852</span>
        </div>
        <div title="Code: 0xe853" class="icon-row">
            <i class="demo-icon icon-level-down"></i>
            <span class="i-name">icon-level-down</span>
            <span class="i-code">0xe853</span>
        </div>
        <div title="Code: 0xe854" class="icon-row">
            <i class="demo-icon icon-level-up"></i>
            <span class="i-name">icon-level-up</span>
            <span class="i-code">0xe854</span>
        </div>
        <div title="Code: 0xe855" class="icon-row">
            <i class="demo-icon icon-arrows-ccw"></i>
            <span class="i-name">icon-arrows-ccw</span>
            <span class="i-code">0xe855</span>
        </div>
        <div title="Code: 0xe856" class="icon-row">
            <i class="demo-icon icon-loop"></i>
            <span class="i-name">icon-loop</span>
            <span class="i-code">0xe856</span>
        </div>
        <div title="Code: 0xe857" class="icon-row">
            <i class="demo-icon icon-brush"></i>
            <span class="i-name">icon-brush</span>
            <span class="i-code">0xe857</span>
        </div>
        <div title="Code: 0xe858" class="icon-row">
            <i class="demo-icon icon-chart-line-1"></i>
            <span class="i-name">icon-chart-line-1</span>
            <span class="i-code">0xe858</span>
        </div>
        <div title="Code: 0xe859" class="icon-row">
            <i class="demo-icon icon-chart-bar-1"></i>
            <span class="i-name">icon-chart-bar-1</span>
            <span class="i-code">0xe859</span>
        </div>
        <div title="Code: 0xe85a" class="icon-row">
            <i class="demo-icon icon-chart-area-1"></i>
            <span class="i-name">icon-chart-area-1</span>
            <span class="i-code">0xe85a</span>
        </div>
        <div title="Code: 0xe85b" class="icon-row">
            <i class="demo-icon icon-rocket"></i>
            <span class="i-name">icon-rocket</span>
            <span class="i-code">0xe85b</span>
        </div>
        <div title="Code: 0xe85c" class="icon-row">
            <i class="demo-icon icon-infinity"></i>
            <span class="i-name">icon-infinity</span>
            <span class="i-code">0xe85c</span>
        </div>
        <div title="Code: 0xe85d" class="icon-row">
            <i class="demo-icon icon-erase"></i>
            <span class="i-name">icon-erase</span>
            <span class="i-code">0xe85d</span>
        </div>
        <div title="Code: 0xe85e" class="icon-row">
            <i class="demo-icon icon-dot"></i>
            <span class="i-name">icon-dot</span>
            <span class="i-code">0xe85e</span>
        </div>
        <div title="Code: 0xe85f" class="icon-row">
            <i class="demo-icon icon-dot-2"></i>
            <span class="i-name">icon-dot-2</span>
            <span class="i-code">0xe85f</span>
        </div>
        <div title="Code: 0xe860" class="icon-row">
            <i class="demo-icon icon-dot-3"></i>
            <span class="i-name">icon-dot-3</span>
            <span class="i-code">0xe860</span>
        </div>
        <div title="Code: 0xe861" class="icon-row">
            <i class="demo-icon icon-box"></i>
            <span class="i-name">icon-box</span>
            <span class="i-code">0xe861</span>
        </div>
        <div title="Code: 0xe862" class="icon-row">
            <i class="demo-icon icon-feather"></i>
            <span class="i-name">icon-feather</span>
            <span class="i-code">0xe862</span>
        </div>
        <div title="Code: 0xe863" class="icon-row">
            <i class="demo-icon icon-attach"></i>
            <span class="i-name">icon-attach</span>
            <span class="i-code">0xe863</span>
        </div>
        <div title="Code: 0xe864" class="icon-row">
            <i class="demo-icon icon-check"></i>
            <span class="i-name">icon-check</span>
            <span class="i-code">0xe864</span>
        </div>
        <div title="Code: 0xe865" class="icon-row">
            <i class="demo-icon icon-cancel"></i>
            <span class="i-name">icon-cancel</span>
            <span class="i-code">0xe865</span>
        </div>
        <div title="Code: 0xe866" class="icon-row">
            <i class="demo-icon icon-note"></i>
            <span class="i-name">icon-note</span>
            <span class="i-code">0xe866</span>
        </div>
        <div title="Code: 0xe867" class="icon-row">
            <i class="demo-icon icon-note-beamed"></i>
            <span class="i-name">icon-note-beamed</span>
            <span class="i-code">0xe867</span>
        </div>
        <div title="Code: 0xe868" class="icon-row">
            <i class="demo-icon icon-flashlight"></i>
            <span class="i-name">icon-flashlight</span>
            <span class="i-code">0xe868</span>
        </div>
        <div title="Code: 0xe869" class="icon-row">
            <i class="demo-icon icon-cancel-circled"></i>
            <span class="i-name">icon-cancel-circled</span>
            <span class="i-code">0xe869</span>
        </div>
        <div title="Code: 0xe86a" class="icon-row">
            <i class="demo-icon icon-cancel-squared"></i>
            <span class="i-name">icon-cancel-squared</span>
            <span class="i-code">0xe86a</span>
        </div>
        <div title="Code: 0xe86b" class="icon-row">
            <i class="demo-icon icon-plus-circled"></i>
            <span class="i-name">icon-plus-circled</span>
            <span class="i-code">0xe86b</span>
        </div>
        <div title="Code: 0xe86c" class="icon-row">
            <i class="demo-icon icon-plus-squared"></i>
            <span class="i-name">icon-plus-squared</span>
            <span class="i-code">0xe86c</span>
        </div>
        <div title="Code: 0xe86d" class="icon-row">
            <i class="demo-icon icon-plus"></i>
            <span class="i-name">icon-plus</span>
            <span class="i-code">0xe86d</span>
        </div>
        <div title="Code: 0xe86e" class="icon-row">
            <i class="demo-icon icon-minus"></i>
            <span class="i-name">icon-minus</span>
            <span class="i-code">0xe86e</span>
        </div>
        <div title="Code: 0xe86f" class="icon-row">
            <i class="demo-icon icon-minus-circled"></i>
            <span class="i-name">icon-minus-circled</span>
            <span class="i-code">0xe86f</span>
        </div>
        <div title="Code: 0xe870" class="icon-row">
            <i class="demo-icon icon-minus-squared"></i>
            <span class="i-name">icon-minus-squared</span>
            <span class="i-code">0xe870</span>
        </div>
        <div title="Code: 0xe871" class="icon-row">
            <i class="demo-icon icon-link"></i>
            <span class="i-name">icon-link</span>
            <span class="i-code">0xe871</span>
        </div>
        <div title="Code: 0xe872" class="icon-row">
            <i class="demo-icon icon-quote"></i>
            <span class="i-name">icon-quote</span>
            <span class="i-code">0xe872</span>
        </div>
        <div title="Code: 0xe873" class="icon-row">
            <i class="demo-icon icon-resize-full"></i>
            <span class="i-name">icon-resize-full</span>
            <span class="i-code">0xe873</span>
        </div>
        <div title="Code: 0xe874" class="icon-row">
            <i class="demo-icon icon-resize-small"></i>
            <span class="i-name">icon-resize-small</span>
            <span class="i-code">0xe874</span>
        </div>
        <div title="Code: 0xe875" class="icon-row">
            <i class="demo-icon icon-ccw"></i>
            <span class="i-name">icon-ccw</span>
            <span class="i-code">0xe875</span>
        </div>
        <div title="Code: 0xe876" class="icon-row">
            <i class="demo-icon icon-cw"></i>
            <span class="i-name">icon-cw</span>
            <span class="i-code">0xe876</span>
        </div>
        <div title="Code: 0xe877" class="icon-row">
            <i class="demo-icon icon-switch"></i>
            <span class="i-name">icon-switch</span>
            <span class="i-code">0xe877</span>
        </div>
        <div title="Code: 0xe878" class="icon-row">
            <i class="demo-icon icon-target"></i>
            <span class="i-name">icon-target</span>
            <span class="i-code">0xe878</span>
        </div>
        <div title="Code: 0xe879" class="icon-row">
            <i class="demo-icon icon-book-1"></i>
            <span class="i-name">icon-book-1</span>
            <span class="i-code">0xe879</span>
        </div>
        <div title="Code: 0xe87a" class="icon-row">
            <i class="demo-icon icon-book-alt"></i>
            <span class="i-name">icon-book-alt</span>
            <span class="i-code">0xe87a</span>
        </div>
        <div title="Code: 0xe87b" class="icon-row">
            <i class="demo-icon icon-search-1"></i>
            <span class="i-name">icon-search-1</span>
            <span class="i-code">0xe87b</span>
        </div>
        <div title="Code: 0xe87c" class="icon-row">
            <i class="demo-icon icon-crown"></i>
            <span class="i-name">icon-crown</span>
            <span class="i-code">0xe87c</span>
        </div>
        <div title="Code: 0xe87d" class="icon-row">
            <i class="demo-icon icon-book-2"></i>
            <span class="i-name">icon-book-2</span>
            <span class="i-code">0xe87d</span>
        </div>
        <div title="Code: 0xe87e" class="icon-row">
            <i class="demo-icon icon-grid"></i>
            <span class="i-name">icon-grid</span>
            <span class="i-code">0xe87e</span>
        </div>
        <div title="Code: 0xe87f" class="icon-row">
            <i class="demo-icon icon-award"></i>
            <span class="i-name">icon-award</span>
            <span class="i-code">0xe87f</span>
        </div>
        <div title="Code: 0xe880" class="icon-row">
            <i class="demo-icon icon-clock"></i>
            <span class="i-name">icon-clock</span>
            <span class="i-code">0xe880</span>
        </div>
        <div title="Code: 0xe881" class="icon-row">
            <i class="demo-icon icon-home-1"></i>
            <span class="i-name">icon-home-1</span>
            <span class="i-code">0xe881</span>
        </div>
        <div title="Code: 0xe882" class="icon-row">
            <i class="demo-icon icon-monitor"></i>
            <span class="i-name">icon-monitor</span>
            <span class="i-code">0xe882</span>
        </div>
        <div title="Code: 0xe883" class="icon-row">
            <i class="demo-icon icon-mobile"></i>
            <span class="i-name">icon-mobile</span>
            <span class="i-code">0xe883</span>
        </div>
        <div title="Code: 0xe884" class="icon-row">
            <i class="demo-icon icon-tablet"></i>
            <span class="i-name">icon-tablet</span>
            <span class="i-code">0xe884</span>
        </div>
        <div title="Code: 0xe885" class="icon-row">
            <i class="demo-icon icon-giraffe"></i>
            <span class="i-name">icon-giraffe</span>
            <span class="i-code">0xe885</span>
        </div>
        <div title="Code: 0xe886" class="icon-row">
            <i class="demo-icon icon-crown-plus"></i>
            <span class="i-name">icon-crown-plus</span>
            <span class="i-code">0xe886</span>
        </div>
        <div title="Code: 0xe887" class="icon-row">
            <i class="demo-icon icon-crown-minus"></i>
            <span class="i-name">icon-crown-minus</span>
            <span class="i-code">0xe887</span>
        </div>
        <div title="Code: 0xe888" class="icon-row">
            <i class="demo-icon icon-shield-"></i>
            <span class="i-name">icon-shield-</span>
            <span class="i-code">0xe888</span>
        </div>
        <div title="Code: 0xe889" class="icon-row">
            <i class="demo-icon icon-shield-chevron"></i>
            <span class="i-name">icon-shield-chevron</span>
            <span class="i-code">0xe889</span>
        </div>
        <div title="Code: 0xe88a" class="icon-row">
            <i class="demo-icon icon-shield-fessewise"></i>
            <span class="i-name">icon-shield-fessewise</span>
            <span class="i-code">0xe88a</span>
        </div>
        <div title="Code: 0xe88b" class="icon-row">
            <i class="demo-icon icon-shield-party"></i>
            <span class="i-name">icon-shield-party</span>
            <span class="i-code">0xe88b</span>
        </div>
        <div title="Code: 0xe88c" class="icon-row">
            <i class="demo-icon icon-shield-chief"></i>
            <span class="i-name">icon-shield-chief</span>
            <span class="i-code">0xe88c</span>
        </div>
        <div title="Code: 0xe88d" class="icon-row">
            <i class="demo-icon icon-shield-solid"></i>
            <span class="i-name">icon-shield-solid</span>
            <span class="i-code">0xe88d</span>
        </div>
        <div title="Code: 0xe88e" class="icon-row">
            <i class="demo-icon icon-shield-quarterly"></i>
            <span class="i-name">icon-shield-quarterly</span>
            <span class="i-code">0xe88e</span>
        </div>
        <div title="Code: 0xe88f" class="icon-row">
            <i class="demo-icon icon-shield-tri-fesse"></i>
            <span class="i-name">icon-shield-tri-fesse</span>
            <span class="i-code">0xe88f</span>
        </div>
        <div title="Code: 0xe890" class="icon-row">
            <i class="demo-icon icon-shield-pile"></i>
            <span class="i-name">icon-shield-pile</span>
            <span class="i-code">0xe890</span>
        </div>
        <div title="Code: 0xe891" class="icon-row">
            <i class="demo-icon icon-shield-stripe-sinister"></i>
            <span class="i-name">icon-shield-stripe-sinister</span>
            <span class="i-code">0xe891</span>
        </div>
        <div title="Code: 0xe892" class="icon-row">
            <i class="demo-icon icon-shield-stripe"></i>
            <span class="i-name">icon-shield-stripe</span>
            <span class="i-code">0xe892</span>
        </div>
        <div title="Code: 0xe893" class="icon-row">
            <i class="demo-icon icon-shield-dotty"></i>
            <span class="i-name">icon-shield-dotty</span>
            <span class="i-code">0xe893</span>
        </div>
        <div title="Code: 0xe894" class="icon-row">
            <i class="demo-icon icon-shield-bend-sinister"></i>
            <span class="i-name">icon-shield-bend-sinister</span>
            <span class="i-code">0xe894</span>
        </div>
        <div title="Code: 0xe895" class="icon-row">
            <i class="demo-icon icon-shield-bend"></i>
            <span class="i-name">icon-shield-bend</span>
            <span class="i-code">0xe895</span>
        </div>
        <div title="Code: 0xe896" class="icon-row">
            <i class="demo-icon icon-shield-fesse"></i>
            <span class="i-name">icon-shield-fesse</span>
            <span class="i-code">0xe896</span>
        </div>
        <div title="Code: 0xe897" class="icon-row">
            <i class="demo-icon icon-shield-pale"></i>
            <span class="i-name">icon-shield-pale</span>
            <span class="i-code">0xe897</span>
        </div>
        <div title="Code: 0xe898" class="icon-row">
            <i class="demo-icon icon-shield-cross"></i>
            <span class="i-name">icon-shield-cross</span>
            <span class="i-code">0xe898</span>
        </div>
        <div title="Code: 0xe899" class="icon-row">
            <i class="demo-icon icon-shield-bendwise"></i>
            <span class="i-name">icon-shield-bendwise</span>
            <span class="i-code">0xe899</span>
        </div>
        <div title="Code: 0xe89a" class="icon-row">
            <i class="demo-icon icon-shield-bendwise-sinister"></i>
            <span class="i-name">icon-shield-bendwise-sinister</span>
            <span class="i-code">0xe89a</span>
        </div>
        <div title="Code: 0xe89b" class="icon-row">
            <i class="demo-icon icon-shield-border"></i>
            <span class="i-name">icon-shield-border</span>
            <span class="i-code">0xe89b</span>
        </div>
        <div title="Code: 0xe89c" class="icon-row">
            <i class="demo-icon icon-shield-saltirewise"></i>
            <span class="i-name">icon-shield-saltirewise</span>
            <span class="i-code">0xe89c</span>
        </div>
    </div>
</div>
@endsection
