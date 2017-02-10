<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Posts $posts, \App\Tag $tag = null)
    public function index(Posts $posts)
    {
        // return $tag->posts;
        $posts = $posts->allFiltered();
        // $posts = (new \App\Repositories\Posts)->all();
        // See below -> moved to Repository
        // $posts = Post::latest()
        //     ->filter(request(['month', 'year']))
        //     ->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        // dd(request(['title', 'body']));
        // Create a new post using the request data
        // $post = new Post;
        // $post->title = request('title');
        // $post->body = request('body');

        // Save it to the database
        // $post->save();
        // OR
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body')
        // ]);
        // OR
        // Post::create(request(['title', 'body']));
        // When dealing with users see below
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id()
        // ]);
        // OR
        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        // Flash a message
        session()->flash('message', 'Your post has now been published.');

        // And then redirect to the home page
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
