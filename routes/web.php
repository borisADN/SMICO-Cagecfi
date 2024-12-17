<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("temporary.login");
});

Route::get('/home', function () {
    // return view('welcome');
})->name('home');

Route::post('/login', [ApiController::class, 'Apilogin'])->name('login');


// Routes temporaires
route::view('login', 'temporary.login');
route::view('/form1', 'form1')->name('form1');
route::view('/form2', 'form2')->name('form2');
route::view('/form3', 'form3')->name('form3');
route::view('/form4', 'form4')->name('form4');