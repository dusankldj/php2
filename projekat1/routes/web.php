<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/products', function () {
    return view('pages.products');
})->name('products');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
