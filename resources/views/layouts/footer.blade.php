<footer class='app-footer'>
    <footer class='container'>
        <a href="{{ route('styleguide') }}">
            don't sail too close to the wind
        </a>
        &middot;
        ddmills
        &middot;
        {{ date('Y') }}
        &middot;
        {{ env('RELEASE') }}
    </footer>
</footer>
