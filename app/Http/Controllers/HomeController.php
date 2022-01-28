<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalogue;
use App\Produit;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function welcome()
    {
        $catalogue = Catalogue::get('name');
        $produits= Produit::inRandomOrder()->limit(6)->get();
        return view('welcome',[
            'catalogues'=> $catalogue, 
            'produits'=>$produits
        ]);
        
    }
}
