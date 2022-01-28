@component('mail::message')
# DSI2-ISET Bizerte

Dear **{{ $commande->date_commande.' '.$commande->num_commande}}**

We are happy to announce that the commande is well placed.<br>
These are the informations that we registred for you commande, can you please check and tell us if there is any mistake:
- **Prix**: {{ $commande->prix_commande}}
- **Description**: {{ $commande->description_commande }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
