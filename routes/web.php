<?php

use App\Livewire\Post\Create;
use App\Livewire\Post\Edit;
use App\Livewire\Post\Index;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Default Route
Route::get('/', function () {
    return view('welcome');
});

// Authenticated Routes (Jetstream)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard Route
    Route::get('/dashboard', function () {
        return view('dashboard');
})->name('dashboard');

// Post Routes (Livewire Components)
Route::get('/post.index', Index::class)->name('post.index');
Route::get('/post.create', Create::class)->name('post.create');
Route::get('/post.edit/{id}', Edit::class)->name('post.edit');

// Create Post (Form submission)
Route::post('/posts', function (Request $request) {
    // Validate incoming data
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    // Create a new post
    $post = new Post();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->save();

    // Redirect back with success message
    return redirect()->route('post.index')->with('success', 'Post berhasil dibuat!');
})->name('post.store');

// Edit Post (update)
Route::put('/posts/{id}', function (Request $request, $id) {
    // Find the post by ID
    $post = Post::findOrFail($id);

    // Validate incoming data
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    // Update the post data
    $post->title = $request->title;
    $post->description = $request->description;
    $post->save();

    // Redirect to post index with success message
    return redirect()->route('post.index')->with('success', 'Post berhasil diperbarui!');
})->name('post.update');

// Delete Post
Route::delete('/posts/{id}', function ($id) {
    // Find the post by ID
    $post = Post::findOrFail($id);
        
    // Delete the post
    $post->delete();

    // Redirect back to the post index with a success message
    return redirect()->route('post.index')->with('success', 'Post berhasil dihapus!');
})->name('post.destroy');

});
