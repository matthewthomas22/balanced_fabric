<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Prominent (Module)</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url().'assets/images/icons/favicon.ico'?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css'?> ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/vendor/animate/animate.css'?> ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/vendor/css-hamburgers/hamburgers.min.css'?> ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/vendor/select2/select2.min.css'?> ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/util.css'?> ">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/main.css'?> ">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url().'assets/images/img-01.png'?>" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="<?php echo base_url('index.php/login/login_user')?> " method="post" id="fLogin">
					<span class="login100-form-title">
						Balanced Fabric
					</span>
					<span class="login100-form-title2">
						~ Prominent ~
					</span>

					<div class="wrap-input100" data-validate = "Username is reqiured">
						<input class="input100" type="text" name="user" placeholder="Username" id="user">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<img src="<?php echo base_url().'assets/images/user.png'?> " alt="Smiley face" width="20" height="20">
						</span>
					</div>

					<div class="wrap-input100" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" id="password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<img src="<?php echo base_url().'assets/images/password.png'?> " alt="Smiley face" width="20" height="20">
						</span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" >
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Copyright @ PT. Daese Garmin 2019
						</span>
					</div>

				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="<?php echo base_url().'assets/vendor/jquery/jquery-3.2.1.min.js'?> "></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'assets/vendor/bootstrap/js/popper.js'?> "></script>
	<script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap.min.js'?> "></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'assets/vendor/select2/select2.min.js'?> "></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'assets/vendor/tilt/tilt.jquery.min.js'?> "></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})

		$("#user").on('keypress',function(e) {
    if(e.which == 13) {
				$("#password").focus();
				event.preventDefault();
      	return false;
    }
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'assets/js/main.js'?> "></script>
	<script src="<?php echo base_url().'assets/js/myFunction.js'?> "></script>

</body>
</html>
