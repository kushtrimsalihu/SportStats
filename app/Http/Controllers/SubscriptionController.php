<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use Stripe;
use Session;
use Exception;

class SubscriptionController extends Controller
{
    public function index()
    {
        $key = env('STRIPE_SECRET');
        $stripe = new \Stripe\StripeClient($key);
        $plansraw = $stripe->plans->all();
        $plans = $plansraw->data;
       
        foreach($plans as $plan) {
           $prod = $stripe->products->retrieve(
               $plan->product,[]
           );
           $plan->product = $prod;
        }
        return view('subscription.index')->with('plans', $plans);
    }

    public function create($id)
    {
        return view('subscription.create')->with('price_id', $id);
    }

    public function orderPost(Request $request)
    {
            $user = auth()->user();
            $input = $request->all();
            $token =  $request->stripeToken;
            $paymentMethod = $request->paymentMethod;
            try {

                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                
                if (is_null($user->stripe_id)) {
                    $stripeCustomer = $user->createAsStripeCustomer();
                }

                \Stripe\Customer::createSource(
                    $user->stripe_id,
                    ['source' => $token]
                );

                $user->newSubscription('Premium',$input['plane'])
                    ->create($paymentMethod, [
                    'email' => $user->email,
                ]);

                return redirect()->route('frontend.user.subscription.index')->withFlashSuccess(__('Subscription is completed.'));
            } catch (Exception $e) {
                return back()->withFlashDanger(__($e->getMessage()));
            }
            
    }
}