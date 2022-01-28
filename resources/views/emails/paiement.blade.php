@component('mail::message')
# DSI2-ISET Bizerte

Dear **{{ $paiement->numero_montant}}**

We are happy to announce that your payment is received.<br>
These are the informations that we registred for you payment, can you please check and tell us if there is any mistake:
- **Phone**: {{ $paiement->montant}}
- **date paiement**: {{ $paiement->date_paiement }}
- **date d'expiration**: {{ $paiement->date_expiration }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
