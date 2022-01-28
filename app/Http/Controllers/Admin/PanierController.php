<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Panier;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.panier.index', ['paniers' => panier::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.panier.create');
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
     
        $panier =Panier::create($validatedData);

        return redirect()->route('paniers.show', $panier);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function show(Panier $panier)
    {
        return view('admin.panier.show', ['panier' => $panier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function edit(Panier $panier)
    {
        return view('admin.panier.edit', ['panier' => $panier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Panier $panier)
    {
        $validatedData = $request->validate($this->validationRules());

        $panier->update($validatedData);
               return redirect()->route('paniers.show', $panier)->with('updatePanier', "panier has been updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panier $panier)
    {
        $panier->delete();
        return redirect()->route('paniers.index')->with('deletePanier', "panier has been deleted successfuly");
    }
    private function validationRules()
    {
        return [
           'nbrArticle' => 'required',
            'totalPrix' => 'required',
                    
        ];
    }
}
