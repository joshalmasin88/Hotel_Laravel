<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Stripe;
use Session;

class PaymentController extends Controller
{

    public function index()
    {
        return view('payments.payment');
    }
  
    public function makePayment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => (floor(session('price')* 100) * session('stay_days')),
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Make payment." 
        ]);
  
        
          
        return redirect('/')->with('success', 'Payment successfully made.');
    }
}