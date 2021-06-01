<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

use Illuminate\Support\Facades\Storage;
use DB;
class BlogsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('blogs.index')->with('blogs', $blogs);
    }

 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('blogs.create');
    }

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'blog_cover_image' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('blog_cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('blog_cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $request->file('blog_cover_image')->storeAs('public/blog_cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpeg';
        }
        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->user_id = auth()->user()->id;
        $blog->blog_cover_image = $fileNameToStore;
        $blog->save();

        return redirect('/blogs')->with('success', 'Blog Created');
    }


  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('blogs.show')->with('blog', $blog);
    }

 /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);

        //Check for correct user
        if(auth()->user()->id !== $blog->user_id) {
            return redirect('/blogs')->with('error', 'Unauthorized Page');
        }
        return view('blogs.edit')->with('blog', $blog);
    }
 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        $blog = Blog::find($id);
        if($request->hasFile('blog_cover_image')) {
            $filenameWithExt = $request->file('blog_cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('blog_cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $request->file('blog_cover_image')->storeAs('public/blog_cover_images', $fileNameToStore);
        } 
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        if($request->hasFile('blog_cover_image')){
            if($blog->blog_cover_image != 'noimage.jpeg') {
                Storage::delete('public/blog_cover_images/' . $blog->blog_cover_image);
            }
            $blog->blog_cover_image = $fileNameToStore;
        }
        $blog->save();

        return redirect('/blogs')->with('success', 'Blog Updated');
    }
/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
         //Check for correct user
        if(auth()->user()->id !== $blog->user_id) {
            return redirect('/blogs')->with('error', 'Unauthorized Page');
        }
        $blog->delete();
            if($blog->blog_cover_image != 'noimage.jpg') {
                Storage::delete('public/blog_cover_images/' . $blog->blog_cover_image);
            }
          
        return redirect('/blogs')->with('success', 'Blog Removed');
    }



}
