@extends('layouts.app')

@section('content')
    {{$paste->name}}
    </br>
    @include('last_paste')

@endsection