@extends('layouts.base')

@section('body')
    @include('layouts.navbar')
    @yield('page.header')
    @include('common.notifications')
    @include('layouts.content')
    @include('layouts.footer')
    @include('layouts.javascript')
@endsection
