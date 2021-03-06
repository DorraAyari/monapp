@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach (Auth()->user()->commandes as $commande)
                        <div class="card mb-3">
                            <div class="card-header">
                                Commande passée le {{ Carbon\Carbon::parse($commande->date_commande)->format('d/m/Y à H:i')}} d'un montant de <strong>{{ getPrice($date_commande->amount) }}</strong>
                            </div>
                            <div class="card-body">
                                <h6>Liste des produits</h6>
                                @foreach (unserialize($date_commande->produits) as $produit)
                                    <div>Nom du produit: {{ $produit[0] }}</div>
                                    <div>Prix: {{ getPrice($produit[1]) }}</div>
                                    <div>Quantité: {{ $produit[2] }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

