<div class="panel">
    <div class="panel-header">
        <h4 class="panel-title">
            <i class="icon-users"></i> Members
        </h4>
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>role</th>
                    <th>username</th>
                    <th>created</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <i class="icon-crown"></i> owner
                    </td>
                    <td>
                        <a href="{{ route('user.show', $room->owner->username) }}">
                            {{ $room->owner->username }}
                        </a>
                    </td>
                    <td>{{ $room->owner->created_at }}</td>
                </tr>
                @foreach($room->members as $member)
                    <tr>
                        <td>
                            <i class="icon-user"></i> member
                        </td>
                        <td>
                            <a href="{{ route('user.show', $member->username) }}">
                                {{ $member->username }}
                            </a>
                        </td>
                        <td>{{ $member->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @can('invite', $room)
            <br>
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
