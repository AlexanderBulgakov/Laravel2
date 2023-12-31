<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $categories = Category::all();
        $posts = $category->posts()->where('status', 'publish')->orderBy('id', 'desc')->paginate(9);
        $category_id = $category->id;

        return view('blog', compact('posts', 'categories', 'category_id'));
    }
}
