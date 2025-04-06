<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_Abonnement',
        'date_Debut',
        'date_Fin',
        'prix',
        'id_adherent',
    ];


    public function adherent()
    {
        return $this->belongsTo(Adherent::class, 'id_adherent');
    }


    public function payments()
    {
        return $this->hasMany(Payment::class, 'abonnement_id');
    }


    public function isActive()
    {
        return now()->between($this->date_Debut, $this->date_Fin);
    }


    public function getFormattedStartDate()
    {
        return date('d M Y', strtotime($this->date_Debut));
    }

    public function getFormattedEndDate()
    {
        return date('d M Y', strtotime($this->date_Fin));
    }
}
