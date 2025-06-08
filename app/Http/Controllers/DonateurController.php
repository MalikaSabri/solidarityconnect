<?php

namespace App\Http\Controllers;

use App\Models\Donateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DonateurController extends Controller
{
    public function showInscriptionForm()
    {
        return view('donateur.inscriredonateur');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'nom' => 'required|string|max:50',
        'prenom' => 'required|string|max:50',
        'email' => 'required|email|unique:donateurs,email',
        'password' => 'required|min:8',
        'telephone' => 'required|string|max:20',
        'adresse' => 'required|string',
    ]);

    try {
        $donateur = Donateur::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'mot_de_passe' => Hash::make($validated['password']),
            'telephone' => $validated['telephone'],
            'adresse' => $validated['adresse'],
            'date_inscription' => now(),
        ]);

        Auth::guard('donateur')->login($donateur);

        return redirect()->route('donateur.profil')
            ->with('success', 'Inscription réussie !');

    } catch (\Exception $e) {
        return back()->withInput()->with('error', 'Erreur lors de l\'inscription: '.$e->getMessage());
    }
}

public function showProfil()
{
    if (!Auth::guard('donateur')->check()) {
        return redirect('/connecter');
    }

    $donateur = Auth::guard('donateur')->user();
    $initiales = strtoupper(substr($donateur->prenom, 0, 1) . substr($donateur->nom, 0, 1));

    return view('donateur.profildonateur', compact('donateur', 'initiales'));
}

    public function logout(Request $request)
    {
        Auth::guard('donateur')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
