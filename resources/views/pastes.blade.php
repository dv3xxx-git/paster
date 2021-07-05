@extends('layouts.app')

@section('content')
<div style="width: 50%;">
    @foreach($pastes as $paste)
    <a href="{{route('paste.show',$paste->hash)}}">{{$paste->name}}</a>
    {{$paste->accept_public}}
    </br>
    @endforeach
</div>
<div>
    <form method="POST" action="/paste">
        @csrf
        <input type="text" name="name" placeholder="name" require>
        <textarea type="text" name="text"></textarea>
        <button>save</button>
    </form>
    </div>
@endsection