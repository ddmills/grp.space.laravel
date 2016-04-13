<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>grp.space</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="/public/favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700|Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/fonts/wander/css/animation.css">
        <link rel="stylesheet" href="/fonts/wander/css/wander.css">
        <link rel="stylesheet" href="{{ elixir('css/bundle.css') }}">
    </head>
    <body>
        @yield('body')
        <script src="{{ elixir('js/bundle.js') }}"></script>
    </body>
</html>
