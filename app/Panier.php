<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $attributes = [
        'client_id' => true,
        'produit_id' => true,
        
    ];

    protected $guarded = [];   
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    public function commande()
    {
        return $this->hasOne('App\Commande');
    }
    public function produit()
    {
        return $this->belongsTo('App\Produit');
    }
}
