@component('mail::message')
# DSI2-ISET Bizerte

Dear **{{ $client->nom.' '.$client->prenom}}**

We are happy to announce that your account has been created.<br>
These are the informations that we registred for you, can you please check and tell us if there is any mistake:
- **Phone**: {{$client->telephone}}
- **Email**: {{ $client->email }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
