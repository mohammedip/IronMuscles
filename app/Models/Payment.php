<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{

    protected $fillable = [
        'abonnement_id',
        'amount',
        'payment_method',
        'status',
        'created_at'
    ];


    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class, 'abonnement_id');
    }


    public function adherent()
    {
        return $this->belongsTo(Adherent::class, 'id_adherent');
    }

    public function created_at()
    {
        return date('d M Y', strtotime($this->created_at));
    }
}
