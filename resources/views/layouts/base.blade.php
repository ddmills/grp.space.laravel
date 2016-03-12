<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>grp.space</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="/public/favicon.ico">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lora|Work+Sans:400,600,700' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700|Montserrat:400,700' rel='stylesheet' type='text/css'>
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> --}}
        <link rel="stylesheet" href="/fonts/wander/css/animation.css">
        <link rel="stylesheet" href="/fonts/wander/css/wander.css">
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    </head>
    <body>
        @yield('body')
        @yield('javascript')
    </body>
</html>
