<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Halaman Post') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <!-- Header dengan tombol -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-700"></h3>
                <!-- Search Form dengan posisi kiri dan border -->
                <form action="{{ route('post.index') }}" method="GET" class="inline-flex items-center ml-0 w-full">
                    <input type="text" name="search" value="{{ request()->query('search') }}" placeholder="Search posts..." class="px-4 py-2 border border-gray-300 rounded-md w-500">
                    <button type="submit" class="ml-2 px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-900">
                        <!-- Icon Kaca Pembesar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M16.5 10a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                        </svg>
                    </button>
                </form>

                <a href="{{ route('post.create') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-900 inline-flex items-center">
                    <!-- Icon + -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"></path>
                    </svg>
                </a>
            </div>

            <!-- Table Daftar Post -->
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 border border-gray-200 rounded-lg">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Title</th>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Aksi</th> <!-- Kolom AKSI -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $post->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $post->description }}
                            </td>
                            <td class="px-6 py-4">
                                <!-- Tombol Edit -->
                                <a href="{{ route('post.edit', $post->id) }}" class="text-blue-500 hover:bg-blue-100 hover:text-blue-700 inline-flex items-center px-3 py-2 rounded-md">
                                    <!-- Icon Edit -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M16.862 2.488a2.07 2.07 0 0 1 2.928 0l1.722 1.722a2.07 2.07 0 0 1 0 2.928l-1.484 1.484-4.65-4.65 1.484-1.484zm-2.254 2.254-10.608 10.61a4.125 4.125 0 0 0-1.015 1.684l-1.842 5.8a.75.75 0 0 0 .95.95l5.8-1.842a4.125 4.125 0 0 0 1.684-1.015l10.61-10.608-4.65-4.65z"/>
                                    </svg>
                                </a>

                                <!-- Tombol Delete -->
                                <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:bg-red-100 hover:text-red-700 inline-flex items-center px-3 py-2 rounded-md">
                                        <!-- Icon Trash -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M9 3a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1h5a1 1 0 1 1 0 2h-1v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6H3a1 1 0 1 1 0-2h5V3zm2 4a1 1 0 1 0-2 0v10a1 1 0 1 0 2 0V7zm4 0a1 1 0 1 0-2 0v10a1 1 0 1 0 2 0V7z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
