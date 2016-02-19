<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>grp.space</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
        <link rel="stylesheet" href="www.google.com">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </body>
</html>
