<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup To Your Account</title>
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
				<?= form_open('vender/add_store')?>
					<span class="login100-form-title p-b-51">
						Signup
					</span>
				<div class="wrap-input100 validate-input m-b-16" data-validate = "Store Name is required">
					<input class="input100" type="text" name="store_name" placeholder="Enter Store Name" value="<?= set_value('username') ?>" >
					<span class="focus-input100"></span>
				</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="username" value="<?= set_value('username') ?>" placeholder="Enter Username" >
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="email" name="email" placeholder="Enter Email" value="<?= set_value('email') ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Enter Password" value="<?= set_value('password') ?>">
						<span class="focus-input100"></span>
					</div>
      				<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
					<input class="input100" type="number" name="phone"  placeholder="Enter Number" value="<?= set_value('phone') ?>">
					<span class="focus-input100"></span>
	    			</div>
					<div class="container-login100-form-btn m-t-17">
						<input class="login100-form-btn" value="SignUp" type="submit">
					</div>
				<?= form_error('store_name') ?>
				<?= form_error('username') ?>
				<?= form_error('email') ?>
				<?= form_error('password') ?>
				<?= form_error('phone') ?>
                <?= form_close()?>
                <p class="text-center account" style="padding-top: 10px; color:#3b81ff;">Already have an account? <a href="<?= site_url('vender/login')?>"> Log In</a</p>
			</div>
		</div>
	</div>
	


	<script src="<?= base_url()?>bootstrap/js/main.js"></script>

</body>
</html>