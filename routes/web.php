<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


// Page inscription donateur
Route::get('/inscrire/donateur', function () {
    return view('inscriredonateur');
})->name('inscrire.donateur');
