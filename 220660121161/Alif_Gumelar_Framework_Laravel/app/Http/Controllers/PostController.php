<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Exception;

class PostController extends Controller
{
    /**
     * Rules validasi untuk post.
     */
    private const VALIDATION_RULES = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'country' => 'required|string|max:100',
        'phone' => 'required|string|regex:/^\+?\d{10,15}$/',
        'description' => 'nullable|string|max:500',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    /**
     * Menampilkan daftar semua post.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        // Transformasi gambar menjadi URL yang dapat digunakan frontend
        $posts->transform(function ($post) {
            $post->image = $post->image ? Storage::url($post->image) : asset('images/default.jpg');
            return $post;
        });

        return Inertia::render('Post/Index', ['posts' => $posts]);
    }

    /**
     * Menampilkan form untuk membuat post baru.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Post/Create');
    }

    /**
     * Menyimpan post baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate(self::VALIDATION_RULES);

        try {
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('posts', 'public');
            } else {
                unset($validated['image']);
            }

            Post::create($validated);

            return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat!');
        } catch (Exception $e) {
            Log::error('Gagal membuat post: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Gagal membuat post: ' . $e->getMessage()]);
        }
    }

    /**
     * Menampilkan form untuk mengedit post yang ada.
     *
     * @param  \App\Models\Post  $post
     * @return \Inertia\Response
     */
    public function edit(Post $post)
    {
        $post->image = $post->image ? Storage::url($post->image) : null;

        return Inertia::render('Post/Edit', ['post' => $post]);
    }

    /**
     * Memperbarui post yang ada di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate(self::VALIDATION_RULES);

        try {
            if ($request->hasFile('image')) {
                $this->deleteImageIfExists($post->image);

                $validated['image'] = $request->file('image')->store('posts', 'public');
            } else {
                unset($validated['image']);
            }

            $post->update($validated);

            return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui!');
        } catch (Exception $e) {
            Log::error('Gagal memperbarui post: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Gagal memperbarui post: ' . $e->getMessage()]);
        }
    }

    /**
     * Menghapus post dari database.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        try {
            $this->deleteImageIfExists($post->image);

            $post->delete();

            return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
        } catch (Exception $e) {
            Log::error('Gagal menghapus post: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Gagal menghapus post: ' . $e->getMessage()]);
        }
    }

    /**
     * Menghapus gambar jika ada.
     *
     * @param  string|null  $imagePath
     * @return void
     */
    private function deleteImageIfExists(?string $imagePath)
    {
        if (!empty($imagePath) && Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }
}
