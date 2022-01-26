<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];
    
    public function panier()
    {
        return $this->hasOne('App\Panier');
    }
 
}
