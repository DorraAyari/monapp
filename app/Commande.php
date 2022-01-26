<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $attributes = [
        'panier_id' => true,
    ];
    protected $guarded = [];
    public function Panier()
    {
        return $this->belongsTo('App\Panier');
    }
    public function Livraison()
    {
        return $this->hasMany('App\Livraison');
    }
    public function Paiement()
    {
        return $this->hasOne('App\Paiement');
    }
}
