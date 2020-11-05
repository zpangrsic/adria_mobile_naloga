<template>
    <app-layout>
        <ListPagination v-model="value">
            <template #default="{ data }">
                <EditPost v-model="data" :edit="editable">
                    <template #actions="{ instance }">
                        <button
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                            @click.prevent="redirectToEdit(data.id)"
                        >
                            Edit
                        </button>
                    </template>
                </EditPost>
            </template>
        </ListPagination>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ListPagination from "@/Pages/Posts/ListPagination";
import EditPost from "@/Pages/Posts/EditPost";

export default {
    components: {EditPost, ListPagination, AppLayout},
    props: {
        value: {type: Object, default: () => {return {}}},
    },
    data () {
        return {
            editable: false
        }
    },
    methods: {
        redirectToEdit (id) {
            this.$inertia.get('/admin/posts/edit/' + id)
        },
        redirectToCreate () {
            this.$inertia.get('/admin/posts/create')
        }
    }
}
</script>

<style scoped>

</style>
