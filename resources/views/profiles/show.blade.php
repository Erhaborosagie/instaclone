@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img class="rounded-circle w-100" src="{{$user->profile->profileImage()}}">
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center">
                    <h1>{{$user->username}}</h1>
                    <p style="margin-bottom: 0"><follow-button user-id="{{$user->id}}" follows="{{ $follow  }}"></follow-button></p>
                </div>
                @can('update', $user->profile)
                    <a href="/profile/{{auth()->id()}}/edit">Edit Profile</a>
                @endcan
            </div>
            <div class="pt-5 d-flex">
                <div class="pr-5"><strong>{{$postCount}}</strong> posts</div>
                <div class="pr-5"><a href="#"><strong>{{$followersCount}}</strong> followers</a></div>
                <div class="pr-5"><a href="#"><strong>{{$followingCount}}</strong> following</a></div>
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
