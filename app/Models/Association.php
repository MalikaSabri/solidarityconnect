<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Association extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nom_complet',
        'email',
        'mot_de_passe',
        'telephone',
        'adresse',
        'description',
        'date_inscription',
        'est_valide'
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    // Nécessaire car le champ mot de passe n'a pas le nom conventionnel 'password'
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
    // Dans app/Models/Association.php
public function getInitialsAttribute()
{
    $words = explode(' ', $this->nom_complet);
    $initials = '';

    foreach ($words as $word) {
        $initials .= strtoupper(substr($word, 0, 1));
        if (strlen($initials) >= 2) break; // On ne prend que 2 lettres max
    }

    return $initials;
}
// Dans app/Models/Association.php
public function getColorAttribute()
{
    // Génère une couleur basée sur le nom pour avoir une couleur constante
    $hash = md5($this->nom_complet);
    return sprintf("#%s", substr($hash, 0, 6));
}
}
