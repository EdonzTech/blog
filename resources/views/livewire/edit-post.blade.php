
<div>
    <x-layouts.app>

        <div wire:poll.keep.alive class="max-w-screen-xl w-full mx-auto">
            <h1 class="text-3xl text-primary-500 font-medium text-center py-5">Our Success Story</h1>  
            <div class="text-right max-w-xl mx-auto mb-10">
                <a href="{{ route('home') }}" class="py-2 px-5 bg-red-500 text-white rounded-lg text-lg">Back</a>
            </div>
            <div class=" bg-red-100 border border-gray-200 rounded-lg shadow ">
                <a href="#" class="flex justify-center">
                    <img class="rounded-t-lg" src="{{ asset($post->image) }}" alt="" />
                </a>
                <div class="py-5 px-4">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold text-gray-900">{{ $post->title }}</h5>
                    </a>
                    {{--      <p class="font-medium flex justify-between">Published by:{{ $post->publisher->name }}    --}}
                        <span class="">{{ $post->created_at->diffForHumans() }} </span>
                    </p>
                    <p class="mb-3 font-normal text-gray-700 pt-2">{{ $post->body }}.</p>
                </div>
                <div class="flex gap-6 px-2 mb-2">
                    <button  x-data x-on:click="$dispatch('open-modal')" type="button" class="bg-blue-500 text-xl px-5 py-2 text-white rounded-lg ">Edit</button>
                    <button wire:click="destory({{ $post->id }})"  class="bg-red-500 text-xl px-5 py-2 text-white rounded-lg ">Delete</button>
                </div> 
            </div>
          
        </div>

        <!-- The Modal -->
        <x-modal  :post=$post   />

    </x-layouts.app>
</div>
