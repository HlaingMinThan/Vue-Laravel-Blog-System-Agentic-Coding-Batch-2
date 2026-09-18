<template>
    <div>
        <h1 :key="blog.id">{{blog.title}}</h1>
        <p :key="blog.id">{{blog.description}}</p>
        <Link :href="`/blogs/${blog.id}/edit`" class="underline">Edit</Link>
        <button type="button" class="ml-4 underline" @click="deleteBlog">Delete</button>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {Link},
    props : {
        blog : {
            type : Object
        }
    },
    methods : {
        deleteBlog(){
            this.$inertia.post("/blogs/"+this.blog.id+"/delete")
        }
    }
}

</script>