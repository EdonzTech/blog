<?php

use App\Livewire\EditPostModal;
use App\Livewire\Post as LivewirePost;
use App\Livewire\ShowPost;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome',
    ['posts' => Post::with('publisher')->get()]);
})->name('home');

Route::get('/post', LivewirePost::class)->name('post');
Route::get('/show/{post}', ShowPost::class)->name('show');



