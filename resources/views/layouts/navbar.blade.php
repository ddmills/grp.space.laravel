<div class="app-navigation">
    <nav class="container">
        {{-- <img src="/images/crest-white.png" height="24px" class="pull-left" /> --}}
        <a href="{{ route('home') }}" class="app-nav-logo pull-left">
            <i class="icon-giraffe"></i>
            grp.space
        </a>
        <div class="nav-group pull-right">
            @if ($userLoggedIn)
                <a
                    class="nav-item"
                    href="{{ route('user.dashboard', ['user' => $user->username]) }}"
                    title="{{ $user->username }}"
                >
                    @if ($user->hasRole('admin'))
                        <i class="icon-crown"></i>
                    @else
                        <i class="icon-user"></i>
                    @endif
                </a>
            @else
                <a class="nav-item" href="{{ route('auth.login') }}">
                    <i class="icon-login"></i>
                    Sign in
                </a>
            @endif
        </div>
        <span class="clearfix"></span>
    </nav>
</div>
