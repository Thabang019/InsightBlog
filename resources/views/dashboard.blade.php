<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    @if(session('error'))
    <div class="flex items-center bg-red-300 text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>{{ session('error') }}</p>
      </div>
    @endif

    <div class="max-w-4xl mx-auto mb-8">
        @if(count($posts) > 0)
        <div class="py-12">
            @foreach ($posts as $post)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ Str::limit($post->message, 200) }}
                    </p>
                    <span class="block mt-4 text-sm opacity-70 text-gray-600">Author: {{ $post->user->name }}</span>
                    <span class="block mt-4 text-sm opacity-70">Written: {{ $post->created_at->format('j M Y, g:i a') }}</span>
                </div>
            @endforeach
        </div>
    @else
        <div class="py-12  text-center font-semibold text-xl text-gray-800 leading-tight">
            <p>No posts to display at the moment</p>
        </div>
    @endif
    </div>

</x-app-layout>
