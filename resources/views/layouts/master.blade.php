<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>grp.space</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    </head>
    <body>
        @include('layouts.header')
        @include('common.notifications')
        @include('layouts.content')
        @include('layouts.footer')
    </body>
</html>
