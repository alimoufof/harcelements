<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.edit', [
            'blog' => new Blog(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = Blog::create($request->validated());
        return to_route('admin.blog.index')->with('status', 'Ajout de blog '. $request->titre . ' effectué avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', [
            'blog' => $blog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update($request->validated());
        return to_route('admin.blog.index')->with('status', 'Modification du blog '. $request->titre . ' effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return to_route('admin.signalement.index')->with('status', 'suppression du tutoriel '. $blog->titre . ' effectuée avec succès');
    }
}
