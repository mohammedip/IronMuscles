<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adherent extends Model
{
    use SoftDeletes;

    protected $table = 'adherents';

    protected $fillable = [
        'date_naissance',
        'name',
        'adresse',
        'numero_telephone',
        'email',
        'is_activate',
    ];

    protected $dates = ['deleted_at'];

}
