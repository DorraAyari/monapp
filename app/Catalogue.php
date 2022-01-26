<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany('App\Produit');
    }
}
