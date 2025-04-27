<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Speciality extends Model
{
    protected $table = 'specialities';
    
    protected $fillable = ['name'];

    /**
     * Get the coaches associated with this speciality.
     */
    public function coaches()
    {
        return $this->hasMany(User::class);
    }
}