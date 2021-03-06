<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signin To Your Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>bootstrap/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url()?>bootstrap/css/main.css">
  
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<?php $attributes = array('class' => 'login100-form validate-form flex-sb flex-w'); ?>
				<?= form_open('selly/reset')?>
					<span class="login100-form-title p-b-51">
						Forgot Password
					</span>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="email" name="email" placeholder="Enter Email" required>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit">
							Reset Password
						</button>
					</div>







				<?= form_close() ?>
                <p class="text-center account" style="padding-top: 10px; color:#3b81ff;">Don't have an account yet? <a href="<?= site_url('selly/index/signup')?>"> Signup now</a</p>
			</div>
		</div>
	</div>
	


	<script src="<?= base_url()?>bootstrap/js/main.js"></script>

</body>
</html>