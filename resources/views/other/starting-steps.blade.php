<div class="starting-steps">
    <div class="step {{ Auth::check() ? 'disable' : 'active' }}">
        <span class="step-icon">
            <i class="fa fa-fw fa-male"></i>
        </span>
        <span class="step-num">Step 1:</span>
        <span class="step-desc">
            Set up a personal account.
            @if($actions)
                <div class='btn-group btn-group-justified step-action'>
                    <a href="{{ route('auth.register') }}" class="btn {{ Auth::check() ? 'btn-default disabled' : 'btn-primary' }}">Sign up</a>
                    <a href="{{ route('auth.login') }}" class="btn btn-default {{ Auth::check() ? 'disabled' : '' }}">Sign in</a>
                </div>
            @endif
        </span>
    </div>
    <div class="step {{ Auth::check() ? 'active' : 'disable' }}">
        <span class="step-icon">
            <i class="fa fa-fw fa-book"></i>
        </span>
        <span class="step-num">Step 2:</span>
        <span class="step-desc">Create and configure a room.</span>
        @if($actions)
            <a href="{{ route('room.create') }}" class="btn step-action btn-block {{ Auth::check() ? 'btn-primary' : 'btn-default disabled' }}">Create room</a>
        @endif
    </div>
    <div class="step {{ Auth::check() ? 'disable' : 'disable' }}">
        <span class="step-icon">
            <i class="fa fa-fw fa-beer"></i>
        </span>
        <span class="step-num">Step 3:</span>
        <span class="step-desc">Invite your friends.</span>
        @if($actions)
            <a href="{{ route('room.create') }}" class="btn step-action btn-block btn-default disabled">Invite friends</a>
        @endif
    </div>
</div>
