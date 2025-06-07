<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Besoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonController extends Controller
{
    public function create(Request $request)
    {
        $besoin_id = $request->input('besoin_id');
        $besoin = $besoin_id ? Besoin::find($besoin_id) : null;

        return view('donateur.formdon', [
            'donateur' => Auth::guard('donateur')->user(),
            'besoin' => $besoin
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:Vêtements,Meubles,Nourriture,Autres',
            'titre' => 'required|string|max:100',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'localisation' => 'required|string',
            'date_disponible' => 'required|date',
            'heure_disponible' => 'required',
            'besoin_id' => 'nullable|exists:besoins,id'
        ]);

        // Gestion de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('donations', 'public');
        }

        $donation = Donation::create([
            'type' => $validated['type'],
            'titre' => $validated['titre'],
            'description' => $validated['description'],
            'image' => $imagePath,
            'localisation' => $validated['localisation'],
            'date_disponible' => $validated['date_disponible'],
            'heure_disponible' => $validated['heure_disponible'],
            'statut' => 'Disponible',
            'id_donateur' => Auth::guard('donateur')->id(),
            'id_association' => $validated['besoin_id'] ? Besoin::find($validated['besoin_id'])->id_association : null,
            'date_creation' => now(),
        ]);

        return redirect()->route('donateur.profil')->with('success', 'Votre don a été publié avec succès !');
    }
}
