<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'; // Layout untuk halaman yang memerlukan autentikasi
import { useForm, Link } from '@inertiajs/vue3'; // Mengimpor useForm untuk form handling dan Link untuk navigasi

// Mengambil data post dari props (data yang dikirimkan oleh backend)
const props = defineProps({
    post: {
        type: Object,
        required: true,
    },
    errors: {
        type: Object,
        default: () => ({}),
    }
});

// Menginisialisasi form menggunakan useForm dengan data post yang sudah ada
const form = useForm({
    title: props.post.title || '',
    content: props.post.content || '',
    country: props.post.country || '',
    phone: props.post.phone || '',
    description: props.post.description || '',
    image: null, // Gambar akan di-handle secara terpisah
});

// Fungsi untuk menangani input file (gambar)
const handleImageUpload = (event) => {
    form.image = event.target.files[0]; // Mengambil file yang dipilih
};

// Fungsi untuk mengirimkan form ke server
const submit = () => {
    form.put(route('posts.update', props.post.id)); // Mengirimkan form melalui metode PUT untuk memperbarui post
};
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Post</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Link untuk kembali ke halaman daftar post -->
                        <Link href="/posts">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                                Back
                            </button>
                        </Link>

                        <!-- Form untuk mengedit post -->
                        <form @submit.prevent="submit">
                            <!-- Title -->
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                <input 
                                    type="text"
                                    id="title"
                                    v-model="form.title"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter Title"
                                    :class="{'border-red-500': errors.title}"
                                    required
                                />
                                <span v-if="errors.title" class="text-red-500 text-sm">{{ errors.title }}</span>
                            </div>

                            <!-- Content -->
                            <div class="mb-4">
                                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                                <textarea 
                                    id="content"
                                    v-model="form.content"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter Content"
                                    :class="{'border-red-500': errors.content}"
                                    required
                                ></textarea>
                                <span v-if="errors.content" class="text-red-500 text-sm">{{ errors.content }}</span>
                            </div>

                            <!-- Country -->
                            <div class="mb-4">
                                <label for="country" class="block text-gray-700 text-sm font-bold mb-2">Country:</label>
                                <input 
                                    type="text"
                                    id="country"
                                    v-model="form.country"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter Country"
                                    :class="{'border-red-500': errors.country}"
                                    required
                                />
                                <span v-if="errors.country" class="text-red-500 text-sm">{{ errors.country }}</span>
                            </div>

                            <!-- Phone -->
                            <div class="mb-4">
                                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone Number:</label>
                                <input 
                                    type="tel"
                                    id="phone"
                                    v-model="form.phone"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter Phone Number"
                                    :class="{'border-red-500': errors.phone}"
                                    required
                                />
                                <span v-if="errors.phone" class="text-red-500 text-sm">{{ errors.phone }}</span>
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description (optional):</label>
                                <textarea 
                                    id="description"
                                    v-model="form.description"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Enter Description"
                                ></textarea>
                            </div>

                            <!-- Image -->
                            <div class="mb-4">
                                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                                <input 
                                    type="file"
                                    id="image"
                                    @change="handleImageUpload"
                                    accept="image/*"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                />
                                <span v-if="errors.image" class="text-red-500 text-sm">{{ errors.image }}</span>
                            </div>

                            <button 
                                type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                                Update Post
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
