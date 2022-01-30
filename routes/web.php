<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
    // admin middleware route group

        Route::get('/admin-dashboard', function () {
            return view('admin.dashboard');
        })->middleware('admin')->name('admin.dashboard');    
        Route::resource('clients', 'Admin\ClientController');
        Route::resource('produits', 'Admin\ProduitController');
        Route::resource('catalogues', 'Admin\CatalogueController');  
        Route::resource('livraisons', 'Admin\LivraisonController');
        Route::resource('commandes', 'Admin\CommandeController');
        Route::resource('paiements', 'Admin\PaiementController');
        Route::resource('paniers', 'Admin\PanierController');  
        Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');
        Route::get('/panier', 'CartController@index')->name('cart.index');
        Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy');
        Route::post('/coupon', 'CartController@storeCoupon')->name('cart.store.coupon');
    Route::delete('/coupon', 'CartController@destroyCoupon')->name('cart.destroy.coupon');

        Route::get('/paiement', 'CheckController@index')->name('check.index');
        Route::post('/paiement', 'CheckController@store')->name('check.store');
        Route::get('/merci', 'CheckController@thankyou')->name('check.thankyou');
 