<nav class="tabs room-subnav">
    <a class="tab {{ $routeName == 'room.show' ? 'active' : '' }}" href="{{ route('room.show', $room->name) }}">
        <i class="fa fa-fw fa-comments"></i>
        Chat
    </a>
    <a class="tab {{ $routeName == 'room.index' ? 'active' : '' }}" href="{{ route('room.index') }}">
        <i class="fa fa-fw fa-users"></i>
        Directory
    </a>
    @can('administer', $room)
        <a class="tab {{ $routeName == 'room.settings' ? 'active' : '' }}" href="{{ route('room.settings', $room->name) }}">
            <i class="fa fa-fw fa-gear"></i>
            Settings
        </a>
    @endcan
</nav>
