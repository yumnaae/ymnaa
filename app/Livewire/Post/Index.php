<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    // protected $queryString = ['search'];

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    public function render()
    {
        return view('livewire.post.index',[
            'posts'=>$this->search === null ? 
                Post::latest()->paginate(3) : 
                Post::latest()->where('title','like','%'.$this->search.'%')->paginate(2)

        ]);
    }
}