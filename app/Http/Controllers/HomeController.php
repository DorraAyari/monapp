<?php

namespace App\Http\Controllers;

use App\Catalogue;
use App\Category;
use App\Product;
use App\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth')->except('welcome');
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
        $categories = Catalogue::get('name');
        $products = Produit::inRandomOrder()->limit(6)->get();
        return view('welcome', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
