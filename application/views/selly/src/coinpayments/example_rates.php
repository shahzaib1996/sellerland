<?php
/*
	CoinPayments.net API Example
	Copyright 2014 CoinPayments.net. All rights reserved.	
	License: GPLv2 - http://www.gnu.org/licenses/gpl-2.0.txt
*/
	require('./coinpayments.inc.php');
	$cps = new CoinPaymentsAPI();
	$cps->Setup('407f4DE7bebb09b6FF8aA1f64cfcfD0DDF3751Bd44D22Cace9981d9F8c99C33e', 'aafa971b38e64a1e3af868e86fd9ea8c3476f14f352e0f7ec9313b952b9951a5');

	$result = $cps->GetRates();
	if ($result['error'] == 'ok') {
		print 'Number of currencies: '.count($result['result'])."\n";
		foreach ($result['result'] as $coin => $rate) {
			if (php_sapi_name() == 'cli') {
				print print_r($rate);
			} else {
				print nl2br(print_r($rate, TRUE));
			}
		}
	} else {
		print 'Error: '.$result['error']."\n";
	}
