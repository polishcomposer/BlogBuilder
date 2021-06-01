@extends('layouts.app')

@section('content')
    @if(count($blogs) > 0)
<h1>Create Post</h1>
{!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{Form::label('blogs', 'Select a blog')}}
        {{Form::select('blogs', $blogList, null, ['class' => 'form-select'])}}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}     
    @else
    <h1>Please create your blog first.</h1>
    <a href="/blogs/create" class="btn btn-primary">Create Blog</a>
    @endif
@endsection