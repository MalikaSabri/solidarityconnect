<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Besoin;
use App\Models\Interesse;
use App\Models\Association;
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

public function voirAssociationsInteressees($donationId)
{
    $donateur = Auth::guard('donateur')->user();
    $initiales = strtoupper(substr($donateur->prenom, 0, 1) . substr($donateur->nom, 0, 1));

    $donation = Donation::where('id', $donationId)
        ->where('id_donateur', $donateur->id)
        ->firstOrFail();

    $associations = Association::whereHas('interesses', function ($q) use ($donationId) {
        $q->where('id_donation', $donationId)->where('interesse', true);
    })->get();

    return view('donateur.accorderassociation', compact('donation', 'associations', 'donateur', 'initiales'));
}

public function accorderDon(Request $request)
{
    $request->validate([
        'donation_id' => 'required|exists:donations,id',
        'association_id' => 'required|exists:associations,id',
    ]);

    $donation = Donation::where('id', $request->donation_id)
        ->where('id_donateur', Auth::guard('donateur')->id())
        ->firstOrFail();

    // Enregistrer l'association choisie dans la table `donations`
    $donation->id_association = $request->association_id;
    $donation->save();

    return redirect()->route('don.historique')->with('success', 'Don accordé avec succès.');
}

    public function logout(Request $request)
    {
        Auth::guard('donateur')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
