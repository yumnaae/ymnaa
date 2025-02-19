<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">

            <!-- Validasi Error -->
            <x-validation-errors class="mb-4" />

            <form action="{{ route('post.store') }}" method="POST">
            @csrf

            <!-- Title Field -->
            <div>
                <x-label for="title" value="Title" />
                <x-input id="title" type="text" name="title" value="{{ old('title') }}" required class="block mt-1 w-full" />
            </div>

            <!-- Description Field -->
            <div class="mt-4">
                <x-label for="description" value="Description" />
                <textarea id="description" name="description" required class="block mt-1 w-full">{{ old('description') }}</textarea>
            </div>

            <!-- Submit and Cancel Buttons -->
            <div class="flex items-center justify-end mt-4 space-x-4">
                <!-- Create Post Button -->
                <x-button class="ms-4">
                    {{ __('Create') }}
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
