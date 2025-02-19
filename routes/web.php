<?php

use App\Livewire\Post\Create;
use App\Livewire\Post\Edit;
use App\Livewire\Post\Index;
use App\Livewire\Post\Show;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::get('/post.show/{id}', Show::class)->name('post.show'); // Livewire Show Component

    // Create Post (Form submission)
    Route::post('/post', function (Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('post.index')->with('success', 'Post berhasil dibuat!');
    })->name('post.store');

    // Edit Post (Update)
    Route::put('/post/{id}', function (Request $request, $id) {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('post.index')->with('success', 'Post berhasil diperbarui!');
    })->name('post.update');

    // Delete Post
    Route::delete('/post/{id}', function ($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post berhasil dihapus!');
    })->name('post.destroy');

});