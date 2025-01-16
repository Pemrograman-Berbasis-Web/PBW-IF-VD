<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post; // Import model Post

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan data dummy
        Post::create([
            'title' => 'Judul Post Pertama',
            'content' => 'Ini adalah konten untuk post pertama.',
        ]);

        Post::create([
            'title' => 'Judul Post Kedua',
            'content' => 'Ini adalah konten untuk post kedua.',
        ]);

        Post::create([
            'title' => 'Judul Post Ketiga',
            'content' => 'Ini adalah konten untuk post ketiga.',
        ]);
    }
}
