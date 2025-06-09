<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interesse extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_association',
        'id_donation',
        'interesse',
    ];
    public $timestamps = false;


    public function association()
    {
        return $this->belongsTo(Association::class, 'id_association');
    }

    public function donation()
    {
        return $this->belongsTo(Donation::class, 'id_donation');
    }
}
