<?php

namespace App\Http\Controllers\Admin;

use App\Catalogue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogue.index', ['catalogues' => catalogue::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalogue.create');
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

        $catalogue = Catalogue::create($validatedData);

        return redirect()->route('catalogues.show', $catalogue)->with('storeCatalogue', "Catalogue has been added successfuly");;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function show(Catalogue $catalogue)
    {
        return view('admin.catalogue.show', ['catalogue' => $catalogue]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalogue $catalogue)
    {
        return view('admin.catalogue.edit', ['catalogue' => $catalogue]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalogue $catalogue)
    {
        $validatedData = $request->validate($this->validationRules());

        $catalogue->update($validatedData);
      
        return redirect()->route('catalogues.show', $catalogue)->with('updateCatalogue', "catalogue has been updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalogue $catalogue)
    {
        $catalogue->delete();
        return redirect()->route('catalogues.index')->with('deleteCatalogue', "catalogue has been deleted successfuly");
    }
    private function validationRules()
    {
        return [
           'name' => 'required',
            'description' => 'required',
            
        ];
    }
}
