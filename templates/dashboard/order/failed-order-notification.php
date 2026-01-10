<?php
/**
 * This file will have following variables available in the scope where its being included right now
 * @var string $order_id   Order ID (e.g. pending_xxx)
 */

$refund_order_detail = HLD_UserSubscriptions::get_refund_subscription_notification($order_id);
error_log(print_r($refund_order_detail, true));

$title = 'Issue Processing Your Order';

$msg = sprintf(
    'Dear customer, our system detected an attempt to purchase <strong>%s</strong>. 
    Your subscription started on <strong>%s</strong>; however, we were unable to complete the order due to a technical issue.
    <br><br>
    You can visit your <strong>Subscriptions</strong> section to review your plan and request a refund if needed.
    We sincerely apologize for the inconvenience. If you need further assistance, please contact our support team.',
    esc_html($refund_order_detail['medication_name']),
    esc_html($refund_order_detail['subscription_start_human'])
);
hld_action_item(
    $title,
    $msg,
    '',
    '',
    false
);
