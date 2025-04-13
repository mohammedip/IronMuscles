<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntrainementJours extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_entrainement',
        'jour_numero',
        'exercices',
        'id_machine',
        'heure',
    ];

    public function entrainement()
    {
        return $this->belongsTo(Entrainement::class, 'id_entrainement');
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class, 'id_machine');
    }
}
