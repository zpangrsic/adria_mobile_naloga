<template>
    <EditPostLayout v-model="post" v-bind:is-new="true" v-bind:edit="true">
        <template #actions>
            <button
                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                @click.prevent="create"
            >
                Create
            </button>
        </template>
        <div v-if="loading">
            {{ message }}
        </div>
    </EditPostLayout>

</template>

<script>

import EditPostLayout from "@/Pages/Posts/EditPostLayout";

export default {
    components: {EditPostLayout},
    props: { value: Object },
    data () {
        return {
            post: (this.value)? this.value: {id: null, title: '', content: ''},
            loading: false,
            message: ''
        }
    },
    methods: {
        create () {
            let { title, content }  = this.post
            if (title && content) {
                this.setMessage('Creating Post, please wait ...')
                this.$inertia.post("/admin/posts/create" , {title, content}, {
                    onSuccess: (res) => {
                        console.log(res)
                    },
                    onFinish: () => {
                        this.resetMessage()
                        this.$inertia.get('/admin/posts/edit/' + this.value.id)
                    }
                })
            }
        },
        setMessage (m) {
            this.message = m
            this.loading = true;
        },
        resetMessage () {
            this.message = null
            this.loading = false
        }

    }
}
</script>

<style scoped>

</style>
