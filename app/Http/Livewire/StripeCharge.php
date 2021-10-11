<?php

namespace App\Http\Livewire;

use Livewire\Component;


class StripeCharge extends Component
{
    public $recipient_account_id;
    public $amount_usd_pennies;
    public function chargeStripe()
    {
        \Stripe\Stripe::setApiKey('sk_test_51HeBFqFpN1D24Q2kH0Eyf5OS37FF3FSYEdQ5mDMeCL1OlcuwZ8x9bbBwEPYvHtv6qIIFpUF4ToHTGsRT8fi5TOZm00mFD9uK20');

            $payment_intent = \Stripe\PaymentIntent::create([
            'payment_method_types' => ['card'],
            'amount' => $this->amount_usd_pennies,
            'currency' => 'usd',
            'application_fee_amount' => 0,
            'transfer_data' => [
                'destination' => $this->recipient_account_id,
            ],
            ]);
    }
    
    public function render()
    {
        return view('livewire.stripe-charge');
    }
}
