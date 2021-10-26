<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use  WithPagination;

    public $search = "";
    public $orderBy = "id";
    public $orderAsc = true;
    public $perPage = 10;

    public function render()
    {
        $posts = Post::searchPost($this->search)
        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);
        return view('livewire.posts.index', compact('posts'));
    }
}
