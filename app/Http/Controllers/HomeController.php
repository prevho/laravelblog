<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
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
        return view('home.index');
    }
}
