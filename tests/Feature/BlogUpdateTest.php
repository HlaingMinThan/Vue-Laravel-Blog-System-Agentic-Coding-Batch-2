<?php

use App\Models\Blog;
use Inertia\Testing\AssertableInertia as Assert;

test('edit blog page can be rendered', function () {
    $blog = Blog::factory()->create();

    $response = $this->get(route('blogs.edit', $blog));

    $response->assertOk();

    $response->assertInertia(
        fn(Assert $page) => $page
            ->component('BlogEdit')
            ->where('blog.id', $blog->id)
            ->where('blog.title', $blog->title)
            ->where('blog.description', $blog->description)
    );
});

test('edit blog page returns 404 when the blog does not exist', function () {
    $this->get(route('blogs.edit', 999))->assertNotFound();
});

test('a blog can be updated', function () {
    $blog = Blog::factory()->create([
        'title' => 'Original title',
        'description' => 'Original description',
    ]);

    $response = $this->post(route('blogs.update', $blog), [
        'title' => 'Updated title',
        'description' => 'Updated description',
    ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/blogs');

    $this->assertDatabaseHas('blogs', [
        'id' => $blog->id,
        'title' => 'Updated title',
        'description' => 'Updated description',
    ]);
});

test('blog update requires a title and description', function () {
    $blog = Blog::factory()->create([
        'title' => 'Original title',
        'description' => 'Original description',
    ]);

    $response = $this
        ->from(route('blogs.edit', $blog))
        ->post(route('blogs.update', $blog), []);

    $response
        ->assertInvalid([
            'title' => 'The title field is required.',
            'description' => 'The description field is required.',
        ])
        ->assertRedirect(route('blogs.edit', $blog));

    $this->assertDatabaseHas('blogs', [
        'id' => $blog->id,
        'title' => 'Original title',
        'description' => 'Original description',
    ]);
});
