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
				<?php $attributes = array('class' => 'login100-form validate-form flex-sb flex-w'); ?>
				<?= form_open('main/user_forgot_password_sent',$attributes)?>
					<span class="login100-form-title p-b-51">
						User Forgot Password
					</span>

					<?php if(!empty($this->session->flashdata('fperror')) ){ ?>
	                  <div style="text-align: center;color: red;font-size: 20px;padding-bottom: 20px;">
	                      
	                              <?= $this->session->flashdata('fperror') ?>
	                        
	                  </div>
	              <?php } else if(!empty($this->session->flashdata('fpsuccess')) ){ ?>
	                  <div style="text-align: center;color: green;font-size: 20px;padding-bottom: 20px;">
	                      
	                              <?= $this->session->flashdata('fpsuccess') ?>
	                        
	                  </div>
	              <?php } ?>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
						<input class="input100" type="email" name="email" placeholder="Enter your email" required>
						<span class="focus-input100"></span>
					</div>
					

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit">
							Send Link
						</button>
					</div>

			

				<?= form_close() ?>

			</div>
		</div>
	</div>
	


	<script src="<?= base_url()?>bootstrap/js/main.js"></script>

</body>
</html>