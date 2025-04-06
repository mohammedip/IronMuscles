<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrainement extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_adherent',
        'id_coach',
        'date_debut',
        'date_fin',
    ];

    public function adherent()
    {
        return $this->belongsTo(Adherent::class, 'id_adherent');
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class, 'id_coach');
    }

    public function jours()
    {
        return $this->hasMany(EntrainementJours::class, 'id_entrainement');
    }

    public function date_debut()
    {
        return date('d M Y', strtotime($this->date_debut));
    }
}
