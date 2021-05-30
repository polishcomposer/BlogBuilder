@extends('layouts.app')

@section('content')
<h1>Posts</h1>
@if(count($posts) > 0)
    @foreach($posts as $post)
        <div class="card card-body bg-light">
            <h3><a href="/posts/{{$post->id}}" alt="{{$post->title}}">{{$post->title}}</a></h3>
            <small>Written on {{$post->created_at}}</small>
        </div>
    @endforeach
  <div>  {{$posts->links("pagination::bootstrap-4")}} </div>
@else 
    <p>No posts found</p>
@endif
@endsection