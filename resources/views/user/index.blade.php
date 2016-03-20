@extends('layouts.master')

@section('page.header')
    <header class="page-header">
        <div class="container">
            <h2 class='page-title'>
                Users ({{ $users->total() }})
            </h2>
        </div>
    </header>
@endsection

@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>role/username</th>
                <th>email</th>
                <th>created</th>
                <th>rooms</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        @if ($user->hasRole('admin'))
                            <i class="icon-crown"></i>
                        @else
                            <i class="icon-user"></i>
                        @endif
                        <a href="{{ route('user.show', $user->username) }}">
                            {{ $user->username }}
                        </a>
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->created_at }}
                    </td>
                    <td>
                        {{ $user->rooms->count() }}/{{ $user->following->count() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="btn-group">
        @if ($users->previousPageUrl())
            <a class="btn btn-default" href="{{ $users->previousPageUrl() }}">
                <<
            </a>
        @else
            <a class="btn btn-default disabled" href="#">
                <<
            </a>
        @endif

        @if ($users->hasMorePages())
            <a class="btn btn-default" href="{{ $users->nextPageUrl() }}">
                >>
            </a>
        @else
            <a class="btn btn-default disabled" href="#">
                >>
            </a>
        @endif
    </div>

@endsection
