<div class="app-notifications">
    <div class="container">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <i class="alert-icon icon-flag"></i>
                    <span class="alert-body">
                        {{ $error }}
                    </span>
                </div>
            @endforeach
        @endif
        @if (session('warning'))
            <div class="alert alert-warning">
                <i class="alert-icon icon-attention"></i>
                <span class="alert-body">
                    {{ session('warning') }}
                </span>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                <i class="alert-icon icon-award"></i>
                <span class="alert-body">
                    {{ session('success') }}
                </span>
            </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger">
                <i class="alert-icon icon-flag"></i>
                <span class="alert-body">
                    {{ session('danger') }}
                </span>
            </div>
        @endif
    </div>
</div>
