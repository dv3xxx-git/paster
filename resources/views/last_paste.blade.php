@foreach($last_paste as $paste)
<a href="{{route('paste.show',$paste->hash)}}">{{$paste->name}}</a>
{{$paste->accept_public}}
</br>
@endforeach

{{-- block with last user past--}}
<br>
<br>

<br>
@if(isset($user_pastes))
@foreach($user_pastes as $user_paste)

<a href="{{route('paste.show',$user_paste->hash)}}">{{$user_paste->name}}</a>
{{$user_paste->accept_public}}
</br>
@endforeach
@endif