@extends('layouts.app')

@section('content')
<h1>Posts</h1>
<a href="/posts/create" class="btn btn-primary">Create Post</a>
@if(count($posts) > 0)
    @foreach($posts as $post)
        <div class="card card-body bg-light">
            <div class="row">
                <div class="col-sm-4">
                    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->title}}">
                </div>
                <div class="col-sm-8">
                    <h3><a href="/posts/{{$post->id}}" alt="{{$post->title}}">{{$post->title}}</a></h3>
                    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                </div>
            </div>
        </div>
    @endforeach
  <div>  {{$posts->links("pagination::bootstrap-4")}} </div>
@else 
    <p>No posts found</p>
@endif
@endsection