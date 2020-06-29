@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img class="rounded-circle" src="https://instagram.flos6-1.fna.fbcdn.net/v/t51.2885-19/s150x150/43129914_2173458166199646_3827222400865402880_n.jpg?_nc_ht=instagram.flos6-1.fna.fbcdn.net&_nc_ohc=m1Z9WpIANXYAX9qoZBF&oh=7e5a0f2acc97b1e143fc5f2a2af84a99&oe=5F213F62">
        </div>
        <div class="col-9">
            <div>
                <h1>{{$user->username}}</h1>
            </div>
            <div class="pt-5 d-flex">
                <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pr-5"><a href="#"><strong>82</strong> followers</a></div>
                <div class="pr-5"><a href="#"><strong>129</strong> following</a></div>
            </div>
            <div class="pt-5">
                <div style="font-weight: bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="{{$user->profile->url}}" target="_blankno">{{$user->profile->url}}</a></div>
            </div>
        </div>

    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 p-3"><a href="/posts/{{$post->id}}"><img class="w-100" src="/{{$post->image}}" alt="{{$post->caption}}"></a></div>
        @endforeach
    </div>
</div>
@endsection
