<!DOCTYPE html>
<html lang="en">
<head>
	<title>Email Verification</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>bootstrap/access/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url()?>bootstrap/access/css/main.css">
  
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 " style="text-align: center;">
				<?php $attributes = array('class' => 'login100-form validate-form flex-sb flex-w'); ?>
					
				<?php if( $status == 1 ) { ?>

					<span class="login100-form-title ">
						Thank You! 
					</span>
					<br>
					<span style="color: green;font-size: 20px;">
						<?= $message ?>
					</span>
				
				<?php } else if( $status == 0 )  { ?>

					<span class="login100-form-title ">
						Failed! 
					</span>
					<br>
					<span style="color: red;font-size: 20px;">
						<?= $message ?>
					</span>

				<?php } else if( $status == 2 )  { ?>

					<span class="login100-form-title ">
						Signup Successfull! 
					</span>
					<br>
					<span style="color: green;font-size: 20px;">
						<?= $message ?>
					</span>

				<?php } ?>

				


                <!-- <p class="text-center account" style="padding-top: 10px; color:#3b81ff;"> <a href="<?= site_url('vender/')?>"> Login Here </a></p> -->
			</div>
		</div>
	</div>
	


	<script src="<?= base_url()?>bootstrap/js/main.js"></script>

</body>
</html>