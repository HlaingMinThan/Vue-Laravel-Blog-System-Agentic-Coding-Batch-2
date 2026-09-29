<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { home } from '@/routes';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div class="flex min-h-svh">
        <div class="hidden w-1/2 items-center justify-center bg-[#0B1120] lg:flex">
            <div class="relative max-w-md px-8 text-center">
                <div class="absolute -left-32 -top-32 h-64 w-64 rounded-full bg-teal-400/10 blur-[100px]" />
                <div class="absolute -bottom-32 -right-32 h-64 w-64 rounded-full bg-cyan-400/10 blur-[100px]" />
                <div class="relative">
                    <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-teal-400 to-cyan-400">
                        <svg class="h-9 w-9 text-[#0B1120]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h2 class="mb-3 text-3xl font-bold text-white">BlogSpot</h2>
                    <p class="text-lg text-slate-400">Share your stories, connect with readers, and build your audience.</p>
                    <div class="mt-8 flex justify-center gap-2">
                        <div class="h-1.5 w-1.5 rounded-full bg-slate-700"></div>
                        <div class="h-1.5 w-8 rounded-full bg-teal-400"></div>
                        <div class="h-1.5 w-1.5 rounded-full bg-slate-700"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-1 flex-col items-center justify-center gap-6 bg-[#111827] p-6 md:p-10">
            <div class="w-full max-w-sm">
                <div class="flex flex-col gap-8">
                    <div class="flex flex-col items-center gap-4">
                        <Link
                            :href="home()"
                            class="flex flex-col items-center gap-2 font-medium"
                        >
                            <div class="mb-1 flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-teal-400 to-cyan-400">
                                <svg class="h-6 w-6 text-[#0B1120]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <span class="sr-only">{{ title }}</span>
                        </Link>
                        <div class="space-y-2 text-center">
                            <h1 class="text-xl font-bold text-white">{{ title }}</h1>
                            <p class="text-sm text-slate-500">
                                {{ description }}
                            </p>
                        </div>
                    </div>
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>
