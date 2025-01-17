<template>
    <div v-if="post?.image">
        <img
            :src="post.image || '/images/placeholder.png'"
            :alt="post.title || 'Post Image'"
            class="w-full h-auto rounded-md"
        />
    </div>
</template>

<script setup>
defineProps({
    post: {
        type: Object,
        default: () => ({}), // Pastikan post selalu memiliki default
    },
});
</script>
