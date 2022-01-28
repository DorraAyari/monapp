<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{



        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $attributes = [
        'catalogue_id' => true,
    ];
  protected $guarded = [];  
    public function catalogue()
    {
        return $this->belongsTo('App\Catalogue');
    }
    public function panier()
    {
        return $this->hasMany('App\Panier');
    }
    public function getPrice()
    {
        $price = $this->price / 100;

        return number_format($price, 2, ',', ' ') . ' €';
    }
}
