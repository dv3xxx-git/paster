@extends('layouts.app')

@section('content')
<a href="{{route('paste.show',$paste->hash)}}">{{route('paste.show',$paste->hash)}}</a>
<br>
@include('last_paste')
@endsection