<template>
    <AppLayout>
        <EditPost v-model="value" :edit="edit" :is-new="isNew">
            <template #title>
                <slot name="title"></slot>
            </template>
            <template #default="{ data }">
                <slot v-bind:data="data"></slot>
            </template>
            <template #actions>
                <slot name="actions"></slot>
            </template>
        </EditPost>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import EditPost from "@/Pages/Posts/EditPost";

export default {
name: "EditPostLayout",
    components: {EditPost, AppLayout},
    props: {
        value: null,
        edit: true,
        isNew: false,
    },
    watch: {
        value : {
            handler () {
                this.$emit('update:value', this.value)
            },
            deep: true
        }
    }
}
</script>

<style scoped>

</style>
