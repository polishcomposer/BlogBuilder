<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $data = array(
            'title' => 'Welcome To Laravel!', 
            'name' => 'Dariusz Swoszowski'
        );
        return view('pages.index')->with($data);
    }
    public function about() {
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }
    public function services() {
        $data = array(
            'title' => 'services',
            'services' => ['Programming', 'Design', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
