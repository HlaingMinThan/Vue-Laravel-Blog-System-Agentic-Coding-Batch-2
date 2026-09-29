<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs.
     */
    public function index(): Response
    {
        return Inertia::render('Blogs', [
            'blogs' => Blog::with("user")->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create(): Response
    {
        return Inertia::render('BlogCreate');
    }

    /**
     * Store a newly created blog.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);
        $blog = new Blog;
        $blog->title = $validated['title'];
        $blog->description = $validated['description'];
        $blog->user_id = auth()->id();
        $blog->save();

        return redirect('/blogs');
    }

    /**
     * Display the specified blog.
     */
    public function show(Blog $blog): Response
    {
        return Inertia::render('BlogShow', [
            'blog' => $blog->load('user'),
        ]);
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog): Response
    {
        return Inertia::render('BlogEdit', [
            'blog' => $blog,
        ]);
    }

    /**
     * Update the specified blog.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $blog->title = $validated['title'];
        $blog->description = $validated['description'];
        $blog->save();

        return redirect('/blogs');
    }

    /**
     * Remove the specified blog.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect('/blogs');
    }
}
