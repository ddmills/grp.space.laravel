{{-- <div class="app-stripe"></div> --}}
<header class="app-header">
    <div class="container">
        <a href="{{ route('home') }}" class="app-header-logo pull-left">
            grp.space
        </a>
        <div class="btn-group btn-group-sm pull-right">
        @if (Auth::check())
            <a class="btn btn-sm btn-default" href="{{ route('auth.logout') }}">Sign out</a>
        @else
            <a class="btn btn-primary" href="{{ route('auth.register') }}">Sign up</a>
            <a class="btn btn-default" href="{{ route('auth.login') }}">Sign in</a>
        @endif
        </div>
        <span class="clearfix"></span>
    </div>
</header>
<header class="app-subheader">
    <div class="container">
        @yield('subheader')
    </div>
</header>
