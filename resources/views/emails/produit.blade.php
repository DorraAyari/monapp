@component('mail::message')
# DSI2-ISET Bizerte

Dear **{{ $produit->nom}}**

We are happy to announce that your product has been added .<br>
These are the informations that we registred for you, can you please check and tell us if there is any mistake:
- **Description produit**: {{ $produit->produits_description}}
- **price**: {{ $produit->price }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
