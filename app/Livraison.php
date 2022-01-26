<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $attributes = [
        'commande_id' => true,
    ];
    protected $guarded = [];
    public function Commande()
    {
        return $this->belongsTo('App\Commande');
    }
}
