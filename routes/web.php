<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\DonateurController;
use App\Http\Controllers\AdminController;
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

// Route pour m'interesse
Route::post('/association/interesse/{donation}', [AssociationController::class, 'interesse'])
    ->name('association.interesse')
    ->middleware('auth:association');


Route::get('/association/besoins', [AssociationController::class, 'indexBesoins'])
    ->name('association.besoins.index')
    ->middleware('auth:association');

Route::get('/association/dons', [AssociationController::class, 'indexDons'])
    ->name('association.dons.index')
    ->middleware('auth:association');


    Route::post('/association/besoin/store', [AssociationController::class, 'storeBesoin'])
    ->name('association.besoin.store')
    ->middleware('auth:association');











// -----------------------
// Donateur
// -----------------------
Route::get('/donateur/inscrire', function () {
    return view('donateur.inscriredonateur');
});
Route::get('/login', function () {
    return view('donateur.connecterdonateur');
})->name('login');

// Routes Donateur
Route::get('/donateur/inscrire', [DonateurController::class, 'showInscriptionForm'])->name('donateur.inscription');
Route::post('/donateur/inscrire', [DonateurController::class, 'store'])->name('donateur.store');
Route::get('/donateur/profil', [DonateurController::class, 'showProfil'])->name('donateur.profil')->middleware('auth:donateur');
Route::post('/donateur/logout', [DonateurController::class, 'logout'])->name('donateur.logout');

// -----------------------
// Admin
// -----------------------
// Route::get('/admin/login', function () {
//     return view('admin.connecteradmin');
// });

// routes/web.php
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/profil', [AdminController::class, 'showProfil'])->name('admin.profil')->middleware('auth:admin');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');



// Routes pour les associations
Route::get('/admin/associations/{id}', [AdminController::class, 'showAssociationDetails'])
     ->name('admin.association.show');

Route::delete('/admin/associations/{id}', [AdminController::class, 'deleteAssociation'])
     ->name('admin.association.delete');

Route::post('/admin/associations/{id}/validate', [AdminController::class, 'validateAssociation'])
     ->name('admin.association.validate');
// Routes pour la suppression
Route::delete('/admin/donateurs/{id}', [AdminController::class, 'deleteDonateur'])
     ->name('admin.donateur.delete');

Route::delete('/admin/associations/{id}', [AdminController::class, 'deleteAssociation'])
     ->name('admin.association.delete');

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
