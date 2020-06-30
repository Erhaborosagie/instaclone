@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card-header d-flex justify-content-between">
                <a href="/profile/{{$post->user->profile->id}}" class="d-flex">
                    <img class="rounded-circle m-1" style="width: 20px" src="{{$post->user->profile->profileImage()}}">
                    <div class="m-1">{{$post->user->username}}</div>
                </a>
                <a href="follow" class="m-1">follow</a>
            </div>
            <div class="card-body">
                <div class="m-1">{{$post->caption}}</div>
                <img class="w-100" src="/{{$post->image}}" alt="{{$post->caption}}">
            </div>
        </div>
    </div>
</div>
@endsection
