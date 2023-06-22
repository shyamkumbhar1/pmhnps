<?php

namespace App\Http\Controllers;

use auth;
use Exception;
use Stripe\Plan;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\Plan as ModelsPlan;

class SubscriptionController extends Controller
{
    public function singleChargeGet(Request $request)
    {

        $user = auth()->user();
        return view('strip.single-charge',[

        'intent' => $user->createSetupIntent(),
        ]
    );

    }
    public function singleCharge(Request $request)
    {

        $ammount = $request->ammount;
        $ammount = $ammount * 100 ;
        $paymentMethod = $request->payment_method;

        $user = auth()->user();
        $user->createOrGetStripeCustomer();
       $paymentMethod = $user->addPaymentMethod($paymentMethod);

        $user->charge($ammount,$paymentMethod->id);

        return  to_route('thankyou');

    }

    public function showPlanForm()


    {
        return view('strip.plans.create');
    }
    public function savePlan(Request $request)
    {
        // return $request->all();
        Stripe::setApiKey(env('STRIPE_SECRET'));
        // Stripe::setApiKey(config('services.strip.secret'));
        $amount = ($request->amount * 100);
        // dd($amount);
        try {
            $plan = Plan::create([
                'amount' => $amount,
                'currency' => $request->currency,
                'interval' => $request->billing_period,
                'interval_count' => $request->interval_count,
                'product' => [
                    'name' => $request->name
                ]
            ]);

            // dd($plan->amount);
            ModelsPlan::create([
                'plan_id' => $plan->id,
                'name' => $request->name,
                'amount' => $plan->amount,
                'billing_methode' => $plan->interval,
                'currency' => $plan->currency,
                'interval_count' => $plan->interval_count,

            ]);
        } catch (Exception $th) {
            dd($th->getMessage());
        }
        return "Success";
    }
    public function allPlan()
    {
        $basic = ModelsPlan::where('name', 'basic')->first();
        // dd($basic);
        $professional = ModelsPlan::where('name', 'professional')->first();
        $enterprise = ModelsPlan::where('name', 'enterprise')->first();
        return view('strip.plans', compact('basic', 'professional', 'enterprise'));
    }

    public function checkout($planId)
    {
        // dd( auth()->user());
        $user = auth()->user();
        $intent = $user->createSetupIntent();
        $plan = ModelsPlan::where('plan_id', $planId)->first();
        if (!$plan) {
            return back()->withErrors(
                [
                    'message' => 'Plan Is Not Available'
                ]
            );
        }
        // dd($intent);
        return view('strip.plans.checkout', compact('plan', 'intent'));
    }

    public function processSubcription(Request $request)
    {

        $user = auth()->user();
        $user->createOrGetStripeCustomer();
        $paymentMethod = null;
        $paymentMethod = $request->payment_method;



        if ($paymentMethod != null) {
            $paymentMethod = $user->addPaymentMethod($paymentMethod);
        }

        $plan = $request->plan_id;

        // Subcription
        try {
            $user->newSubscription(
                'default',
                $plan
            )->create($paymentMethod != null ? $paymentMethod->id : '');
        } catch (Exception $th) {
            return back()->withErrors([
                'error' => 'unable to create subscription due to this issue ' . $th->getMessage()
            ]);
        }

        $request->session()->flash('alert-success', 'You are subscribed Successfully');

        return to_route('thankyou', $plan)->withMessage('message');
    }
    public function allSubcription (){
        // $subscriptions = auth()->user()->subscriptions;
        $subscriptions = Subscription::where('user_id',auth()->id())->get();
// dd($subscriptions);
// $subscription->plan->name

        // dd($subscriptions);
        return view('strip.subscrition.index',compact('subscriptions'));
    }
    public function cancleSubcription (Request $request){
        // return $request->all();
        $subscriptionName = $request->subscriptionName;
        if ($subscriptionName) {
            $user = auth()->user();
            $user->subscription($subscriptionName)->cancel();
            return "Subscription Cancle Sucefully";
        }
    }    public function resumeSubcription (Request $request){
        // return $request->all();
        $subscriptionName = $request->subscriptionName;
        if ($subscriptionName) {
            $user = auth()->user();
            $user->subscription($subscriptionName)->resume();
            return "Subscription Resume Sucefully";
        }
    }
}
