@extends('layouts.app')

@section('content')
<div class="inline-layout">
<h1>Posts</h1>
<a href="/posts/create" class="btn btn-primary">Create Post</a>
</div>
@if(count($posts) > 0)
    @foreach($posts as $post)
        <div class="card card-body bg-light">
            <div class="row">
                <div class="col-sm-2">
                    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->title}}">
                </div>
                <div class="col-sm-10">
                    <h3><a href="/posts/{{$post->id}}" alt="{{$post->title}}">{{$post->title}}</a></h3>
                    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    @if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
    <div class="inline-layout">
        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
        {!! Form::open(['action'=> ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}
    </div>
    @endif
@endif
                </div>
            </div>
        </div>
    @endforeach
  <div>  {{$posts->links("pagination::bootstrap-4")}} </div>
@else 
    <p>No posts found</p>
@endif
@endsection