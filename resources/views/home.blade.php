@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header"><h1>{{ __('Dashboard') }}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                        <div class="inline-layout dash-top">
                        <h3>Your Blogs</h3>
                        <a href="/blogs/create" class="btn btn-primary">Create Blog</a>
                        </div>
                    @if(count($blogs) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th class="col-8">Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                    @foreach($blogs as $blog)
                            <tr>
                                
                                <td class="inline-layout-wrap">
                                    <img src="/storage/blog_cover_images/{{$blog->blog_cover_image}}" alt="{{$blog->title}}">
                                    <div>
                                        <a href="/blogs/{{$blog->id}}" alt="{{$blog->title}}">{{$blog->title}}</a>
                                <br><small>
                                Posts:  {{$blog->blogposts}}
                                </small></div></td>
                                <td class="dash-buttons"><a href="/blogs/{{$blog->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td class="dash-buttons">
                                    {!! Form::open(['action'=> ['App\Http\Controllers\BlogsController@destroy', $blog->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                    @endforeach 
                        </table>
                    @else 
                        <p>You have no blogs.</p>
                    @endif   
                    
                    <hr class="dash-hr">


                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="inline-layout dash-top">
                    <h3>Your Posts</h3>
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                </div>
                @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th class="col-8">Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                @foreach($posts as $post)
                        <tr>
                            <td class="inline-layout-wrap">
                                <img src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->title}}">
                                <div>
                                    <a href="/posts/{{$post->id}}" alt="{{$post->title}}">{{$post->title}}</a>
                                <br><small>
                                    Written on:  {{$blog->created_at}}
                                    </small></div></td>
                            <td class="dash-buttons"><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                            <td class="dash-buttons">
                                {!! Form::open(['action'=> ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                @endforeach 
                    </table>
                @else 
                    <p>You have no posts.</p>
                @endif  
                </div>
            </div>
        </div>
    </div>
@endsection
