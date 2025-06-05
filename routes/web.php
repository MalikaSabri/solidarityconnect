<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociationController;
// use App\Http\Controllers\DonateurController;
// use App\Http\Controllers\AdminController;
Route::get('/', function () {
    return view('acceuil');
});
Route::get('/inscrire', function () {
    return view('association.inscrireassociation');
})->name('association.inscription');

Route::get('/connecter', function () {
    return view('association.connecterassociation');
});
//

// Route pour traiter l'inscription
Route::post('/inscrire', [App\Http\Controllers\AssociationController::class,'store'])->name('association.store');
// Route pour le profil après inscription
Route::get('/association/profil', [App\Http\Controllers\AssociationController::class, 'show'])->name('association.profil');

// Connexion Association
Route::get('/association/connecter', [AssociationController::class, 'showLoginForm'])->name('association.login.form');
Route::post('/association/connecter', [AssociationController::class, 'login'])->name('association.login');


// -----------------------
// Donateur
// -----------------------
Route::get('/donateur/inscrire', function () {
    return view('donateur.inscriredonateur');
});
Route::get('/login', function () {
    return view('donateur.connecterdonateur');
})->name('login');



// -----------------------
// Admin
// -----------------------
Route::get('/admin/login', function () {
    return view('admin.connecteradmin');
});




// -----------------------
// Besoin
// -----------------------
Route::get('/association/besoin/create', function() {
    if (!auth()->guard('association')->check()) {
        return redirect('/connecter');
    }
    return view('association.formbesoin', ['association' => auth()->guard('association')->user()]);
})->name('association.besoin.create');



// -----------------------
// Lougout
// -----------------------

Route::post('/association/logout', [App\Http\Controllers\AssociationController::class, 'logout'])->name('association.logout');
