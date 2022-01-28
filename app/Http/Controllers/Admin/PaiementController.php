<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Paiement;
use Illuminate\Http\Request;
use App\Mail\NewPaiement;
use Illuminate\Support\Facades\Mail;
class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.paiement.index', ['paiements' => Paiement::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paiement.create');
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

        $paiement = Paiement::create($validatedData);
        Mail::to($paiement->email)->send(new NewPaiement($paiement));
        return redirect()->route('paiements.show', $paiement);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show(Paiement $paiement)
    {
        return view('admin.paiement.show', ['paiement' => $paiement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function edit(Paiement $paiement)
    {
        return view('admin.paiement.edit', ['paiement' => $paiement]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paiement $paiement)
    {
        $validatedData = $request->validate($this->validationRules());

        $paiement->update($validatedData);
               return redirect()->route('paiements.show', $paiement)->with('updatePaiement', "Paiement has been updated successfuly");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paiement $paiement)
    {
        $paiement->delete();
        return redirect()->route('paiements.index')->with('deletePaiement', "Paiement has been deleted successfuly");
    }
    private function validationRules()
    {
        return [
           'numero_montant' => 'required',
            'montant' => 'required',
                    'date_paiement' => 'required',
            'date_expiration' => 'required',
            'email' => 'required|email',
        ];
    }
}
