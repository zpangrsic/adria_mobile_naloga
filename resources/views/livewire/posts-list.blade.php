<div>
    @foreach($posts as $post)
        <livewire:post-detail :post="$post" :key="$post->id"></livewire:post-detail>
    @endforeach
    {{ $posts->links() }}
</div>
