<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signin To Your Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>theme/access/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>theme/access/css/main.css">
  
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
                <?= form_open('main/login') ?>
				<div class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-51">
						Login
					</span>

					<?php if(!empty($this->session->flashdata('loginerror')) ){ ?>
	                  <div style="text-align: center;color: red;font-size: 20px;padding-bottom: 20px;">
	                      
	                              <?= $this->session->flashdata('loginerror') ?>
	                        
	                  </div>
	              <?php } else if(!empty($this->session->flashdata('loginsuccess')) ){ ?>
	                  <div style="text-align: center;color: green;font-size: 20px;padding-bottom: 20px;">
	                      
	                              <?= $this->session->flashdata('loginsuccess') ?>
	                        
	                  </div>
	              <?php } ?>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>
					
					

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<a href="<?= site_url('main/user_forgot_password')?>" class="btn btn-primary">
					Forgot-password
				</a>

				</div>
                <?= form_close();?>
                <p class="text-center account" style="padding-top: 10px; color:#3b81ff;">Don't have an account yet? <a href="<?= site_url('main/view/signup') ?>"> Signup now</a</p>
			</div>
		</div>
	</div>
	


	<script src="<?= base_url() ?>theme/js/main.js"></script>

</body>
</html>