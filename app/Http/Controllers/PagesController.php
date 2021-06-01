<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $data = array(
            'title' => 'Create your own blog'
        );
        return view('pages.index')->with($data);
    }
}
