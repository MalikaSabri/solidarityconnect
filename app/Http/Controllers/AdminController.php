<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Donation;
use App\Models\Besoin;
use App\Models\Association;
use App\Models\Donateur;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.connecteradmin');
    }

   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $admin = Admin::where('email', $credentials['email'])->first();

    if ($admin && \Hash::check($credentials['password'], $admin->mot_de_passe)) {
        Auth::guard('admin')->login($admin);
        $request->session()->regenerate();
        return redirect()->route('admin.profil');
    }

    return back()->withErrors([
        'email' => 'Les identifiants ne correspondent pas à nos enregistrements.',
    ])->onlyInput('email');
}

public function showProfil()
{
    if (!Auth::guard('admin')->check()) {
        return redirect()->route('admin.login');
    }

    $admin = Auth::guard('admin')->user();
    $initiales = $this->getInitiales($admin->nom_complet);

    // Statistiques
    $stats = [
        'donateursCount' => Donateur::count(),
        'associationsCount' => Association::count(),
        'donationsCount' => Donation::count(),
    ];

    // Activités récentes
    $activities = [];

    // Dons récents
    $donations = Donation::with('donateur')
        ->latest()
        ->take(3)
        ->get();

    foreach ($donations as $donation) {
        $activities[] = [
            'type' => 'donation',
            'user_name' => $donation->donateur->prenom . ' ' . $donation->donateur->nom,
            'details' => $donation->type,
            'date' => $donation->created_at->format('d/m/Y H:i'),
            'avatar' => strtoupper(substr($donation->donateur->prenom, 0, 1) .
                       strtoupper(substr($donation->donateur->nom, 0, 1)))
        ];
    }
      $pendingAssociations = Association::where('est_valide', false)
        ->latest()
        ->get()
        ->map(function ($association) {
            return [
                'id' => $association->id,
                'nom_complet' => $association->nom_complet,
                'adresse' => $association->adresse,
                'avatar' => strtoupper(substr($association->nom_complet, 0, 2)),
                'email' => $association->email,
                'telephone' => $association->telephone,
                'description' => $association->description,
                'date_inscription' => $association->created_at->format('d/m/Y')
            ];
        });

    // Besoins récents
    $besoins = Besoin::with('association')
        ->latest()
        ->take(3)
        ->get();

    foreach ($besoins as $besoin) {
        $activities[] = [
            'type' => 'besoin',
            'user_name' => $besoin->association->nom_complet,
            'details' => $besoin->titre,
            'date' => $besoin->created_at->format('d/m/Y H:i'),
            'avatar' => strtoupper(substr($besoin->association->nom_complet, 0, 2))
        ];
    }

    // Trier par date
    usort($activities, function($a, $b) {
        return strtotime(str_replace('/', '-', $b['date'])) - strtotime(str_replace('/', '-', $a['date']));
    });

    // Prendre les 5 plus récentes
    $activities = array_slice($activities, 0, 5);

    return view('admin.profiladmin', compact('admin', 'initiales', 'stats', 'activities', 'pendingAssociations'));
}

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    private function getInitiales($nomComplet)
    {
        $mots = explode(' ', $nomComplet);
        $initiales = '';

        foreach ($mots as $mot) {
            $initiales .= strtoupper(substr($mot, 0, 1));
            if (strlen($initiales) >= 2) break;
        }

        return $initiales;
    }
    public function getPendingAssociations()
{
    return Association::where('est_valide', false)
        ->latest()
        ->get()
        ->map(function ($association) {
            return [
                'id' => $association->id,
                'nom_complet' => $association->nom_complet,
                'adresse' => $association->adresse,
                'avatar' => strtoupper(substr($association->nom_complet, 0, 2)),
                'email' => $association->email,
                'telephone' => $association->telephone,
                'description' => $association->description,
                'date_inscription' => $association->created_at->format('d/m/Y')
            ];
        });
}
// Afficher les détails d'une association
public function showAssociationDetails($id)
{
    $association = Association::findOrFail($id);
    return view('admin.association_details', compact('association'));
}

// Supprimer une association
public function deleteAssociation($id)
{
    $association = Association::findOrFail($id);
    $association->delete();

    return response()->json(['success' => true]);
}

}
