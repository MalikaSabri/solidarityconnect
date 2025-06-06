<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonAttribue extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_besoin',
        'id_donation',
    ];

    public function besoin()
    {
        return $this->belongsTo(Besoin::class, 'id_besoin');
    }

    public function donation()
    {
        return $this->belongsTo(Donation::class, 'id_donation');
    }
}
