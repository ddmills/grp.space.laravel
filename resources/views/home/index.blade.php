@extends('layouts.master')

@section('content')

<form method='GET' charset='utf-8'>
    <input type='text' name='room_name' required>
    <button type='submit'>go</button>
</form>

@endsection
