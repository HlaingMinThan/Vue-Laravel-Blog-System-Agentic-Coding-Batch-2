<template>
    <div class="mx-auto max-w-3xl">
        <Link href="/blogs" class="mb-6 inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-teal-400">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Back to all posts
        </Link>

        <article class="overflow-hidden rounded-2xl border border-white/5 bg-[#111827]">
            <div class="h-1.5 bg-gradient-to-r from-teal-400 via-cyan-400 to-blue-400" />

            <div class="p-8 sm:p-10">
                <span v-if="blog.category" class="mb-3 inline-block rounded-full bg-teal-400/10 px-3 py-1 text-xs font-medium text-teal-400">
                    {{ blog.category.name }}
                </span>
                <h1 class="text-3xl font-bold leading-tight text-white">{{ blog.title }}</h1>

                <div v-if="blog.user" class="mt-5 flex items-center gap-3">
                    <Link :href="`/users/${blog.user.id}`" class="flex items-center gap-3 transition hover:opacity-80">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-teal-400 to-cyan-400 text-sm font-bold text-[#0B1120]">
                            {{ blog.user.name?.charAt(0).toUpperCase() }}
                        </div>
                        <div>
                            <p class="font-medium text-white">{{ blog.user.name }}</p>
                            <p class="text-xs text-slate-500">Author</p>
                        </div>
                    </Link>
                </div>

                <div class="mt-8 border-t border-white/5 pt-8">
                    <p class="whitespace-pre-wrap text-base leading-relaxed text-slate-400">{{ blog.description }}</p>
                </div>

                <div v-if="canUpdate" class="mt-8 flex items-center gap-3 border-t border-white/5 pt-6">
                    <Link
                        :href="`/blogs/${blog.id}/edit`"
                        class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-slate-300 transition hover:border-teal-400/30 hover:text-teal-400"
                    >
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        Edit
                    </Link>
                    <button
                        type="button"
                        class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-slate-300 transition hover:border-red-400/30 hover:text-red-400"
                        @click="deleteBlog"
                    >
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                        Delete
                    </button>
                </div>
            </div>
        </article>
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
        canUpdate: Boolean
    },
    methods: {
        deleteBlog() {
            if (confirm('Are you sure you want to delete this post?')) {
                this.$inertia.post("/blogs/" + this.blog.id + "/delete");
            }
        },
    },
};
</script>
