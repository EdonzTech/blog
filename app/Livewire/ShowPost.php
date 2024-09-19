<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPost extends Component
{
    public $post;
    public $title;
    public $body;
    public $image;

    
    public function mount($post)
    {
        $this->post = Post::findOrFail($post);
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
        return view('livewire.show-post',  [
            'post' => $this->post,
        ]);
    }
}
