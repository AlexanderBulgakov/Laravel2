<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('status', 'publish')->orderBy('id', 'desc')->get();
        $categories = Category::all();
        $category_id = 0;

        return view('blog', compact('posts', 'categories', 'category_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if( $post->status != 'publish' ) abort(404);

        $date = Carbon::parse($post->created_at);

        return view('blog-single', compact('post', 'date'));
    }
}
