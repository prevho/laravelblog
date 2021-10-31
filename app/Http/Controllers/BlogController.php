<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware();
    // }

    public function index() {

        
        return view('pages.blog.index');
    }

    public function show(Post $post) {
        // dd($post);
        return view('pages.blog.showpost', compact('post'));
    }
}
