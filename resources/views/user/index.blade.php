@extends('layouts.master')

@section('page.header')
    <header class="page-header">
        <div class="container">
            <h2 class='page-title'>
                User Index
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
                        <a href="{{ route('user.dashboard', $user->username) }}">
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

@endsection
