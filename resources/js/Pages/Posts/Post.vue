<template>
    <div class="flex flex-col items-center justify-center my-5">
        <form class="w-full max-w-lg p-2 bg-gray-400 rounded">
            <slot name="title">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    Post {{id}} Form
                </h3>
            </slot>
            <slot :data="{title, content}">
                <div class="mt-2">
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-title">
                            Title
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-title"
                            type="text"
                            placeholder="Insert title"
                            :disabled="!edit"
                            v-model="title"
                        >
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-content">
                            Content
                        </label>
                        <textarea
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-content"
                            :disabled="!edit"
                            v-model="content"
                        ></textarea>
                    </div>
                </div>
            </slot>
            <slot name="actions">
                <div v-if="edit">
                    <button
                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                        @click.prevent="save"
                    >
                        Save
                    </button>
                </div>
            </slot>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        value: {
            type: Object,
            default: () => {
                return {
                    id: null,
                    title: "",
                    content: ""
                }
            }
        },
        edit: false
    },
    data () {
        return {
            id: null,
            title: "",
            content: ""
        }
    },
    watch : {
        id () {
            this.value.id = this.id
        },
        title () {
            this.value.title = this.title
        },
        content () {
            this.value.content = this.content
        }
    },
    created() {
        console.log("Post component created")
        if (this.value) {
            this.id = this.value.id
            this.title = this.value.title
            this.content = this.value.content
        }
    },
    computed: {
    },
    methods: {
        save() {
            if (!this.id){
                return
            }
            this.$emit('save')
        },
        create () {
            this.$emit('create')
        },

    }
}
</script>

<style scoped>

</style>
