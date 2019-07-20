<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="col-lg-12">
    <h4 class="success">Thank you! Your payment was successful.</h4>
    <p>Item Name : <span><?php echo $item_name; ?></span></p>
    <p>Item Number : <span><?php echo $item_number; ?></span></p>
    <p>TXN ID : <span><?php echo $txn_id; ?></span></p>
    <p>Amount Paid : <span>$<?php echo $payment_amt.' '.$currency_code; ?></span></p>
    <p>Payment Status : <span><?php echo $status; ?></span></p>

    <a href="<?php echo base_url('products'); ?>">Back to Products</a>
</div>

</body>
</html>