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
        <a href="">{{$paste->name}}</a>
        </br>
        @endforeach
    </div>
    <div>
        <form method="POST" action="/">
            @csrf
            <input type="text" name="name" placeholder="name" require>
            <textarea type="text" name="text"></textarea>
            <button>save</button>
        </form>
        </dib>
</body>

</html>