<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;

class HomeController extends Controller
{
    //restricting access to index method only
    //Everyone can view index or homepage
    // public function __construct() {
        // return $this->middleware('auth')->except(['index']);

        // Only if email is verified
        // return $this->middleware('verified')->except(['index']);
        // return $this->middleware([Authenticate::class, IsAdmin::class])->except(['index']);
    // }

    public function index() {

        $today = new \DateTime();

        // Fetch featured posts
        $posts = Post::where('featured', true)
        ->whereNotNull('published_at')
        ->where('published_at', '<=', $today)
        ->latest()
        ->take(3)
        ->get();
        return view('home.index', compact('posts'));
    }
}
