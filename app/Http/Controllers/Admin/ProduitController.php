<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Produit;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Mail\NewProduit;
use Illuminate\Support\Facades\Mail;
class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('admin.produit.index', ['produits' => Produit::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produit.create');
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
        return redirect()->route('produits.show', $produit)->with('storeProduit', "Produit has been added successfuly");
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        return view('admin.produit.show', ['produit' => $produit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        return view('admin.produit.edit', ['produit' => $produit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        $validatedData = $request->validate($this->validationRules());

        $produit->update($validatedData);
  
        return redirect()->route('produits.show', $produit)->with('updateProduit', "Produit has been updated successfuly");
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')->with('deleteProduit', "Produit has been deleted successfuly");
   
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
