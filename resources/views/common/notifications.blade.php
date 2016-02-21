@if (count($errors) > 0)
    <div class='app-notifications'>
        <div class='container'>
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
            @endforeach
        </div>
    </div>
@endif
