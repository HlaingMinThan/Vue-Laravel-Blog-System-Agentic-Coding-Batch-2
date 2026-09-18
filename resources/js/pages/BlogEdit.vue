<template>
    <div class="mx-auto max-w-xl p-6">
        <h1 class="mb-6 text-2xl font-semibold">Update blog</h1>

        <form @submit.prevent="updateBlog" class="flex flex-col gap-4 rounded-lg border p-6">
            <div class="flex flex-col gap-2">
                <label for="title" class="text-sm font-medium">Title</label>
                <input
                    v-model="title"
                    id="title"
                    type="text"
                    placeholder="Title"
                    class="rounded-md border px-3 py-2"
                />
            </div>
            <div class="text-red-400">
                {{ $page.props.errors?.title }}
            </div>


            <div class="flex flex-col gap-2">
                <label for="description" class="text-sm font-medium">Description</label>
                <textarea
                    v-model="description"
                    id="description"
                    rows="8"
                    placeholder="Description"
                    class="rounded-md border px-3 py-2"
                />
            </div>
            <div class="text-red-400">
                {{ $page.props.errors?.description }}
            </div>

            <button
                type="submit"
                class="rounded-md bg-black px-4 py-2 text-white"
            >
                Update
            </button>
        </form>
    </div>
</template>

<script>
export default {
    props : {
        blog : {
            type : Object
        }
    },
    data(){
        return {
            title : this.blog.title,
            description : this.blog.description,
        }
    },
    methods : {
        updateBlog(){
            let data = {
                title: this.title,
                description: this.description,
            };

            this.$inertia.post("/blogs/"+this.blog.id+"/update", data)
        }
    }
}
</script>
