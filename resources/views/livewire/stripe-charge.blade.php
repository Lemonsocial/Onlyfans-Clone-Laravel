<div>
    <head>
        <title>Checkout</title>
        
      </head>
    {{-- The Master doesn't talk, he acts. --}}

<form id="payment-form">
    <div id="card-element">
        <!-- Elements will create input elements here -->
    </div>
    
    <!-- We'll put the error messages in this element -->
    <div id="card-errors" role="alert"></div>
    
    <button id="submit">Pay</button>
    </form>
</div>
@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
var form = document.getElementById('payment-form');

form.addEventListener('submit', function(ev) {
  ev.preventDefault();
  stripe.confirmCardPayment(clientSecret, {
    payment_method: {
      card: card,
      billing_details: {
        name: 'Jenny Rosen'
      }
    }
  }).then(function(result) {
    if (result.error) {
      // Show error to your customer (e.g., insufficient funds)
      console.log(result.error.message);
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        // Show a success message to your customer
        // There's a risk of the customer closing the window before callback
        // execution. Set up a webhook or plugin to listen for the
        // payment_intent.succeeded event that handles any business critical
        // post-payment actions.
      }
    }
  });
});
</script>
@endpush