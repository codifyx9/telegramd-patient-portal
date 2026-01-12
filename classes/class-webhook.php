<?php

use Stripe\Webhook;
use Stripe\Stripe;

class HLD_Webhook
{
    public function __construct()
    {
        // Ensure Stripe SDK is loaded
        if (!class_exists('\Stripe\Stripe')) {
            require_once HLD_PLUGIN_PATH . 'vendor/autoload.php';
        }

        Stripe::setApiKey(STRIPE_SECRET_KEY);

        add_action('rest_api_init', [$this, 'register_routes']);
    }


    public function register_routes()
    {

        register_rest_route(
            'hld/v1',
            '/stripe-webhook',
            [
                'methods'             => 'POST',
                'callback'            => [$this, 'handle_stripe_webhook'],
                'permission_callback' => '__return_true',
            ]
        );
    }


    /* -------------------------------------------------
     * STRIPE WEBHOOK HANDLER
     * ------------------------------------------------- */
    public function handle_stripe_webhook(WP_REST_Request $request)
    {
        error_log('[Stripe] Incoming webhook');
        $payload = $request->get_body();
        $sig     = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
        $secret  = STRIPE_WEBHOOK_SECRET; // store in wp-config.php

        if (empty($payload) || empty($sig)) {
            return new WP_REST_Response(['error' => 'Missing payload or signature'], 400);
        }

        try {
            $event = Webhook::constructEvent($payload, $sig, $secret);
        } catch (\UnexpectedValueException $e) {
            return new WP_REST_Response(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return new WP_REST_Response(['error' => 'Invalid signature'], 400);
        }

        $this->process_stripe_event($event);

        return new WP_REST_Response(['status' => 'ok'], 200);
    }

    private function process_stripe_event($event)
    {
        $type   = $event->type ?? '';
        $object = $event->data->object ?? null;

        if (!$type || !$object) {
            return;
        }

        switch ($type) {

            /* 🔹 Subscription lifecycle */
            case 'customer.subscription.created':
                $this->subscription_created($object);
                break;

            case 'customer.subscription.updated':
                $this->subscription_updated($object);
                break;

            case 'customer.subscription.deleted':
                $this->subscription_deleted($object);
                break;

            /* 🔹 RENEWALS (MOST IMPORTANT) */
            case 'invoice.payment_succeeded':
                $this->invoice_payment_succeeded($object);
                break;

            case 'invoice.payment_failed':
                $this->invoice_payment_failed($object);
                break;

            /* 🔹 Card updates */
            case 'customer.source.updated':
            case 'payment_method.attached':
                $this->payment_method_updated($object);
                break;

            default:
                error_log('[Stripe] Unhandled event: ' . $type);
        }
    }

    /* -------------------------------------------------
     * HANDLERS
     * ------------------------------------------------- */

    private function subscription_created($subscription)
    {
        error_log('[Stripe] Subscription Created: ' . $subscription->id);
        error_log((print_r($subscription, true)));
    }

    private function subscription_updated($subscription)
    {
        error_log('[Stripe] Subscription Updated: ' . $subscription->id);
        error_log('Status: ' . $subscription->status);
        error_log((print_r($subscription, true)));
    }

    private function subscription_deleted($subscription)
    {
        error_log('[Stripe] Subscription Cancelled: ' . $subscription->id);
    }

    /**
     * ✅ THIS IS A RENEWAL PAYMENT
     */
    private function invoice_payment_succeeded($invoice)
    {
        if ($invoice->billing_reason !== 'subscription_cycle') {
            return; // ignore first invoice
        }

        $subscription_id = $invoice->subscription;
        $amount_paid     = $invoice->amount_paid / 100;
        $currency        = strtoupper($invoice->currency);

        error_log('[Stripe] Subscription Renewed: ' . $subscription_id);
        error_log("Amount: {$amount_paid} {$currency}");

        // ✅ Update your DB
        // ✅ Extend subscription period
        // ✅ Trigger affiliate commission if needed
    }

    /**
     * ❌ CARD DECLINED / PAYMENT FAILED
     */
    private function invoice_payment_failed($invoice)
    {
        $subscription_id = $invoice->subscription;
        $attempt_count   = $invoice->attempt_count;

        error_log('[Stripe] Payment Failed for subscription: ' . $subscription_id);
        error_log('Retry attempt: ' . $attempt_count);

        // ✅ Mark subscription as past_due
        // ✅ Notify user
        // ✅ Pause service access
    }

    private function payment_method_updated($object)
    {
        error_log('[Stripe] Payment method updated');
    }
}
new HLD_Webhook();
