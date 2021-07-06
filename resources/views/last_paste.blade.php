    @foreach($last_paste as $paste)
    <a href="{{route('paste.show',$paste->hash)}}">{{$paste->name}}</a>
    {{$paste->accept_public}}
    </br>
    @endforeach