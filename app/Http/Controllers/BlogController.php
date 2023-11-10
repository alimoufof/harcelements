<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Harcelement;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('harcelement')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create', [
            'blog' => new Blog(),
            'harcelements' => Harcelement::pluck('type', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = $request->validated();
        if($request->hasFile('photo'))
        {
            $imagePath = $request->file('photo')->store('blog_photos', 'public');
            $blog['photo'] = $imagePath;
        }

        Blog::create($blog);
        return to_route('blog.index')->with('status', 'Ajout de blog effectué avec succès');
    }

    public function show(Blog $blog)
    {
        return view('admin.blogs.show', [
            'blog' => $blog,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', [
            'blog' => $blog,
            'harcelements' => Harcelement::pluck('type', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->validated();
        if($request->hasFile('photo'))
        {
            if($blog->photo)
            {
                Storage::disk('public')->delete($blog->photo);
            }
            $imagePath = $request->file('photo')->store('blog_photos', 'public');
            $data['photo'] = $imagePath;
        }
        $blog->update($data);   
        return to_route('admin.blog.index')->with('status', 'Modification du blog effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if($blog->photo)
        {
            Storage::disk('public')->delete($blog->photo);
        }
        $blog->delete();
        return to_route('blog.index')->with('status', 'suppression du tutoriel effectuée avec succès');
    }
}
