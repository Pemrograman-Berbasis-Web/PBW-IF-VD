<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'; // Layout untuk halaman yang memerlukan autentikasi
import { useForm, Link } from "@inertiajs/vue3"; // Mengimpor useForm untuk form handling dan Link untuk navigasi

// Inisialisasi form menggunakan useForm dari Inertia.js
const form = useForm({
    title: "",        // Untuk judul postingan
    content: "",      // Untuk konten postingan
    country: "",      // Untuk negara
    phone: "",        // Untuk nomor telepon
    description: "",  // Untuk deskripsi tambahan
    image: null,      // Untuk upload gambar
});

// Fungsi untuk menangani input file (gambar)
const handleImageUpload = (event) => {
    form.image = event.target.files[0]; // Mengambil file yang dipilih
};

// Fungsi untuk mengirimkan form ke server
const submit = () => {
    // Jika form ini adalah untuk membuat posting baru, kita akan mengirim ke 'posts.store'
    form.post(route('posts.store'), {
        onSuccess: () => {
            alert("Post created successfully!");
        },
        onError: (errors) => {
            console.log(errors); // Debug error jika ada
        }
    });
};
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Post</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link href="/posts">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                                Back
                            </button>
                        </Link>

                        <!-- Form untuk membuat post baru -->
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                <input 
                                    type="text"
                                    id="title"
                                    v-model="form.title"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter Title"
                                    required
                                />
                            </div>

                            <div class="mb-4">
                                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                                <textarea 
                                    id="content"
                                    v-model="form.content"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter Content"
                                    required
                                ></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="country" class="block text-gray-700 text-sm font-bold mb-2">Country:</label>
                                <input 
                                    type="text"
                                    id="country"
                                    v-model="form.country"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter Country"
                                    required
                                />
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone Number:</label>
                                <input 
                                    type="tel"
                                    id="phone"
                                    v-model="form.phone"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter Phone Number"
                                    required
                                />
                            </div>

                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description (optional):</label>
                                <textarea 
                                    id="description"
                                    v-model="form.description"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter Description"
                                ></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                                <input 
                                    type="file"
                                    id="image"
                                    @change="handleImageUpload"
                                    accept="image/*"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                />
                            </div>

                            <button 
                                type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
