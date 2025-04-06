<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $table = 'coaches';

    protected $fillable = [
        'name',
        'id_specialite',
        'numero_telephone',
        'email',
        'date_recrutement',
    ];

    public function speciality(){

        return $this->belongsTo(Speciality::class, 'id_specialite');
    }
}
