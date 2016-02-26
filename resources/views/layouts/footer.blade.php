<footer class="app-footer">
    <footer class="container">
        <div class="row">
            <div class="column one-third">
                ddmills &middot; {{ date("Y") }}<br>
                <a href="{{ route('styleguide') }}">
                    don"t sail too close to the wind
                </a><br>
                {{ env('RELEASE') }}
            </div>
            <div class="column one-third">
                <a href="{{ route('home') }}">home</a><br>
                <a href="{{ route('room.create') }}">create room</a><br>
            </div>
            <div class="column one-third">
                @if (Auth::check())
                    <a href="{{ route('auth.logout') }}">Sign out</a><br>
                @else
                    <a href="{{ route('auth.register') }}">Sign up</a><br>
                    <a href="{{ route('auth.login') }}">Sign in</a>
                @endif
            </div>
        </div>
    </footer>
</footer>
