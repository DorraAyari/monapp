<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Mail\NewProduit;
use Illuminate\Support\Facades\Mail;











class ProduitAjoutController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $validatedData = $request->validate($this->validationRules());

        $produit = Produit::create($validatedData);
        Mail::to($produit->email)->send(new NewProduit($produit));
        return redirect()->route('welcome', $produit)->with('storeProduit', "Produit has been added successfuly");
   
    }


    private function validationRules()
    {
        return [
           'produits_nom' => 'required|min:2',
            'pics' => 'required',
            'price' => 'required|min:11|numeric',
            'produits_description' => 'required',
            'email' => 'required|email'
        
        ];
    }






}
