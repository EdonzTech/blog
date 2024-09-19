<div>
   <x-layouts.app>

        <div class="text-right max-w-xl mx-auto mt-10">
            <a href="{{ route('home') }}" class="py-2 px-5 bg-red-500 text-white rounded-lg text-lg">Back</a>
        </div>
        <div class="max-w-xl mx-auto bg-red-500 py-4 mt-10 rounded-xl">
            
            @if(session('success'))
                <span>{{ session('success') }}</span>
            @endif
            <h1 class="text-xl font-medium text-center py-3 text-white">Post A Blog</h1>
            <form wire:submit="store" class=" w-full bg-red-100 px-5"  action="/post" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="py-5">
                    <input  wire:model="title" class="py-3 w-full px-2 rounded-lg" type="text" placeholder="Title"> 
                    @error('title')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="py-5">
                    <textarea  wire:model="body" class="py-3 w-full px-2 rounded-lg" placeholder="Write the content of your blog here" > 
                    </textarea>
                    @error('body')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="py-5">
                    <input wire:model="image" type="file" accept="image/png,image/jpg,image/svg,image/webp" > 
                    @error('image')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                
                <button class="py-3 px-8 bg-red-500  text-white rounded-lg mb-2"  type="submit">Publish</button>
            </form>
        </div>
    </x-layouts.app>
</div>
