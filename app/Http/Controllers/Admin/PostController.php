<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\PostTag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();

        return view('admin.posts.create', compact('users', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        $tags = $data['tags'];

        unset($data['image']);
        unset($data['tags']);

        $post = Post::create($data);

        $post->addMediaFromRequest('image')
            ->toMediaCollection('blog-images');

        $post->tags()->attach($tags);
        
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();

        return view('admin.posts.edit', compact('post', 'categories', 'users', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();

        if(isset($data['tags'])){
            $tags = $data['tags'];
            unset($data['tags']);

            $post->tags()->sync($tags);
        }

        if(isset($data['image'])) {
            unset($data['image']);

            $post->addMediaFromRequest('image')
            ->toMediaCollection('blog-images');
        }
        
        $post->update($data);

        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
