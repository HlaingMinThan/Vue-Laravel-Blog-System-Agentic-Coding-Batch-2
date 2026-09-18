<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

Route::get('/blogs', function () {
    return inertia('Blogs', [
        'blogs' => Blog::latest()->get(),
    ]);
})->name('blogs');
Route::inertia('/blogs/create', 'BlogCreate')->name('blogs.create');

Route::post('/blogs/store', function () {
    request()->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    $blog = new Blog;
    $blog->title = request('title');
    $blog->description = request('description');
    $blog->save();

    return redirect('/blogs');
})->name('blogs.store');

Route::get('/blogs/{blog}/edit', function (Blog $blog) {
    return inertia('BlogEdit', [
        'blog' => $blog,
    ]);
})->name('blogs.edit');

Route::post('/blogs/{blog}/update', function (Blog $blog) {
    request()->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    $blog->title = request('title');
    $blog->description = request('description');
    $blog->save();

    return redirect('/blogs');
})->name('blogs.update');

Route::get('/blogs/{blog}', function (Blog $blog) {
    return inertia('BlogShow', [
        'blog' => $blog,
p    ]);
})->name('blogs.show');

require __DIR__ . '/settings.php';
