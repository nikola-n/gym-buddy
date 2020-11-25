<?php

use App\Http\Livewire\Admin\Blog;
use App\Http\Livewire\Admin\Login;

Route::middleware(['guest', 'admin'])->group(function () {
    Route::get('/admin', Login::class)->name('admin.login');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/blogs', Blog::class)->name('admin.blogs');
    Route::view('/admin/blogs/create', 'admin.blogs.create')->name('admin.blogs.create');
    Route::view('/admin/blogs/{blog}/edit', 'admin.blogs.edit')->name('admin.blogs.edit');
});
