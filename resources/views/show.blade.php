@extends('layouts.app')

@section('content')
<pre class="prettyprint"><code class="language-{{$paste->change_lang}}">
{{$paste->text}}
</code></pre>
    {{$paste->name}}
    </br>
    @include('last_paste')

@endsection