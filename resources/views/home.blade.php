<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

    </head>
    <body class="antialiased">
        <div style="width: 50%;">
        @foreach($pastes as $paste)
            {{$paste->name}}
            <a href="#">{{$paste->link}}</a>
            </br>
        @endforeach
        </div>
        <div>
            <form method="POST" action="/">
            @csrf
            <input type="text" name="text">
            <button></button>
            </form>
        </dib>
    </body>
</html>
