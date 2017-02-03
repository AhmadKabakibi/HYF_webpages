<?php
require_once 'Mollie/API/Autoloader.php';


if (isset($_POST['inputAmount']) && isset($_POST['inputPaymentMethod']) ) {

$amount=$_POST['inputAmount'];
$paymentMethod='';

if($_POST['inputPaymentMethod']=='ideal'){
        $paymentMethod='';
}else if($_POST['inputPaymentMethod']=='paypal'){
        $paymentMethod='';
}

/*
 * Initialize the Mollie API library with your API key.
 */

$mollie = new Mollie_API_Client;
$mollie->setApiKey('test_QxBkWKafgtMF6fGpE5BDgtkBMBJGiX');

    try
    {
      $issuers = $mollie->issuers->all();

        $payment = $mollie->payments->create(
                     array(
                     'amount' => 10.00,
                     'description' => 'My first API payment',
                     'redirectUrl' => 'https://webshop.example.org/order/12345/',
                     'metadata' => array(
                     'order_id' => '12345')
                     )
        );

        $payment = $mollie->payments->get($payment->id);

        if ($payment->isPaid())
        {
                echo "Payment received.";
        }

         /*
         * In this example we store the order with its payment status in a database.
         */
        database_write($order_id, $payment->status);
        /*
        * Send the customer off to complete the payment.
        */
        header("Location: " . $payment->getPaymentUrl());
        exit;
    }
    catch (Mollie_API_Exception $e)
    {
     echo "API call failed: " . htmlspecialchars($e->getMessage()) . " on field " + htmlspecialchars($e->getField());
    }


        function database_write ($order_id, $status)
        {
            $order_id = intval($order_id);
            $database = dirname(__FILE__) . "/orders/order-{$order_id}.txt";

            file_put_contents($database, $status);
        }

}else {
     $data = array('success' => false, 'message' => 'Please fill out the form completely.');
     echo json_encode($data);
 }

?>