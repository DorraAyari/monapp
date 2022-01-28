@extends('layouts.app')
@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>
@endsection
@section('content')
<div class="container">
    <br>
    <li class="d-flex justify-content-between py-3 border-bottom"><h5>Total Payment €{{ Cart::total() }}</h5>
    <br>
    <br>
    <div class="col-md-12">
  <h3 class="btn  btn-block mt-3">Procéder au paiement</h3>
  <div class="col-md-6 my-3 mx-auto">
      <form action="{{ route('check.store') }}" method="POST" id="payment-form">
          @csrf
          <div id="card-element">
          </div>
          <div id="card-errors" role="alert"></div>
          <a href="/merci" class="btn btn-success btn-block mt-3" >Soumettre le paiement</a>
      </form>
    </div>
</div>
<style>
    .h3{
        text-align: :center;
    }
</style>
@endsection

@section('extra-js')
<script>
var stripe = Stripe('pk_test_LI2JPcWlrGhmjPeXnppRdMxu00J9G81wVp');
var elements = stripe.elements();
    // Set up Stripe.js and Elements to use in checkout form
var style = {
  base: {
    color: "#32325d",
  }
};
var card = elements.create("card", { style: style });
    card.mount("#card-element");
    card.addEventListener('change', ({error}) => {
    const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.classList.add('alert', 'alert-warning', 'mt-3');
            displayError.textContent = error.message;
        } else {
            displayError.classList.remove('alert', 'alert-warning', 'mt-3');
            displayError.textContent = '';
        }
    });
    var submitButton = document.getElementById('submit');
submitButton.addEventListener('click', function(ev) {
    ev.preventDefault();
    submitButton.disabled = true;
    stripe.confirmCardPayment("{{ $clientSecret }}", {
        payment_method: {
            card: card
        }
        }).then(function(result) {
            if (result.error) {
                submitButton.disabled =false;
            console.log(result.error.message);
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                
                     redirect = '/merci';
                    
                }
            }
        });
      });
</script>
@endsection