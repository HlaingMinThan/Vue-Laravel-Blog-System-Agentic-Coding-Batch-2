<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth?.user);

const initials = computed(() => {
    if (!user.value?.name) return '?';
    return user.value.name
        .split(' ')
        .map((n: string) => n[0])
        .join('')
        .toUpperCase()
        .slice(0, 2);
});
</script>

<template>
    <div class="min-h-screen bg-[#0B1120] text-slate-200">
        <nav class="sticky top-0 z-50 border-b border-white/5 bg-[#0B1120]/80 backdrop-blur-2xl">
            <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center gap-8">
                        <Link href="/blogs" class="flex items-center gap-2.5">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-teal-400 to-cyan-400">
                                <svg class="h-4.5 w-4.5 text-[#0B1120]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <span class="text-lg font-bold text-white">BlogSpot</span>
                        </Link>
                        <div class="hidden sm:flex items-center gap-1">
                            <Link href="/blogs" class="rounded-lg px-3 py-1.5 text-sm font-medium text-slate-400 transition hover:bg-white/5 hover:text-teal-400">
                                All Blogs
                            </Link>
                            <Link v-if="user" href="/blogs/create" class="rounded-lg px-3 py-1.5 text-sm font-medium text-slate-400 transition hover:bg-white/5 hover:text-teal-400">
                                Write
                            </Link>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <template v-if="user">
                            <Link href="/blogs/create" class="hidden sm:inline-flex items-center gap-2 rounded-lg bg-teal-400 px-4 py-2 text-sm font-semibold text-[#0B1120] transition hover:bg-teal-300">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                New Post
                            </Link>
                            <div class="flex items-center gap-2 rounded-full border border-white/10 bg-white/5 py-1 pl-1 pr-3">
                                <div class="flex h-7 w-7 items-center justify-center rounded-full bg-gradient-to-br from-teal-400 to-cyan-400 text-xs font-bold text-[#0B1120]">
                                    {{ initials }}
                                </div>
                                <span class="text-sm font-medium text-slate-300">{{ user.name }}</span>
                            </div>
                            <Link href="/logout" method="post" as="button" class="rounded-lg p-2 text-slate-500 transition hover:bg-white/5 hover:text-red-400">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                </svg>
                            </Link>
                        </template>
                        <template v-else>
                            <Link href="/login" class="rounded-lg px-4 py-2 text-sm font-medium text-slate-400 transition hover:text-white">
                                Log in
                            </Link>
                            <Link href="/register" class="rounded-lg bg-teal-400 px-4 py-2 text-sm font-semibold text-[#0B1120] transition hover:bg-teal-300">
                                Sign up
                            </Link>
                        </template>
                    </div>
                </div>
            </div>
        </nav>

        <main class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">
            <slot />
        </main>

        <footer class="border-t border-white/5">
            <div class="mx-auto max-w-6xl px-4 py-6 sm:px-6 lg:px-8">
                <p class="text-center text-sm text-slate-600">Built with Laravel & Vue.js</p>
            </div>
        </footer>
    </div>
</template>
