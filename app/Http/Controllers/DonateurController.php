<?php

namespace App\Http\Controllers;

use App\Models\Donateur;
use App\Models\Besoin;
use App\Models\Donation;
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
            'mot_de_passe' => 'required|min:8',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
        ]);

        $donateur = Donateur::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'mot_de_passe' => Hash::make($validated['mot_de_passe']),
            'telephone' => $validated['telephone'],
            'adresse' => $validated['adresse'],
            'date_inscription' => now(),
        ]);

        Auth::guard('donateur')->login($donateur);

        return redirect()->route('donateur.profil');
    }

    public function showConnexionForm()
    {
        return view('donateur.connecterdonateur');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'mot_de_passe' => 'required'
        ]);

        $donateur = Donateur::where('email', $credentials['email'])->first();

        if ($donateur && Hash::check($credentials['mot_de_passe'], $donateur->mot_de_passe)) {
            Auth::guard('donateur')->login($donateur);
            return redirect()->route('donateur.profil');
        }

        return back()->withErrors(['email' => 'Email ou mot de passe incorrect.'])->withInput();
    }

    public function showProfil(Request $request)
    {
        $donateur = Auth::guard('donateur')->user();
        $initiales = strtoupper(substr($donateur->prenom, 0, 1) . substr($donateur->nom, 0, 1));

        // Récupérer les besoins non satisfaits
        $besoins = Besoin::whereNull('id_donateur')
                       ->with('association')
                       ->latest()
                       ->get();

        // Récupérer les dons du donateur connecté
        $dons = Donation::where('id_donateur', $donateur->id)
                      ->latest()
                      ->get();

        return view('donateur.profildonateur', [
            'donateur' => $donateur,
            'initiales' => $initiales,
            'besoins' => $besoins,
            'dons' => $dons,
            'currentView' => $request->input('view', 'besoins')
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('donateur')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function satisfaireBesoin($id)
{
    if (!Auth::guard('donateur')->check()) {
        return redirect('/login')->with('error', 'Veuillez vous connecter');
    }

    $donateur = Auth::guard('donateur')->user();
    $besoin = Besoin::findOrFail($id);

    // Vérifie s'il est déjà satisfait
    if ($besoin->id_donateur) {
        return back()->with('error', 'Ce besoin a déjà été pris en charge.');
    }

    // Associer le besoin au donateur connecté
    $besoin->id_donateur = $donateur->id;
    $besoin->save();

    return redirect()->route('donateur.formdon', ['besoin' => $besoin->id])
        ->with('success', 'Vous allez maintenant remplir le formulaire de don.');
}
public function showFormDon($id)
{
    $besoin = Besoin::findOrFail($id);
    return view('donateur.formdon', compact('besoin'));
}
// app/Http/Controllers/DonateurController.php

public function profile()
{
    $donateur = auth()->guard('donateur')->user();

    // Exemple : récupérer les dons du donateur
    $dons = $donateur->donations;

    return view('donateur.profile', compact('donateur', 'dons'));
}


}

