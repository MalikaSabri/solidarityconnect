<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('acceuil');
});
Route::get('/inscrire', function () {
    return view('association.inscrireassociation');
});
Route::get('/connecter', function () {
    return view('association.connecterassociation');
});