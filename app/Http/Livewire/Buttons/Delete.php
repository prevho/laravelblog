<?php

namespace App\Http\Livewire\Buttons;
use Illuminate\Support\Facades\File;

use Livewire\Component;

class Delete extends Component
{
    


    ///
    public $post;
    public $confirmingPostDeletion = false;

    public function confirmPostDeletion()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-post');
        $this->confirmingPostDeletion = true;
    }

    public function deletePost()
    {
        File::delete(storage_path('app/public/blog_images/' . $this->post->image));
        $this->post->delete();

        session()->flash('message', 'Post Succesfully Deleted');

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.buttons.delete');
    }
}
