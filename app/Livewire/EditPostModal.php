<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPostModal extends Component
{

    public $post;
    public $title;
    public $body;
    public $image;

    use WithFileUploads;

    public function mount (Post $post)
    {
        $this->title = $post->title;
        $this->body = $post->body;  
        $this->image = $post->image;
    }

    public function update (Post $post)
    {
        // Validation
        $this->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($this->image) {
            $imagePath = $this->image->store('uploads', 'public');
            $post->update(['image' => $imagePath]);
        }
        
        // Update
        $post->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);
     
        session()->flash('success', 'Post updated successfully.');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.edit-post-modal');
    }
}
