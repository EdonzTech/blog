<x-layouts.app>
        
    {{-- Stories Section Starts --}}
    <div class="max-w-screen-xl w-full mx-auto ">
        <div class=" mt-20 text-right">
            <a href="{{ route('post') }}" class="py-2 px-4 bg-red-500 text-white rounded-xl">Post A Blog</a>
        </div>
        <h1 class="text-3xl text-primary-500 font-medium pt-9 text-center">Our Success Stories</h1>
        <div class="overflow-x-scroll">
            <div class="flex space-x-4 py-10 ">
                @foreach($posts as $post)
                    <div wire:key="{{ $post->id }}"  class="flex-shrink-0 max-w-sm  bg-white border border-gray-200 rounded-lg shadow ">
                        <a href="#" class="max-h-44">
                            <img class="rounded-t-lg" src="{{ asset($post->image) }}" alt="" />
                        </a>
                        <div class="py-5 px-4">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold text-gray-900">{{ $post->title }}</h5>
                            </a>
                         {{--   <p class="font-medium flex justify-between">Published by:{{ $post->publisher->name }}  --}}
                                <span class="">{{ $post->created_at->diffForHumans() }} </span>
                            </p>

                            <p class=" font-normal text-gray-700 h-48 overflow-hidden">{{ $post->body }}.</p>
                            <div class="mt-8">
                                <a href="{{ route('show', $post->id) }}" class="bg-red-500 py-3 px-5 rounded-lg text-white hover:bg-red-200 hover:text-gray-500 mt-1">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- Stories Section Ends --}}

</x-layouts.app>
