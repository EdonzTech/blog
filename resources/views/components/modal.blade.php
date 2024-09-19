@props(['post'])

<div
    x-data="{ show: false }"
    x-show="show" 
    x-on:open-modal.window = " show = true"
    x-on:close-modal.window = " show = false"
    style="display: none;"
    x-transition.duration.300ms

    class="fixed inset-0"
>

<!-- The Modal -->
     <div x-on:click=" show = false" class="fixed inset-0 bg-gray-900 opacity-40"> </div> 

    <div  class="bg-white rounded m-auto fixed inset-0 max-w-screen-xl overflow-y-auto">
        <h1 class="text-3xl text-primary-500 font-medium text-center py-3">Our Success Story</h1>
  
          
        <div class=" bg-red-500 p-4 mt-5">
            @if(session('success'))
                <span>{{ session('success') }}</span>
            @endif
            <h1 class="text-xl font-medium text-center text-white py-3">Update Your Blog</h1>

            <form wire:submit.prevent="update({{ $post->id }})" class=" w-full bg-red-200 px-5" action="" method="post" enctype="multipart/form-data" >
                @csrf
                @method('PATCH')
                <div class="py-5">
                    <input  wire:model="title" class="py-3 w-full px-2 rounded-lg" type="text" placeholder="Title" > 
                    @error('title')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="py-5">
                    <textarea id="body" wire:model="body" class="py-3 w-full px-2 rounded-lg">  
                        {{ $post->body }}
                    </textarea> 
                    @error('body')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="py-5">
                    <input wire:model="image" type="file" accept="image/png,image/jpg,image/svg,image/webp"> 
                    {{-- 
                        @if($post->image)
                        <img src="{{ asset($post->image) }}" alt="Current Image" class="mb-4">
                        @endif 
                    --}}

                    @error('image')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            
                <div class="flex justify-left gap-4 px-2 pb-2">
                    <button type="submit" class="bg-blue-500 text-xl px-6 py-2 text-white rounded-lg ">Save</button>
                    <button type="button" x-on:click="$dispatch('close-modal')" class="bg-red-500 text-xl px-5 py-2 text-white rounded-lg ">Cancel</button>
                </div>  
            </form>
        </div>
    </div>
</div>












   