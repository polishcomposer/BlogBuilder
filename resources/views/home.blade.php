@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                        <a href="/blogs/create" class="btn btn-primary">Create Blog</a>
                        <h3>Your Blogs</h3>
                    @if(count($blogs) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                    @foreach($blogs as $blog)
                            <tr>
                                
                                <td>{{$blog->title}}
                                <br><small>
                                Posts:  {{$blog->blogposts}}
                                </small></td>
                                <td><a href="/blogs/{{$blog->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>
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
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                        <a href="/posts/create" class="btn btn-primary">Create Post</a>
                        <h3>Your Posts</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                    @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>
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

</div>
@endsection
