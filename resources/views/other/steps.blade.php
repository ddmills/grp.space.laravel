@if($showSteps)
    <div class="starting-steps">
        <div class="step {{ $activeStep == 1 ? 'active' : 'disabled' }}">
            <span class="step-icon">
                <i class="icon-user"></i>
            </span>
            <span class="step-num">Step 1:</span>
            <span class="step-desc">
                Set up a personal account.
                @if($actions)
                    <div class='btn-group btn-group-justified step-action'>
                        <a href="{{ route('auth.register') }}" class="btn {{ $activeStep == 1 ? 'btn-primary' : 'btn-default disabled' }}">
                            Sign up
                        </a>
                        <a href="{{ route('auth.login') }}" class="btn btn-default {{ $activeStep == 1 ? '' : 'disabled' }}">
                            Sign in
                        </a>
                    </div>
                @endif
            </span>
        </div>
        <div class="step {{ $activeStep == 2 ? 'active' : 'disabled' }}">
            <span class="step-icon">
                <i class="icon-book"></i>
            </span>
            <span class="step-num">Step 2:</span>
            <span class="step-desc">Create and configure a room.</span>
            @if($actions)
                <a href="{{ route('room.create') }}" class="btn step-action btn-block {{ $activeStep == 2 ? 'btn-primary' : 'btn-default disabled' }}">
                    Create room
                </a>
            @endif
        </div>
        <div class="step {{ $activeStep == 3 ? 'active' : 'disabled' }}">
            <span class="step-icon">
                <i class="icon-coffee"></i>
            </span>
            <span class="step-num">Step 3:</span>
            <span class="step-desc">Invite your friends.</span>
            @if($actions)
                <a href="{{ route('room.settings', $stepThreeRoom) }}" class="btn step-action btn-block {{ $activeStep == 3 ? 'btn-primary' : 'btn-default disabled' }}">
                    Invite friends
                </a>
            @endif
        </div>
    </div>
@endif
