<?php
require 'src/coinPayments/coinPayments.class.php';
$cp = new \MineSQL\coinPayments();

$cp->setMerchantId('675eb0ccfa69fd942a2f1dcf6c20dd21');
$cp->setSecretKey('fdjhsdjkf3343jhfusdh3434');

$productName = "A Test Product";
$currency    = "usd";
$price       = 15.00;
// This should be a unique identifier to differentiate payments in your database
// so you can use it in your IPN to verify that price and currency are the same (more on this later)
$passthruVar = 'asd234sdf';
// The callback url that coinpayments will send a request to so you can validate the payment
$callbackUrl = 'http://localhost/coinPaymentsCallback.php';

$button = $cp->createPayment($productName, $currency, $price, $passthruVar, $callbackUrl);

echo $button;

?>




