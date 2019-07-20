<?php

require 'opp.php';
//require './src/coinPayments/coinPayments.class.php';
$cp = new opp();
$passthruVar = $_POST['custom'];
//var_dump($passthruVar);die;
// Now you can get the payment information from storage to get the price of the product and the currency

if($cp->validatePayment($price, $currency)){
    // the payment was successful
} else {
//     The payment did not correctly validate, all errors are caught into an error array
    print_r($cp->getErrors());
}



