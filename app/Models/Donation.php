<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'titre',
        'description',
        'image',
        'localisation',
        'date_disponible',
        'heure_disponible',
        'statut',
        'id_donateur',
    ];

    public function donateur()
    {
        return $this->belongsTo(Donateur::class, 'id_donateur');
    }

    public function interesses()
    {
        return $this->hasMany(Interesse::class, 'id_donation');
    }

    public function donAttribues()
    {
        return $this->hasMany(DonAttribue::class, 'id_donation');
    }
}
