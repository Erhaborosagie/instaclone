@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-5">
        @if($posts->count() == 0)
            <p>No post to display. Follow more people to see their posts</p>
        @else
            @foreach($posts as $post)
                <div class="col-4 p-3"><a href="/posts/{{$post->id}}"><img class="w-100" src="/{{$post->image}}" alt="{{$post->caption}}"></a></div>
            @endforeach
        @endif
    </div>
</div>
@endsection
