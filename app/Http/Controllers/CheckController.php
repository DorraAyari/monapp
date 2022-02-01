<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Commande;
use App\Produit;
use DateTime;
class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if (Cart::count() <= 0) {
        return redirect()->route('produit.index');
    }

    Stripe::setApiKey('sk_test_3WteeitM6Wi4AK3SdJzBrm7300qGrAamxX');

        $intent = PaymentIntent::create([
            'amount' => round(Cart::total()),
            'currency' => 'eur'
        ]);

        return view('check.index', [
            'clientSecret' => Arr::get($intent, 'clientSecret')
        ]);
    }

    /**********
     * Charge the client.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cart::destroy();

        $data = $request->json()->all();

        return $data['paymentIntent'];
    }
}