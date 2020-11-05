<template>
    <post v-model="value" @save="save" :edit="edit">
        <template #title>
            <slot name="title"></slot>
        </template>
        <template #default="{ data }">
            <slot v-bind:data="data"></slot>
        </template>
        <template #actions>
            <slot name="actions"></slot>
        </template>
    </post>
</template>

<script>

import Post from "@/Pages/Posts/Post";

export default {
    name: "EditPost",
    components: { Post },
    props: {
        value: null,
        edit: true,
        isNew: false
    },
    data () {
        return {
            loading: false,
        }
    },
    watch: {
        value : {
            handler () {
                this.$emit('update:value', this.value)
            },
            deep: true
        }
    },
    methods: {
        save (args) {
            let { id, title, content}  = this.value
            if (!id) {
                console.error("Post has no Id!")
                return false
            }
            this.loading = true;
            this.$inertia.post("/admin/posts/" + id, {title, content}, {
                onSuccess: (res) => {
                    console.log(res)
                },
                onFinish: () => {
                    this.loading = false
                }
            })
        },
        delete () {
            let {id} = this.value
            if (!id) {
                console.error("Post has no Id!")
                return false
            }
            this.loading = true
            this.$inertia.delete("/admin/posts/" + id, {}, {
                onSuccess: (res) => {
                    console.log("Deleted Post: ", res)
                },
                onFinish: () => {
                    this.loading = false
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
