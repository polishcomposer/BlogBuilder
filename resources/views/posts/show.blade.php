@extends('layouts.app')

@section('content')
<div class="inline-layout">
<h1>{{$post->title}}</h1><a href="{{url()->previous()}}" class="btn btn-primary">Go Back</a>
</div>
<img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->title}}">
               
<div class="text-layout-post">
    {!! $post->body !!}
</div>
<hr>
<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
<hr>

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
<div class="go-back">
<a href="{{url()->previous()}}" class="btn btn-primary" alt="blog dashboard">Go back</a>
</div>
@endsection