<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_post_index_page()
    {
        // Membuat data post secara manual
        Post::insert([
            [
                'title' => 'Post 1',
                'content' => 'Content 1',
                'country' => 'Country 1',
                'phone' => '+1234567890',
                'description' => 'Description 1',
            ],
            [
                'title' => 'Post 2',
                'content' => 'Content 2',
                'country' => 'Country 2',
                'phone' => '+2345678901',
                'description' => 'Description 2',
            ],
            [
                'title' => 'Post 3',
                'content' => 'Content 3',
                'country' => 'Country 3',
                'phone' => '+3456789012',
                'description' => 'Description 3',
            ],
        ]);

        $response = $this->get(route('posts.index'));

        $response->assertStatus(200)
                 ->assertInertia(fn ($page) => $page
                     ->component('Post/Index')
                     ->has('posts', 3)
                 );
    }

    /** @test */
    public function it_displays_the_post_creation_form()
    {
        $response = $this->get(route('posts.create'));

        $response->assertStatus(200)
                 ->assertInertia(fn ($page) => $page
                     ->component('Post/Create')
                 );
    }

    /** @test */
    public function it_creates_a_new_post()
    {
        Storage::fake('public');

        $data = [
            'title' => 'Test Post',
            'content' => 'This is a test content.',
            'country' => 'Test Country',
            'phone' => '+1234567890',
            'description' => 'Test description.',
            'image' => UploadedFile::fake()->image('test.jpg'),
        ];

        $response = $this->post(route('posts.store'), $data);

        $response->assertRedirect(route('posts.index'))
                 ->assertSessionHas('success', 'Post berhasil dibuat!');

        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'content' => 'This is a test content.',
            'country' => 'Test Country',
            'phone' => '+1234567890',
            'description' => 'Test description.',
        ]);

        $post = Post::first();
        $this->assertFileExists(Storage::disk('public')->path($post->image));
    }

    /** @test */
    public function it_displays_the_post_edit_form()
    {
        $post = Post::create([
            'title' => 'Edit Title',
            'content' => 'Edit Content',
            'country' => 'Edit Country',
            'phone' => '+1234567890',
            'description' => 'Edit Description',
        ]);

        $response = $this->get(route('posts.edit', $post));

        $response->assertStatus(200)
                 ->assertInertia(fn ($page) => $page
                     ->component('Post/Edit')
                     ->has('post', fn ($pagePost) => $pagePost
                         ->where('id', $post->id)
                         ->etc()
                     )
                 );
    }

    /** @test */
    public function it_updates_an_existing_post()
    {
        Storage::fake('public');

        $post = Post::create([
            'title' => 'Old Title',
            'content' => 'Old Content',
            'country' => 'Old Country',
            'phone' => '+1234567890',
            'description' => 'Old Description',
        ]);

        $data = [
            'title' => 'Updated Title',
            'content' => 'Updated Content',
            'country' => 'Updated Country',
            'phone' => '+9876543210',
            'description' => 'Updated description.',
            'image' => UploadedFile::fake()->image('updated.jpg'),
        ];

        $response = $this->put(route('posts.update', $post), $data);

        $response->assertRedirect(route('posts.index'))
                 ->assertSessionHas('success', 'Post berhasil diperbarui!');

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
            'content' => 'Updated Content',
        ]);

        $post->refresh();
        $this->assertFileExists(Storage::disk('public')->path($post->image));
    }

    /** @test */
    public function it_deletes_a_post()
    {
        Storage::fake('public');

        $imagePath = UploadedFile::fake()->image('test.jpg')->store('posts', 'public');
        $post = Post::create([
            'title' => 'Delete Title',
            'content' => 'Delete Content',
            'country' => 'Delete Country',
            'phone' => '+1234567890',
            'description' => 'Delete Description',
            'image' => $imagePath,
        ]);

        $response = $this->delete(route('posts.destroy', $post));

        $response->assertRedirect(route('posts.index'))
                 ->assertSessionHas('success', 'Post berhasil dihapus!');

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);

        $this->assertFileDoesNotExist(Storage::disk('public')->path($imagePath));
    }
}
