@extends('layouts.app')

@section('content')
@if(!Auth::guest())
    @if(Auth::user()->id == $blog[0]->user_id)
    <div class="inline-layout">
        <div class="inline-layout-2">
        <a href="/blogs/{{$blog[0]->id}}/edit" class="btn btn-primary">Edit</a>
        <a href="{{url()->previous()}}" class="btn btn-primary" alt="blog dashboard">Go back</a>
        </div>

        {!! Form::open(['action'=> ['App\Http\Controllers\BlogsController@destroy', $blog[0]->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete Blog', ['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}
        </div>
    @endif
@endif
<h1>{{$blog[0]->title}}</h1>
<img style="width:100%" src="/storage/blog_cover_images/{{$blog[0]->blog_cover_image}}" alt="{{$blog[0]->title}}">
               
<div class="text-layout">
    {!! $blog[0]->description !!}
</div>
    @if(!Auth::guest())
    @if(Auth::user()->id == $blog[0]->user_id)
<p>Link to your blog: <a href="/blogs/{{$blog[0]->id}}" target="_blank">https://www.swoszowski.co.uk/blogbuilder/blogs/{{$blog[0]->id}}</a></p>
    @endif @endif
<hr>
<small>Created on {{$blog[0]->created_at}} by {{$blogs->user->name}}
<br>Posts: {{$blog[0]->blogposts}}</small>
<hr>
<div class="inline-layout">
<h1>Posts</h1>
@if(!Auth::guest())
@if(Auth::user()->id == $blog[0]->user_id)
<a href="/posts/create" class="btn btn-primary">Create New Post</a>
@endif @endif
</div>
@if(count($posts) > 0)
    @foreach($posts as $post)
        <div class="card card-body bg-light card-single-post">
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