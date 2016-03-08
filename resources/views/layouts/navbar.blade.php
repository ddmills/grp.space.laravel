<div class="app-navigation">
    <nav class="container">
        {{-- <img src="/images/crest-white.png" height="24px" class="pull-left" /> --}}
        <a href="{{ route('home') }}" class="app-nav-logo pull-left">
            <i class="fa fa-fw fa-shield"></i>
            grp.space
        </a>
        <div class="nav-group pull-right">
            @if ($userLoggedIn)
                <a class="nav-item" href="{{ route('dashboard.index', ['user' => $user->username]) }}">
                    <i class="fa fa-fw fa-user"></i>
                    {{ $user->username }}
                </a>
            @else
                <a class="nav-item" href="{{ route('auth.login') }}">
                    <i class="fa fa-fw fa-sign-in"></i>
                    Sign in
                </a>
            @endif
        </div>
        <span class="clearfix"></span>
    </nav>
</div>
