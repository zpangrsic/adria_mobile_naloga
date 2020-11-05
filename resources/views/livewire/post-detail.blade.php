<div
    class="max-w-sm rounded overflow-hidden shadow-lg bg-gray-300 my-4"
    x-data="{ text: 'Show', open: false }"
>
    <div class="px-6 py-4">
        <div class="flex">
            <div class="flex-1 font-bold text-xl mb-2">
                <a href="posts/{{$post->id}}">{{$post->title}}</a>
            </div>
            <div class="flex-none">
                <button
                    x-text="text"
                    class="w-auto border-2 bg-blue-400 hover:bg-blue-100 text-white hover:text-black sm\:rounded p-1 text-sm rounded"
                    x-on:click="text = (text == 'Show')? 'Hide': 'Show'; open = !open;"
                >
                </button>
            </div>
        </div>

        <p class="text-gray-700 text-base" x-show="open">
            {{$post->content}}
        </p>
    </div>
    <div class="px-6 pt-4 pb-2">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Date Created: {{$post->created_at}}</span>
    </div>
    @auth
    <button
        class="w-auto border-2 bg-blue-400 hover:bg-blue-100 text-white hover:text-black sm\:rounded p-1 text-sm rounded"
        wire:click="edit({{$post->id}})"
    >
        Edit
    </button>
    @endauth
</div>
