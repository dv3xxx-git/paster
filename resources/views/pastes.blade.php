@extends('layouts.app')

@section('content')
<br>
<livewire:search />
<div style="width: 50%;">
    <div>
        <ul>
            @foreach($pastes as $paste)
            <li>
                <p>
                    <a href="{{route('paste.show',$paste->hash)}}">{{$paste->name}}</a>

                    {{$paste->accept_public}}
                    {{$paste->change_lang}}
                </p>
            </li>
            @endforeach
        </ul>
    </div>

    <div>
        <form method="POST" action="/paste">
            @csrf
            <input type="text" name="name" placeholder="name" require>
            <select name="accept_public" id="accept_public">
                <option value="0">public</option>
                <option value="1">unlisted</option>
                @if (Auth::check())
                <option value="2">private</option>
                @endif
            </select>
            <select name="change_lang">
                <option value="php">php</option>
                <option value="js">js</option>
                <option value="HTML">html</option>
            </select>
            <select name="timer" id="timer">
                <option value="0">none</option>
                <option value="1">10 min</option>
                <option value="2">1 hour</option>
                <option value="3">3 hours</option>
                <option value="4">1 day</option>
                <option value="5">1 week</option>
                <option value="6">1 month</option>
            </select>
            <textarea type="text" name="text"></textarea>
            <button>save</button>
        </form>
    </div>
    @include('last_paste')
    @endsection