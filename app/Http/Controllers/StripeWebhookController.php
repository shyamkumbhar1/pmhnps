<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Webhook;
// use Symfony\Component\HttpFoundation\Response;


class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, config('services.stripe.webhook_secret'));
        } catch (\Exception $e) {
            return response('Webhook signature verification failed', 400);
        }

        // Process the event
        $this->handleStripeEvent($event);

        return response('Webhook received', 200);
    }

    private function handleStripeEvent($event)
    {
        // Process the Stripe event based on its type
        switch ($event->type) {
            case 'payment_intent.succeeded':
                // Handle successful payment intent
                break;
            case 'payment_intent.failed':
                // Handle failed payment intent
                break;
            // Add more cases for other event types as needed
        }
    }
}
