<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/form1', function () {
    return view('form1');
})->name('form1');


// route::view('', 'register');

