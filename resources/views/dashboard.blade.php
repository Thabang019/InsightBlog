<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mb-8">
    <div class="py-12">
            @foreach ($posts as $post)
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-2xl">
                    <a href="{{ route('posts.show', $post) }}">   {{$post->message}}</a>
                </h2>
                <p class="mt-2">
                    {{ Str::limit($post->message, 200)}}
                </p>
                <span class="text-gray-800">Author : {{ $post->user->name }}</span>
                <span class="block mt-4 text-sm opacity-70">{{ $post->created_at->format('j M Y, g:i a') }}</span>
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
