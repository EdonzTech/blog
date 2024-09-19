<?php

use App\Livewire\EditPost;
use App\Livewire\Post as LivewirePost;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome',
    ['posts' => Post::with('publisher')->get()]);
})->name('home');

Route::get('/post', LivewirePost::class)->name('post');
Route::get('/edit/{post}', EditPost::class)->name('edit');


