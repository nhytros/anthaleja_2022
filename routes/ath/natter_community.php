<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Natter\PostController;
use App\Http\Controllers\Natter\CommunityController;

// Litted
// Route::get(config('ath.litted.c_prefix') . '{slug}', [CommunityController::class, 'show'])->name('litted.communities.show');
Route::group(['middleware' => ['guest']], function () {
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/d/{name}', [CommunityController::class, 'show'])->name('natter.community.show');
    Route::get('natter/community/{slug?}', [CommunityController::class, 'index'])->name('natter.community');
    Route::get('natter/communities', [CommunityController::class, 'list'])->name('natter.communities');
    Route::get('natter/new/community', [CommunityController::class, 'create'])->name('natter.community.create');
    Route::post('natter/save/community', [CommunityController::class, 'store'])->name('natter.community.store');
    Route::get('natter/edit/community/{slug}', [CommunityController::class, 'edit'])->name('natter.community.edit');
    Route::get('natter/delete/community/{slug}', [CommunityController::class, 'delete'])->name('natter.community.delete');
    Route::post('natter/update/community/{id}', [CommunityController::class, 'update'])->name('natter.community.update');
    Route::get('natter/restore/community/{slug}', [CommunityController::class, 'restore'])->name('natter.community.restore');
    Route::get('natter/destroy/community/{slug}', [CommunityController::class, 'destroy'])->name('natter.community.destroy');
});

// Route::get('natter/create/post/{slug}', [PostController::class, 'create'])->name('natter.post.create');
Route::post('natter/store/post', [PostController::class, 'store'])->name('natter.post.store');
    // Route::get('/ld/{community_slug}/posts/{post:slug}', [PostController::class, 'show'])->name('natter.posts.show');
    // Route::post('/ld/{community_slug}/posts/{post:id}/comment', [PostCommentController::class, 'store'])->name('natter.posts.comments');

    // Route::get('litted/{id}/edit', [PostController::class, 'edit'])->name('litted.post.edit');
    // Route::post('litted/update/post/{id}', [PostController::class, 'update'])->name('litted.post.update');
    // Route::get('litted/{id}/delete', [PostController::class, 'delete'])->name('litted.post.delete');
    // Route::get('litted/{id}/restore', [PostController::class, 'restore'])->name('litted.post.restore');
    // Route::get('litted/{id}/destroy', [PostController::class, 'destroy'])->name('litted.post.destroy');

    // Route::post('litted/post/{post:id}', [PostController::class, 'vote'])->name('litted.post.vote');