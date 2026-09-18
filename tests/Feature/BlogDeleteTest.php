<?php

use App\Models\Blog;

test('a blog can be deleted', function () {
    $blog = Blog::factory()->create();

    $response = $this->post(route('blogs.delete', $blog));

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/blogs');

    $this->assertModelMissing($blog);
});

test('blog delete returns 404 when the blog does not exist', function () {
    $this->post(route('blogs.delete', 999))->assertNotFound();
});
