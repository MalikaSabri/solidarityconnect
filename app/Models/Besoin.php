<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Besoin extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'status',
        'id_association',
    ];

    public function association()
    {
        return $this->belongsTo(Association::class, 'id_association');
    }

    public function donAttribues()
    {
        return $this->hasMany(DonAttribue::class, 'id_besoin');
    }
    public function donateur()
{
    return $this->belongsTo(Donateur::class, 'id_donateur');
}

}
