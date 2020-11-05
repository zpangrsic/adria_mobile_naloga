<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostDetail extends Component
{
    public $post;

    protected $listeners = [
        'edit' => 'edit'
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.post-detail', ['post' => $this->post]);
    }

    public function edit($id)
    {
        if (auth()) {
            $this->redirect('admin/posts/edit/' . $id);
            return true;
        }
        session()->flash('error', 'You are not authorized to view this content');
        return false;
    }
}
