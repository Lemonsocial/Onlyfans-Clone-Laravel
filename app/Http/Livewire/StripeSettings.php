<?php

namespace App\Http\Livewire;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class StripeSettings extends Component
{
    public function connectStripe(){
    // Set your secret key. Remember to switch to your live secret key in production!
    // See your keys here: https://dashboard.stripe.com/account/apikeys
    try {
        \Stripe\Stripe::setApiKey('sk_test_51HeBFqFpN1D24Q2kH0Eyf5OS37FF3FSYEdQ5mDMeCL1OlcuwZ8x9bbBwEPYvHtv6qIIFpUF4ToHTGsRT8fi5TOZm00mFD9uK20');

        $account = \Stripe\Account::create([
        'type' => 'standard',
        ]);
        User::where('id',Auth::user()->id)->update(['stripe_account_id'=>$account->id]);
        $account_links = \Stripe\AccountLink::create([
            'account' => $account->id,
            'refresh_url' => 'http://172.17.193.149/user/profile',
            'return_url' => 'http://172.17.193.149/stripe_attached',
            'type' => 'account_onboarding',
        ]);
        // http://172.17.193.149/user/profile#connectStripe
        return Redirect::to($account_links->url);
    }
    catch(\Exception $e){
        \Log::info('Issue with stripe, keep this to protect the track trace from sharing your stripe key if there is any kind of failure');
    }
    }
    public function render()
    {
        return view('livewire.stripe-settings');
    }
}
