<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'; // Layout untuk halaman yang memerlukan autentikasi
import { Head, Link, useForm } from '@inertiajs/vue3'; // Komponen dan hook dari Inertia.js
import PostImage from './PostImage.vue'; // Mengimpor komponen untuk menampilkan gambar post

// Props untuk menerima data posts
defineProps({
    posts: {
        type: Array,
        default: () => [], // Default ke array kosong jika tidak ada data
    },
});

// Menginisialisasi form untuk penghapusan post
const form = useForm({});

// Fungsi untuk menghapus post dengan konfirmasi
const deletePost = (id) => {
    if (confirm('Are you sure you want to delete this post?')) {
        form.delete(`posts/${id}`, {
            onSuccess: () => {
                alert('Post deleted successfully');
            },
            onError: (error) => {
                alert('Failed to delete post');
                console.error(error);
            },
        });
    }
};
</script>

<template>
    <Head title="Manage Posts" />

    <AuthenticatedLayout>
        <!-- Header -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Posts</h2>
        </template>

        <!-- Main Content -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Button to create new post -->
                        <Link href="/posts/create">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                                Create New Post
                            </button>
                        </Link>

                        <!-- Posts List -->
                        <div v-for="post in posts" :key="post.id" class="border rounded-lg p-4 mb-4 shadow">
                            <!-- Display Title -->
                            <h2 class="text-xl font-semibold">{{ post.title }}</h2>

                            <!-- Display Image if exists -->
                            <img :src="post.image" v-if="post.image" alt="Post Image" class="w-full h-auto mt-4 rounded" />

                            <!-- Display Content -->
                            <p class="text-gray-700 mt-2">{{ post.content }}</p>

                            <!-- Display Additional Post Information -->
                            <p><strong>Country:</strong> {{ post.country }}</p>
                            <p><strong>Phone:</strong> {{ post.phone }}</p>
                            <p><strong>Description:</strong> {{ post.description }}</p>

                            <!-- Actions -->
                            <div class="mt-4">
                                <Link :href="`/posts/${post.id}/edit`">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Edit
                                    </button>
                                </Link>

                                <button
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2"
                                    @click="deletePost(post.id)">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
