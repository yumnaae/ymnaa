<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Edit extends Component
{
    public $post;

    public function mount($id)
    {
        // Find the post by its ID
        $this->post = Post::findOrFail($id);
    }
    
    public function render()
    {
        return view('livewire.post.edit');
    }
}
