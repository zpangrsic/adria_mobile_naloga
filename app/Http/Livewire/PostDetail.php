<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostDetail extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.post-detail', ['post' => $this->post]);
    }
}
