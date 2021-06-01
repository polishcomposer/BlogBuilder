<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $blogs = DB::select('SELECT blogs.id, blogs.title, blogs.description, blogs.created_at, blogs.blog_cover_image, COUNT(posts.id) AS blogposts FROM blogs LEFT JOIN posts ON blogs.id = posts.blog_id WHERE blogs.user_id = '.$user_id.' GROUP BY blogs.id ORDER BY blogs.created_at DESC');
        $data = array(
            'blogs' => $blogs,
            'posts' => $user->posts
        );
        return view('home')->with($data);
    }
}
