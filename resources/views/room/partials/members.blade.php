<div class="panel">
    <div class="panel-header">
        <h4 class="panel-title">
            <i class="icon-users"></i> Members
        </h4>
    </div>
    <div class="panel-body">
        <ul>
            <li>{{ $room->owner->username }} <i class="icon-crown"></i></li>
            @foreach($room->members as $member)
                <li>{{ $member->username }}</li>
            @endforeach
        </ul>
        @can('invite', $room)
            <form action="{{ route('room.invite', ['room' => $room->name]) }}" method="post" accept-charset="utf-8">

                {{ csrf_field() }}

                <div class="row">
                    <div class='column three-fourths'>
                        <input type="text" class="form-control" id="input-identifier" name="identifier" value="{{ old('identifier') }}" placeholder="Username or email">
                    </div>
                    <div class='column one-fourth'>
                        <button type="submit" class="btn btn-block btn-primary">
                            <i class="icon-user-plus"></i> Invite user
                        </button>
                    </div>
                </div>

            </form>
        @endcan
    </div>
</div>
