@extends('layouts.app')

@section('content')
<div style="width: 50%;">
    @foreach($pastes as $paste)
    <a href="{{route('paste.show',$paste->hash)}}">{{$paste->name}}</a>
    {{$paste->accept_public}}
    {{$paste->change_lang}}
    </br>
    @endforeach

    {{$pastes->render()}}
</div>
@include('last_paste')
@endsection