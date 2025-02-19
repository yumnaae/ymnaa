<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <!-- Table Detail Post -->
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 border border-gray-200 rounded-lg">
                    <tbody>
                        <tr style="background-color: #FAF2F2;">
                            <td class="px-6 py-3"><strong>ID</strong></td>
                            <td class="px-6 py-4">
                                {{ $post->id }}
                            </td>
                        </tr>
                        <tr style="background-color: #F3E1E1;">
                            <td class="px-6 py-3"><strong>Title</strong></td>
                            <td class="px-6 py-4">
                                {{ $post->title }}
                            </td>
                        </tr>
                        <tr style="background-color: #FAF2F2;">
                            <td class="px-6 py-3"><strong>Description</strong></td>
                            <td class="px-6 py-4">
                                {{ $post->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="flex items-center justify-end mt-4 space-x-4">
                    <x-button class="ms-4">
                        <a href="{{ route('post.index') }}" class="text-red-500 hover:text-red-700">
                            {{ __('Kembali') }}
                        </a>
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</div>