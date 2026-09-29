<template>
    <div class="mx-auto max-w-2xl">
        <Link :href="`/blogs/${blog.id}`" class="mb-6 inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-teal-400">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Back to post
        </Link>

        <div class="overflow-hidden rounded-2xl border border-white/5 bg-[#111827]">
            <div class="h-1.5 bg-gradient-to-r from-cyan-400 to-blue-400" />

            <div class="p-8">
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-white">Edit Post</h1>
                    <p class="mt-1 text-sm text-slate-500">Update your post details</p>
                </div>

                <form @submit.prevent="updateBlog" class="flex flex-col gap-6">
                    <div class="flex flex-col gap-2">
                        <label for="title" class="text-sm font-medium text-slate-300">Title</label>
                        <input
                            v-model="title"
                            id="title"
                            type="text"
                            placeholder="Give your post a catchy title..."
                            class="rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-slate-600 transition focus:border-teal-400/50 focus:outline-none focus:ring-1 focus:ring-teal-400/30"
                        />
                        <p v-if="$page.props.errors?.title" class="text-sm text-red-400">
                            {{ $page.props.errors.title }}
                        </p>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="description" class="text-sm font-medium text-slate-300">Content</label>
                        <textarea
                            v-model="description"
                            id="description"
                            rows="10"
                            placeholder="Write your story..."
                            class="rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-slate-600 transition focus:border-teal-400/50 focus:outline-none focus:ring-1 focus:ring-teal-400/30"
                        />
                        <p v-if="$page.props.errors?.description" class="text-sm text-red-400">
                            {{ $page.props.errors.description }}
                        </p>
                    </div>

                    <button
                        type="submit"
                        class="rounded-xl bg-teal-400 px-6 py-3 text-sm font-semibold text-[#0B1120] transition hover:bg-teal-300"
                    >
                        Update Post
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: { Link },
    props: {
        blog: {
            type: Object,
        },
    },
    data() {
        return {
            title: this.blog.title,
            description: this.blog.description,
        };
    },
    methods: {
        updateBlog() {
            this.$inertia.post("/blogs/" + this.blog.id + "/update", {
                title: this.title,
                description: this.description,
            });
        },
    },
};
</script>
