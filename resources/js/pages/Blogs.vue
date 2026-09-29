<template>
  <nav class="flex justify-between">
    <div>logo</div>
    <div class="space-x-3">
      <Link href="/blogs/create">Create Blog</Link>
      <Link>{{ $page.props.auth.user?.name }}</Link>
      <button v-on:click="logout" class="bg-red-500 px-2 py-2 rounded-lg">Logout</button>
    </div>
  </nav>
  <h1 v-if="user" class="text-3xl font-bold">
    {{ user.name }} - {{ user.nrc.number }}
  </h1>
  <Link v-for="blog in blogs" :key="blog.id" :href="`/blogs/${blog.id}`">
    <h1 class="my-2 underline">{{ blog.title }} - {{ blog.user?.name }}</h1>
  </Link>
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
  methods : {
    logout(){
        this.$inertia.post("/logout");
    }
  }
};
</script>