<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/kategori', function () {
    return view('kategori');
});
Route::get('/tentangkami', function () {
    return view('tentangkami');
});