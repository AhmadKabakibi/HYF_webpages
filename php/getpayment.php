$payment_id = 'tr_WDqYK6vllg';
$payment = $mollie->payments->get($payment_id);
/*
 * The order ID saved in the payment can be used to load the order and update it's status
 */
$order_id = $payment->metadata->order_id;
if ($payment->isPaid())
{
 /*
 * At this point you'd probably want to start the process of delivering the product to the customer.
 */
}
elseif (! $payment->isOpen())
{
 /*
 * The payment isn't paid and isn't open anymore. We can assume it was aborted.
 */
}