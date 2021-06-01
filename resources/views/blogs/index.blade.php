@extends('layouts.app')

@section('content')
<div class="inline-layout">
<h1>Blogs</h1>
<a href="/blogs/create" class="btn btn-primary">Create New Blog</a>
</div>
@if(count($blogs) > 0)
@foreach($blogs as $blog)
<div class="card card-body bg-light">
    <div class="row">
        <div class="col-sm-4">
            <img style="width:100%" src="/storage/blog_cover_images/{{$blog->blog_cover_image}}" alt="{{$blog->title}}">
        </div>
        <div class="col-sm-8">
            <h3><a href="/blogs/{{$blog->id}}" alt="{{$blog->title}}">{{$blog->title}}</a></h3>
            <p>{{$blog->description}}</p>
            <small>Created on {{$blog->created_at}} by {{$blog->user->name}}</small>
            <p>Link to your blog: <a href="/blogs/{{$blog->id}}" target="_blank">https://www.swoszowski.co.uk/blogbuilder/blogs/{{$blog->id}}</a></p>
            @if(!Auth::guest())
            @if(Auth::user()->id == $blog->user_id)
            <div class="inline-layout">
                <a href="/blogs/{{$blog->id}}/edit" class="btn btn-primary">Edit</a>
                {!! Form::open(['action'=> ['App\Http\Controllers\BlogsController@destroy', $blog->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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
<div>  {{$blogs->links("pagination::bootstrap-4")}} </div>
@else 
<p>No posts found</p>
@endif
@endsection