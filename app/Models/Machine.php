<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $table= 'machines';

    protected $fillable = [
        'name',
        'type_machine',
        'statut',
    ];

    public function entrenementJours()
    {
        return $this->hasMany(EntrainementJours::class);
    }
}
