<x-app-layout>
    <div class="max-w-4xl h-400 mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

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
                value="{{ old('title') }}"
            />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
            <textarea
                name="message"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>