<?php
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
        Route::resource('commandes', 'Admin\CommandeController');  
