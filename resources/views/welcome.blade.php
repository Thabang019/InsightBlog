<x-home>

    <x-slot name="title">InsightBlog</x-slot>
    <x-slot name="heading">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-4xl mx-auto mb-8">
            @if(count($posts) > 0)
            <div class="py-12">
                @foreach ($posts as $post)
                    <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                       
                        @if ($post->image && file_exists(public_path($post->image)))
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="mt-4 w-full h-auto">
                        @else
                        <img src="{{ asset('wallpapersden.com_anime-landscape-hd-ai-city_1952x1120.jpg') }}" alt="wallpapersden.com_anime-landscape-hd-ai-city_1952x1120" class="mt-4 w-full h-auto">
                        @endif

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
    </x-slot>

</x-home>