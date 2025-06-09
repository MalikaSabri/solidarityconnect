<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Besoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonController extends Controller
{
   public function create()
    {
        $donateur = Auth::guard('donateur')->user();
        $initiales = strtoupper(substr($donateur->prenom, 0, 1) . substr($donateur->nom, 0, 1));

        return view('donateur.formdon', [
            'donateur' => $donateur,
            'initiales' => $initiales
        ]);
    }



public function showForm()
{
    // Affiche le formulaire de don
    return view('donateur.formdon', [
        'donateur' => Auth::guard('donateur')->user()
    ]);
}


  public function store(Request $request)
{
    $validated = $request->validate([
        'type' => 'required|in:Vêtements,Meubles,Nourriture,Autres',
        'titre' => 'required|string|max:100',
        'description' => 'nullable|string',
        'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'localisation' => 'required|string',
        'date' => 'required|date',
        'heure' => 'required'
    ]);

    // Traitement des images
    $photoPath = null;
    if ($request->hasFile('photos')) {
        // Si tu ne veux qu'une seule image
        $photo = $request->file('photos')[0];
        $photoPath = $photo->store('donations', 'public');
    }

    // Création du don
    Donation::create([
        'type' => $validated['type'],
        'titre' => $validated['titre'],
        'description' => $validated['description'],
        'image' => $photoPath,
        'localisation' => $validated['localisation'],
        'date_disponible' => $validated['date'],
        'heure_disponible' => $validated['heure'],
        'statut' => 'Disponible',
        'id_donateur' => Auth::guard('donateur')->id(),
    ]);

    return redirect()->route('donateur.profil')->with('success', 'Votre don a été publié avec succès.');
}

}
