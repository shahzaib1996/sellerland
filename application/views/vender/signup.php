<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup To Your Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>bootstrap/access/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url()?>bootstrap/access/css/main.css">
  
<!--===============================================================================================-->
<style>
	.vsue {
		margin: 0px;
		padding: 0px;
		color: red !important;
		background: white;
		border: none;
	}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
					<span class="login100-form-title" style="padding-bottom: 20px;">
						Signup
					</span>

				<?php if(!empty($this->session->flashdata('vendersignup')) ) { ?>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="alert alert-info" style="color:red;font-weight: bold;text-align: center;padding-bottom:10px;">
                              <?= $this->session->flashdata('vendersignup') ?> 
                          </div>
                      </div>
                  </div>
             	 <?php } ?>

				<?= form_open('vender/add_store')?>
				<div class="wrap-input100 validate-input m-b-16" data-validate = "Store Name is required">
					<input class="input100" type="text" name="store_name" placeholder="Enter Store Name" value="<?= set_value('store_name') ?>" required>
					<span class="focus-input100"></span>
				<div class="vsue"> <?= form_error('store_name') ?></div>
				</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="username" pattern=".*[a-z].*" value="<?= set_value('username') ?>" placeholder="Username" required>
						<span class="focus-input100"></span>
						<div class="vsue"> <?= form_error('username') ?></div>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
						<input class="input100" type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" required>
						<span class="focus-input100"></span>
						<div class="vsue"> <?= form_error('email') ?></div>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
						<div class="vsue"> <?= form_error('password') ?></div>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Confirm Password is required">
						<input class="input100" type="password" name="cpassword" placeholder="Confirm Password" value="" required>
						<span class="focus-input100"></span>
					</div>

      				<div class="wrap-input100 validate-input m-b-16" data-validate = "Phone is required">
						<input class="input100" type="text" name="phone"  placeholder="Phone Number" value="<?= set_value('phone') ?>" required>
						<span class="focus-input100"></span>
						<div class="vsue"> <?= form_error('phone') ?></div>
	    			</div>

					<div class="container-login100-form-btn m-t-17">
						<input class="login100-form-btn" value="SignUp" type="submit">
					</div>

					<div style="color: red;">
						<!-- <?= form_error('store_name') ?>
						<?= form_error('username') ?>
						<?= form_error('email') ?>
						<?= form_error('password') ?>
						<?= form_error('phone') ?>
		                <?= form_close()?> -->
					</div>
                <p class="text-center account" style="padding-top: 10px; color:#3b81ff;">Already have an account? <a href="<?= site_url('vender/login')?>"> Log In</a></p>
			</div>
		</div>
	</div>
	


	<script src="<?= base_url()?>bootstrap/js/main.js"></script>

</body>
</html>