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
				<?= form_open('main/user_fp_update',$attributes)?>
					<span class="login100-form-title p-b-51">
						User Reset Password
					</span>


					<?php if(!empty($this->session->flashdata('rserror')) ){ ?>
	                  <div style="text-align: center;color: red;font-size: 20px;padding-bottom: 20px;">
	                      
	                              <?= $this->session->flashdata('rserror') ?>
	                        
	                  </div>
	              <?php } ?>
					
	              	<input type="hidden" name="user_id" value="<?= $user_id ?>" >
					<div class="wrap-input100 validate-input m-b-16" data-validate = "">
						<input class="input100" type="password" name="password" placeholder="Enter New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "">
						<input class="input100" type="password" name="cpassword" placeholder="Confirm New Password" required>
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