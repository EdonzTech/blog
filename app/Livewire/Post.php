<?php

namespace App\Livewire;

use App\Models\Post as ModelsPost;
use Livewire\Component;
use Livewire\WithFileUploads;



class Post extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $image;
    public $post;

    
    public function store()
    {
        $this->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required'],
            'image' => ['required', 'image', 'max:2048'],
        ]);
    
        $imagePath = $this->image->store('uploads', 'public');
    
        ModelsPost::create([
            'title' => $this->title,
            'body' => $this->body,
            'image' => $imagePath,
        ]);
    
        $this->reset(['title', 'body', 'image']);
        session()->flash('success', 'Post created successfully.');
        return redirect('/');
        // dd('Yes it is working');
    } 

  
    public function render()
    {
        return view('livewire.post');
    }
}
