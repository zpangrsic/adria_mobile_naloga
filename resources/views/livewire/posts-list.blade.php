<div>
    <div class="mx-8">
        <div class="flex flex-col items-center justify-center">
            @foreach($posts as $post)
                <livewire:post-detail :post="$post" :key="$post->id"></livewire:post-detail>
            @endforeach
        </div>
    </div>
    {{ $posts->links() }}
</div>
