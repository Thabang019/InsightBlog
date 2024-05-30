<x-app-layout>
    <div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <input type="hidden" name="image_path" value="{{ $post->image }}" />
            <div class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md  bg-white shadow-sm mb-4">
                <x-input-label class="p-2" for="image" :value="__('Image')" />
                <x-text-input type="file"
                        name="image"
                        id="image"
                        accept="image/*" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <input
                placeholder="{{ __('Title') }}"
                type="text"
                name="title"
                id="title"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-4"
                value="{{ old('title', $post->title) }}"
            />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />

            <textarea
                name="message"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message', $post->message) }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('dashboard') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>