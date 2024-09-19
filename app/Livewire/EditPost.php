<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    public $post;
    public $title;
    public $body;
    public $image;

    use WithFileUploads;
    
    public function mount($post)
    {
        $this->post = Post::findOrFail($post);
    }

    public function update( Post $post)
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
     
        session()->flash('success', 'Post created successfully.');
        $this->dispatch('close-modal');

    }

    public function destory(Post $post) 
    {
        $imagePath = public_path('storage/'. $post->image);

        if(file_exists($imagePath)) {
            unlink($imagePath);
        }
        $post->delete();
        session()->flash('success', 'Post deleted successfully.');
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.edit-post',  [
            'post' => $this->post,
        ]);
    }
}
