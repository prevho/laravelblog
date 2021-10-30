<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

//Dashboard
// Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'dashboard'], function(){

// })

// Blog Routes
Route::get('blog', [BlogController::class, 'index'])->name('blog');


Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function(){
    //Main Dashboard
    Route::group(['prefix' => '', 'as' => 'dashboard.'], function() {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    // Categories
    // Route::resource('categories', CategoryController::class);
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function() {
        //View All Categories Page
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        //Create Category page
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        //Store Category through form
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        //Show Single Category Page
        Route::get('{category:slug}', [CategoryController::class, 'show'])->name('show');
        //Edit Single Category Page
        Route::get('{category:slug}/edit', [CategoryController::class, 'edit'])->name('edit');
        //Update Single Category form
        Route::put('{category:slug}/update', [CategoryController::class, 'update'])->name('update');
        //DeleteSingle Category form
        Route::delete('{category:slug}/delete', [CategoryController::class, 'destroy'])->name('delete');
        
    });

    // Tags
    // Route::resource('tags', TagController::class);
    Route::group(['prefix' => 'tags', 'as' => 'tags.'], function() {
        //View All Tags Page
        Route::get('/', [TagController::class, 'index'])->name('index');
        //Create Tag page
        Route::get('create', [TagController::class, 'create'])->name('create');
        //Store Tag through form
        Route::post('/', [TagController::class, 'store'])->name('store');
        //Show Single Tag Page
        Route::get('{tag:slug}', [TagController::class, 'show'])->name('show');
        //Edit Single Tag Page
        Route::get('{tag:slug}/edit', [TagController::class, 'edit'])->name('edit');
        //Update Single Tag form
        Route::put('{tag:slug}/update', [TagController::class, 'update'])->name('update');
        //Delete Single Tag form
        Route::delete('{tag:slug}/delete', [TagController::class, 'destroy'])->name('delete');
        
    });

    // Posts
    // Route::resource('posts', PostController::class);
    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function() {
        //View All Posts Page
        Route::get('/', [PostController::class, 'index'])->name('index');
        //Create Post page
        Route::get('create', [PostController::class, 'create'])->name('create');
        //Store Post through form
        Route::post('/', [PostController::class, 'store'])->name('store');
        //Show Single Post Page
        Route::get('{post:slug}', [PostController::class, 'show'])->name('show');
        //Edit Single Post Page
        Route::get('{post:slug}/edit', [PostController::class, 'edit'])->name('edit');
        //Update Single Post form
        Route::put('{post:slug}/update', [PostController::class, 'update'])->name('update');
        //Delete Single Post form
        Route::delete('{post:slug}/delete', [PostController::class, 'destroy'])->name('delete');
        
    });



});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
