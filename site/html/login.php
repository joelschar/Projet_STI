<?php
/**
 * CrepMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * Login page, fist landing page. Makes the login and redirects to the mail page.
 */

include_once('includes/a_config.php');

include('includes/login_script.php'); // Includes Login Script

if(isset($_SESSION['login'])){
    header("location: /mail.php");
}

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php include_once("includes/head-tag-contents.php"); ?>

</head>

<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="login.php" method="post">
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
          <div class="alert-info100">
            <span class=""> <?php if(isset($error)) { echo "$error"; }?> </span>
          </div>

					<div class="container-login100-form-btn m-t-32">
						<input type="submit" name="login" value="login" class="login100-form-btn">
					</div>
				</form>
        <div class="container-login100-form-btn m-t-32">
          <a href="register.php" class="login100-form-btn">Register</a>
        </div>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
