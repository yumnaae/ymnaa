<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search']; // Supaya parameter pencarian tersimpan di URL

    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination saat pencarian berubah
    }

    public function render()
    {
        $posts = Post::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(5);

        return view('livewire.post.index', compact('posts'));
    }
}