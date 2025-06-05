<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AssociationController extends Controller
{
  public function store(Request $request)
{

    // Validation des données
    $validated = $request->validate([
        'nomassociation' => 'required|string|max:100',
        'emailassociation' => 'required|email|unique:associations,email',
        'password' => 'required|min:8',
        'telephone' => 'required|string|max:20',
        'adresse' => 'required|string',
        'description' => 'required|string',
    ]);

    // Création de l'association
    $association = Association::create([
        'nom_complet' => $validated['nomassociation'],
        'email' => $validated['emailassociation'],
        'mot_de_passe' => Hash::make($validated['password']),
        'telephone' => $validated['telephone'],
        'adresse' => $validated['adresse'],
        'description' => $validated['description'],
        'date_inscription' => now(),
    ]);

    // Authentification de l'association
    auth()->guard('association')->login($association);

    // Redirection vers le profil avec un message de succès
    return redirect()->route('association.profil')
        ->with('success', 'Inscription réussie !');
}

    public function show()
    {
        if (!auth()->guard('association')->check()) {
            return redirect('/connecter');
        }

        $association = auth()->guard('association')->user();
        return view('association.profilassociation', compact('association'));
    }

    public function logout(Request $request)
{
    auth()->guard('association')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
}


public function showLoginForm()
{
    return view('association.connecterassociation');
}

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('association')->attempt([
        'email' => $credentials['email'],
        'password' => $credentials['password']
    ], $request->remember)) {
        $request->session()->regenerate();
        return redirect()->route('association.profil');
    }

    return back()->withErrors([
        'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
    ])->onlyInput('email');
}


}
