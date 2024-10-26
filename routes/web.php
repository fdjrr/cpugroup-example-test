<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/about', \App\Livewire\About::class)->name('about');
Route::prefix('posts')->group(function () {
    Route::get('', \App\Livewire\Post\Index::class)->name('home.posts.index');
    Route::get('{post:slug}', \App\Livewire\Post\Show::class)->name('home.posts.show');
});
Route::get('/products', \App\Livewire\Products::class)->name('products');
Route::get('/branches', \App\Livewire\Branches::class)->name('branches');
Route::get('/contact', \App\Livewire\Contact::class)->name('contact');

Route::middleware(['guest'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('login', \App\Livewire\Auth\Login::class)->name('auth.login');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('', \App\Livewire\Dashboard\Index::class)->name('dashboard');

        Route::prefix('transactions')->group(function () {
            Route::get('', \App\Livewire\Dashboard\Transaction\Index::class)->name('transactions.index');
            Route::get('create', \App\Livewire\Dashboard\Transaction\Create::class)->name('transactions.create');
            Route::get('{transaction}/edit', \App\Livewire\Dashboard\Transaction\Edit::class)->name('transactions.edit');
        });

        Route::prefix('suppliers')->group(function () {
            Route::get('', \App\Livewire\Dashboard\Supplier\Index::class)->name('suppliers.index');
            Route::get('create', \App\Livewire\Dashboard\Supplier\Create::class)->name('suppliers.create');
            Route::get('{supplier}/edit', \App\Livewire\Dashboard\Supplier\Edit::class)->name('suppliers.edit');
        });

        Route::prefix('categories')->group(function () {
            Route::get('', \App\Livewire\Dashboard\Category\Index::class)->name('categories.index');
            Route::get('create', \App\Livewire\Dashboard\Category\Create::class)->name('categories.create');
            Route::get('{category}/edit', \App\Livewire\Dashboard\Category\Edit::class)->name('categories.edit');
        });

        Route::prefix('products')->group(function () {
            Route::get('', \App\Livewire\Dashboard\Product\Index::class)->name('products.index');
            Route::get('create', \App\Livewire\Dashboard\Product\Create::class)->name('products.create');
            Route::get('{product}/edit', \App\Livewire\Dashboard\Product\Edit::class)->name('products.edit');
        });

        Route::prefix('branches')->group(function () {
            Route::get('', \App\Livewire\Dashboard\Branch\Index::class)->name('branches.index');
            Route::get('create', \App\Livewire\Dashboard\Branch\Create::class)->name('branches.create');
            Route::get('{branch}/edit', \App\Livewire\Dashboard\Branch\Edit::class)->name('branches.edit');
        });

        Route::prefix('posts')->group(function () {
            Route::get('', \App\Livewire\Dashboard\Post\Index::class)->name('posts.index');
            Route::get('create', \App\Livewire\Dashboard\Post\Create::class)->name('posts.create');
            Route::get('{post}/edit', \App\Livewire\Dashboard\Post\Edit::class)->name('posts.edit');
        });

        Route::prefix('guest-books')->group(function () {
            Route::get('', \App\Livewire\Dashboard\GuestBook\Index::class)->name('guest_books.index');
            Route::get('{guest_book}', \App\Livewire\Dashboard\GuestBook\Show::class)->name('guest_books.show');
        });
    });
});
