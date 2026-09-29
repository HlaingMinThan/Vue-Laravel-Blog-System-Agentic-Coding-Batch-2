<template>
    <div>
        <div v-if="user" class="mb-10">
            <div class="relative overflow-hidden rounded-2xl border border-white/10 bg-white/5 p-8">
                <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-teal-400/10 blur-3xl" />
                <div class="relative flex items-center gap-5">
                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-teal-400 to-cyan-400 text-2xl font-bold text-[#0B1120]">
                        {{ user.name?.charAt(0).toUpperCase() }}
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">{{ user.name }}</h1>
                        <p v-if="user.nrc" class="text-slate-400">NRC: {{ user.nrc.number }}</p>
                        <p class="mt-1 text-sm text-slate-500">{{ blogs.length }} {{ blogs.length === 1 ? 'post' : 'posts' }} published</p>
                    </div>
                </div>
            </div>
        </div>

        <div v-else class="mb-10">
            <h1 class="text-4xl font-bold text-white">Discover Stories</h1>
            <p class="mt-3 text-lg text-slate-500">Explore the latest thoughts and ideas from our community.</p>
        </div>

        <div v-if="blogs.length" class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <Link
                v-for="(blog, index) in blogs"
                :key="blog.id"
                :href="`/blogs/${blog.id}`"
                class="group relative overflow-hidden rounded-2xl border border-white/5 bg-[#111827] transition-all duration-300 hover:border-teal-400/30 hover:bg-[#131B2E]"
            >
                <div
                    class="h-1.5 opacity-80"
                    :class="[
                        index % 5 === 0 ? 'bg-gradient-to-r from-teal-400 to-cyan-400' :
                        index % 5 === 1 ? 'bg-gradient-to-r from-cyan-400 to-blue-400' :
                        index % 5 === 2 ? 'bg-gradient-to-r from-violet-400 to-purple-400' :
                        index % 5 === 3 ? 'bg-gradient-to-r from-amber-400 to-orange-400' :
                        'bg-gradient-to-r from-pink-400 to-rose-400'
                    ]"
                />
                <div class="p-5">
                    <h2 class="mb-3 text-lg font-semibold leading-snug text-white transition-colors group-hover:text-teal-400">
                        {{ blog.title }}
                    </h2>
                    <p class="mb-5 line-clamp-2 text-sm leading-relaxed text-slate-500">
                        {{ blog.description }}
                    </p>
                    <div v-if="blog.user" class="flex items-center gap-2.5 border-t border-white/5 pt-4">
                        <div class="flex h-7 w-7 items-center justify-center rounded-full bg-gradient-to-br from-teal-400 to-cyan-400 text-[11px] font-bold text-[#0B1120]">
                            {{ blog.user.name?.charAt(0).toUpperCase() }}
                        </div>
                        <span class="text-sm text-slate-400">{{ blog.user.name }}</span>
                    </div>
                </div>
            </Link>
        </div>

        <div v-else class="flex flex-col items-center justify-center rounded-2xl border border-white/5 bg-[#111827] py-20">
            <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-teal-400/10">
                <svg class="h-8 w-8 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-white">No posts yet</h3>
            <p class="mt-1 text-sm text-slate-500">Be the first to share your story!</p>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: { Link },
    props: {
        blogs: {
            type: Array,
        },
        user: {
            type: Object,
        },
    },
};
</script>
