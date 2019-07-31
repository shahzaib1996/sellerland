<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signin To Your Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>bootstrap/access/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url()?>bootstrap/access/css/main.css">
  
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<?= form_open('vender/check')?>
					<span class="login100-form-title " style="padding-bottom:10px; ">
						Login
					</span>
					<?php if(!empty($this->session->flashdata('loginerror')) ){ ?>
	                  <div style="text-align: center;color: red;font-size: 20px;padding-bottom: 20px;">
	                      
	                              <?= $this->session->flashdata('loginerror') ?>
	                        
	                  </div>
	              <?php } ?>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" style="border-bottom-color:red" name="username" value="<?= set_value('username') ?>" placeholder="Username" >
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" value="<?= set_value('password') ?>" placeholder="Password" >
						<span class="focus-input100"></span>
					</div>
				<div class="container-login100-form-btn m-t-17">
						<input class="login100-form-btn" value="Login" type="submit">
					</div>
				<a href="<?= site_url('selly/index/forgotpassword')?>" class="btn btn-primary">
					Forgot-password
				</a>
				<?= form_error('username'); ?>
				<?= form_error('password'); ?>
				<?= form_close() ?>
                <p class="text-center account" style="padding-top: 10px; color:#3b81ff;">Don't have an account yet? <a href="<?= site_url('vender/signup')?>"> Signup now</a</p>
			</div>
		</div>
	</div>
	


<!--	<script src="--><?//= base_url()?><!--bootstrap/js/main.js"></script>-->

</body>
</html>