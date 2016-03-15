<nav class="tabs room-subnav">
    <a class="tab {{ $routeName == 'room.show' ? 'active' : '' }}" href="{{ route('room.show', $room->name) }}">
        <i class="icon-comment"></i>
        Chat
    </a>
    <a class="tab {{ $routeName == 'room.video' ? 'active' : '' }}" href="{{ route('room.show', $room->name) }}">
        <i class="icon-garden"></i>
        Video
    </a>
    <a class="tab {{ $routeName == 'room.directory' ? 'active' : '' }}" href="{{ route('room.directory', $room->name) }}">
        <i class="icon-users"></i>
        Directory
    </a>
    @can('administer', $room)
        <a class="tab {{ $routeName == 'room.settings' ? 'active' : '' }}" href="{{ route('room.settings', $room->name) }}">
            <i class="icon-cogs"></i>
            Settings
        </a>
    @endcan
</nav>
