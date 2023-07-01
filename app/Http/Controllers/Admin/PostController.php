<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

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
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image',
            'title' => 'required|max:255',
            'description' => 'required|max:300',
            'body' => 'required',
        ]);

        unset($data['image']);

        $post = Post::create($data);

        $post->addMediaFromRequest('image')
            ->toMediaCollection('blog-images');
        
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
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'image' => 'nullable|image',
            'title' => 'required|max:255',
            'description' => 'required|max:300',
            'body' => 'required',
            'image-upd' => 'nullable'
        ]);

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
