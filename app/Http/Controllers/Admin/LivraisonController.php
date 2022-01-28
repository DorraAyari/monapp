<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Livraison;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.livraison.index', ['livraisons' => Livraison::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.livraison.create');
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

        $livraison = Livraison::create($validatedData);

        return redirect()->route('livraisons.show', $livraison)->with('storeLivraison', "livraison has been added successfuly");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function show(Livraison $livraison)
    {
        return view('admin.livraison.show', ['livraison' => $livraison]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function edit(Livraison $livraison)
    {
        return view('admin.livraison.edit', ['livraison' => $livraison]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livraison $livraison)
    {
        $validatedData = $request->validate($this->validationRules());

        $livraison->update($validatedData);
      
        return redirect()->route('livraisons.show', $livraison)->with('updateLivraison', "livraison has been updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livraison $livraison)
    {
        $livraison->delete();
        return redirect()->route('livraisons.index')->with('deleteLivraison', "livraison has been deleted successfuly");
    }
    private function validationRules()
    {
        return [
           'date_livraison' => 'required',
            'description' => 'required'
            
        ];
    }
}
