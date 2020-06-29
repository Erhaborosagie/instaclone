@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card-header">{{$post->caption}}</div>
            <div class="card-body"><img class="w-100" src="/{{$post->image}}" alt="{{$post->caption}}"></div>
        </div>
    </div>
</div>
@endsection
