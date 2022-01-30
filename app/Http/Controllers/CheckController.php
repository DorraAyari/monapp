<?php

namespace App\Http\Controllers;

use App\Commande;
use DateTime;
use App\Produit;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::count() <= 0) {
            return redirect()->route('check.index');
        }

        Stripe::setApiKey('sk_test_lsIwI7kLHVgpDTyumYN5DTBO008UcOzAdz');

        if (request()->session()->has('coupon')) {
            $total = (Cart::subtotal() - request()->session()->get('coupon')['remise']) + (Cart::subtotal() - request()->session()->get('coupon')['remise']) * (config('cart.tax') / 100);
        } else {
            $total = Cart::total();
        }

        $intent = PaymentIntent::create([
            'amount' => round($total),
            'currency' => 'eur'
        ]);

        $clientSecret = Arr::get($intent, 'client_secret');

        return view('check.index', [
            'clientSecret' => $clientSecret,
            'total' => $total
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->checkIfNotAvailable()) {
            Session::flash('error', 'Un produit dans votre panier n\'est plus disponible.');
            return response()->json(['success' => false], 400);
        }

        $data = $request->json()->all();

        $commande = new Commande();

        $commande->panier_id = $data['paymentIntent']['id'];
        $commande->amount = $data['paymentIntent']['amount'];

        $commande->date_commande = (new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');

        $products = [];
        $i = 0;

        foreach (Cart::content() as $produit) {
            $products['produit_' . $i][] = $produit->model->produits_nom;
            $products['produit_' . $i][] = $produit->model->price;
            $products['produit_' . $i][] = $produit->qty;
            $i++;
        }

        $commande->products = serialize($products);
        $commande->id = Auth()->user()->id;
        $commande->save();

        if ($data['paymentIntent']['status'] === 'succeeded') {
            $this->updateStock();
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
        }
    }

    public function thankyou()
    {
        return Session::has('success') ? view('check.thankYou') : redirect()->route('check.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function checkIfNotAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Produit::find($item->model->id);

            if ($product->stock < $item->qty) {
                return true;
            }
        }

        return false;
    }

    private function updateStock()
    {
        foreach (Cart::content() as $item) {
            $product = Produit::find($item->model->id);
            $product->update(['stock' => $product->stock - $item->qty]);
        }
    }
}
