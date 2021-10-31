<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //Fetch all tags
        $posts = Post::all();
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = Tag::all();
        $categories = Category::all();
        return view('dashboard.posts.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
        // return $request;
        // dd($request);

        // Tags
        // Seperate them at the comma and create an array
        // $tags = explode(',', $request->tags);

        $post = new Post();

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->published_at = $request->published_at;
        $post->description = $request->description;
        // $post->tags = $request->body;


        // Image
        if($request->hasFile('image')) {
            
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imageNewName = explode('.', $imageName)[0];
            $fileExtention = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();

            $location = storage_path('app/public/blog_images/' . $fileExtention);
            //Resize with intervention image
            Image::make($image)->resize(1200, 630)->save($location);

            $post->image = $fileExtention;


        }else {
            $post->image = 'default.png';
        };

        $post->save();
        // $post->tags()->sync($tags);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('message', 'Post Successfully Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function show(Post $post) {
    //     return view('pages.blog.show', compact('post'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $tags = Tag::all();
        $categories = Category::all();
        $oldTags = $post->tags->pluck('id')->toArray();
        return view('dashboard.posts.edit', compact('post', 'categories', 'tags','oldTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //

        // $post = new Post();

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->published_at = $request->published_at;
        $post->description = $request->description;

        // Image
        if($request->hasFile('image')) {
            // get old file name
            $oldFileName = $post->image;
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imageNewName = explode('.', $imageName)[0];
            $fileExtention = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();

            $location = storage_path('app/public/blog_images/' . $fileExtention);
            //Resize with intervention image
            Image::make($image)->resize(1200, 630)->save($location);

            $post->image = $fileExtention;

            // Delete old post if new one is uploaded
            File::delete(storage_path('app/public/blog_images/'.$oldFileName));

        };

        $post->update();
        // $post->tags()->sync($tags);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('message', 'Post Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
