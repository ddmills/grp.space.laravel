@extends('layouts.master')

@section('content')
    <h1><i class="fa fa-fw fa-anchor"></i> Group Space</h1>
    <p class="lead">Space for group hangout and collaboration.</p>
    @include('other.steps', ['actions' => true])
@endsection
