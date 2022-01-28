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
        $data = $request->json()->all();

        $commande = new Commande();

        $commande->id = $data['paymentIntent']['id'];
        $commande->amount = $data['paymentIntent']['amount'];

        $commande->date_commande = (new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');

        $products = [];
        $i = 0;

        foreach (Cart::content() as $produit) {
            $produits['produit' . $i][] = $produit->model->produits_nom;
            $produits['produit' . $i][] = $produit->model->price;
    
            $i++;
        }

        $commande->produits = serialize($produits);
        $commande->num_commande = 15;
        $commande->save();

        if ($data['paymentIntent']['status'] === 'succeeded') {
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
        }
    }

    public function thankyou()
    {
        return view('check.thankyou');
     //   return Session::has('success') ? view('check.thankyou') : redirect()->route('check.thankyou');
    }
}