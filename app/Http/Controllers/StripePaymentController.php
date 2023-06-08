<?php

namespace App\Http\Controllers;
require_once 'vendor/autoload.php';
use Session;
// use Stripe\Charge;
// use Stripe\Charge;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{

    public function stripe()
    {
        return view('stripe');
    }


    public function stripePost(Request $request)
    {
        // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe::setApiKey('your_stripe_secret_key');

        Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from LaravelTus.com."
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
