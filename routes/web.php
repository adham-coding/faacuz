<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::controller(SiteController::class)->group(
            function () {
                Route::get('', 'welcome')
                    ->name('welcome');

                Route::get('category/{slug}', 'category')
                    ->name('category');

                Route::get('product/{slug}/', 'product')
                    ->name('product');

                Route::get('products', 'products')
                    ->name('products');

                Route::get('about', 'about')
                    ->name('about');

                Route::get('contact', 'contact')
                    ->name('contact');
            }
        );


        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth'])->name('dashboard');

        require __DIR__ . '/auth.php';
    }
);
