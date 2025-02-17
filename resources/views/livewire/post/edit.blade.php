<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Halaman Edit Post') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

            <!-- Validasi Error -->
            <x-validation-errors class="mb-4" />

            <form action="{{ route('post.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Title Field -->
            <div>
                <x-label for="title" value="Title" />
                <x-input id="title" type="text" name="title" value="{{ old('title', $post->title) }}" required class="block mt-1 w-full" />
            </div>

            <!-- Description Field -->
            <div class="mt-4">
                <x-label for="description" value="Description" />
                <textarea id="description" name="description" required class="block mt-1 w-full">{{ old('description', $post->description) }}</textarea>
            </div>

            <!-- Submit and Cancel Buttons -->
            <div class="flex items-center justify-end mt-4 space-x-4">
                <!-- Save Post Button -->
                <x-button class="ms-4">
                    {{ __('Save') }}
                </x-button>

                <!-- Cancel Button (Link) -->
                <x-button class="ms-4">
                    <a href="{{ route('post.index') }}" class="text-red-500 hover:text-red-700">
                        {{ __('Cancel') }}
                    </a>
                </x-button>
            </div>
        </form>

        </div>
    </div>
</div>
