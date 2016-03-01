<div class="app-navigation">
    <nav class="container">
        <a href="{{ route('home') }}" class="app-nav-logo pull-left">
            <i class="fa fa-fw fa-cube"></i> grp.space
        </a>
        <div class="nav-group pull-right">
            @if ($userLoggedIn)
                <a class="nav-item" href="{{ route('dashboard.index', ['user' => $user->username]) }}">Profile</a>
                <a class="nav-item" href="{{ route('auth.logout') }}">Sign out</a>
            @else
                <a class="nav-item" href="{{ route('auth.register') }}">Sign up</a>
                <a class="nav-item" href="{{ route('auth.login') }}">Sign in</a>
            @endif
        </div>
        <span class="clearfix"></span>
    </nav>
</div>
