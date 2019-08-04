<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup To Your Account</title>
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

				<?php if(!empty($this->session->flashdata('signuperror')) ) { ?>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="alert alert-info" style="color:red;font-weight: bold;text-align: center;padding-bottom:10px;">
                              <?= $this->session->flashdata('signuperror') ?> 
                          </div>
                      </div>
                  </div>
             	 <?php } ?>

                <?= form_open('main/signup') ?>
				<div class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-51">
						Signup
					</span>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
						<input class="input100" type="email" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="username" pattern=".*[a-z].*" placeholder="Username" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="cpassword" placeholder="Confirm Password" required>
						<span class="focus-input100"></span>
					</div>
					

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

                </div>
                <?= form_close(); ?>
                <p class="text-center account" style="padding-top: 10px; color:#3b81ff;">Already have an account? <a href="<?= site_url('main/view/signin') ?>"> Log In</a></p>
			</div>
		</div>
	</div>
	


	<script src="<?= base_url() ?>theme/js/main.js"></script>

</body>
</html>