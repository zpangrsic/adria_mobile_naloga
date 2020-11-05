<template>
    <div class="flex flex-col items-center justify-center">
        <div v-for="item in this.items" :key="item.id" class="w-full">
           <slot :data="item"></slot>
        </div>
        <slot name="pagination" :links="links">
            <div class="mt-6 -mb-1 flex flex-wrap">
                <template v-for="(link, key) in links">
                    <div v-if="link.url === null" :key="key" class="mr-1 mb-1 px-4 py-3 text-sm border rounded text-gray-400" :class="{ 'ml-auto': link.label === 'Next' }">{{ link.label }}</div>
                    <inertia-link v-else :key="key" class="mr-1 mb-1 px-4 py-3 text-sm border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-white': link.active, 'ml-auto': link.label === 'Next' }" :href="link.url">{{ link.label }}</inertia-link>
                </template>
            </div>
        </slot>
    </div>
</template>

<script>
export default {
    props: {
        value: {
            type: Object,
            default: () => {
                return {
                    current_page:0,
                    data:[],
                    first_page_url:"",
                    from:1,
                    last_page:0,
                    last_page_url:"",
                    links:[],
                    next_page_url:"",
                    path:"",
                    per_page:0,
                    prev_page_url:null,
                    to:0,
                    total:0
                }
            }
        }
    },
    computed: {
        items () {
            return (this.value) ? this.value.data: []
        },
        links () {
            return (this.value)? this.value.links: []
        }

    }
}
</script>

<style scoped>

</style>
