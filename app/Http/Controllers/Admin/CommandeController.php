<?php

namespace App\Http\Controllers\Admin;

use App\Commande;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use App\Mail\NewCommande;
use Illuminate\Support\Facades\Mail;
class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.commande.index', ['commandes' => Commande::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.commande.create');
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

        $commande= Commande::create($validatedData);
        Mail::to($commande->email)->send(new NewCommande($commande));
        return redirect()->route('commandes.show', $commande)->with('storeCommande', "Commande has been added successfuly");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        return view('admin.commande.show', ['commande' => $commande]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        return view('admin.commande.edit', ['commande' => $commande]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        $validatedData = $request->validate($this->validationRules());

        $commande->update($validatedData);
        return redirect()->route('commandes.show', $commande)->with('updateCommande', "commande has been updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();
        return redirect()->route('commandes.index')->with('deleteCommande', "commande has been deleted successfuly");
    }
    private function validationRules()
    {
        return [
           'date_commande' => 'required|date_format:Y-m-d',
            'num_commande' => 'required|min:11|numeric',
            'prix_commande' => 'required',
            'amount' => 'required',
            'products' => 'required',
            'email' => 'required',
            'description_commande' => 'required',
        ];
    }
}
