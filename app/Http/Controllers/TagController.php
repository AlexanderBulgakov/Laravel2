<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->where('status', 'publish')->orderBy('id', 'desc')->paginate(9);

        return view('tag', compact('posts', 'tag'));
    }
}
