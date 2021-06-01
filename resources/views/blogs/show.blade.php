@extends('layouts.app')

@section('content')
<a href="/blogs" class="btn btn-default">Go Back</a>
<h1>{{$blog->title}}</h1>
<img style="width:100%" src="/storage/blog_cover_images/{{$blog->cover_image}}" alt="{{$blog->title}}">
               
<div>
    {!! $blog->description !!}
</div>
<hr>
<small>Written on {{$blog->created_at}} by {{$blog->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->id == $blog->user_id)
        <a href="/blogs/{{$blog->id}}/edit" class="btn btn-primary">Edit</a>
        {!! Form::open(['action'=> ['App\Http\Controllers\BlogsController@destroy', $blog->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}
    @endif
@endif

<h1>Posts</h1>
@if(count($blog->posts) > 0)
    @foreach($blog->posts as $post)
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
<a href="/posts/create" 

@endsection