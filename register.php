<?php
require 'config/config.php';
//login, register handler
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'includes/head.php'; ?>
	<title>Register | Business Permit Registration</title>
</head>

<body id="register_body">

<!-- Fixed Register Button that proceed to login! -->
	<?php

	if(isset($_POST['register_button'])) {
		echo '
			<script>
				$(document).ready(function() {
					$(".login__wrapper").hide();
					$(".register__wrapper").show();
				});
			</script>
		';
	}

	?>

<!-- Start Form Section -->
	<div class="container p-0" id="container-prop">
		<div class="control">

			<div class="row m-0">

				<div class="col-lg-6 my-auto pt-4 px-5 animate__animated animate__fadeInDownBig">

					<!-- Start Login Form -->
					<div class="login__wrapper">
						<form action="register.php" method="POST">

							<!-- Logo and Header -->
							<div class="center">
								<img src="assets/images/logo.png" width="100" alt="">
							</div>

							<h3 class="p-3" id="login_header">Santa Maria Laguna
								<br><span id="business_header">Business Permit Registration</span>
							</h3>
							<h5>Login Below</h5><br>

							<div class="form-group">
							<label for="log_email">Email:</label>
								<input type="email" class="form-control" name="log_email" placeholder="Email Address" value="<?php
								if(isset($_SESSION['log_email'])) { //Start the SESSION to remain users input
									echo $_SESSION['log_email'];
								} ?>" required>
							</div>

							<div class="form-group">
								<label for="log_password">Password:</label>
								<input class="form-control" type="password" name="log_password" placeholder="Password">
							</div>

								<?php if(in_array("Email or password was incorrect<br>", $error_array)) echo "Email or password was incorrect<br>"; ?><!-- Show Error Message -->

							<div class="center">
								<input class="btn btn-outline-light btn-lg shadow-sm" id="ibtn-lg" type="submit" name="login_button" value="Login"><br>
							</div>

							<div class="text-center my-3">
								<a href="#" class="signup" id="signup">Need an account? Register here!</a>
							</div>
						</form>
					</div>
					<!-- End Login Form -->

					<!--  Start Register Form -->
					<div class="register__wrapper">
						<form  class"" action="register.php" method="POST">

							<h3 class="p-3" id="register_header">Santa Maria Laguna
								<br><span id="business_header">Business Permit Registration</span>
							</h3>

							<h5>Sign Up Below</h5><br>

							<div class="form-group">
								<label for="reg_fname">Full Name:</label>
								<input class="form-control" type="text" name="reg_fname" placeholder="First Name" value="<?php
								if(isset($_SESSION['reg_fname'])) { //Start the SESSION to remain users input
									echo $_SESSION['reg_fname'];
								} ?>" required>
								<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>
							</div>

							<div class="form-group">
								<input class="form-control" type="text" name="reg_lname" placeholder="Last Name" value="<?php
								if(isset($_SESSION['reg_lname'])) {
									echo $_SESSION['reg_lname'];
								} ?>" required>
								<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>
							</div>

							<div class="form-group">
								<label for="reg_email">Email:</label>
								<input class="form-control" type="email" name="reg_email" placeholder="Email" value="<?php
								if(isset($_SESSION['reg_email'])) {
									echo $_SESSION['reg_email'];
								} ?>" required>
							</div>

							<div class="form-group">
								<input class="form-control" type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
								if(isset($_SESSION['reg_email2'])) {
									echo $_SESSION['reg_email2'];
								} ?>" required>
								<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";
								else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
								else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?>
							</div>

							<div class="form-group">
								<label for="reg_password">Password:</label>
								<input class="form-control" type="password" name="reg_password" placeholder="Password" required>
							</div>

							<div class="form-group">
								<input class="form-control" type="password" name="reg_password2" placeholder="Confirm Password" required>
								<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>";
								else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
								else if(in_array("Your password must be between 5 and 30 characters<br>", $error_array)) echo "Your password must be between 5 and 30 characters<br>"; ?>
							</div>

							<div class="form-check">
							  <label class="form-check-label">
							    <input type="radio" class="form-check-input" name="gender" value="male" required>Male
							  </label>
							</div>
							<div class="form-check">
							  <label class="form-check-label">
							    <input type="radio" class="form-check-input" name="gender" value="female">Female
							  </label>
							</div>
							<div class="center">
								<input class="btn btn-outline-light btn-lg shadow-sm" id="ibtn-lg" type="submit" name="register_button" value="Register">
							</div>
							<!-- Register Successful Message -->
							<?php if(in_array("<span>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span>You're all set! Go ahead and login!</span><br>"; ?>

							<div class="text-center my-3">
								<a href="#" class="signin" id="signin">Already have an account? Sign in here!</a>
							</div>
						</form>
					</div>
					<!--  End Register Form -->
				</div> <!-- End col -->

				<div class="col-lg-6 p-0 animate__animated animate__fadeInUpBig" id="login_image">
					<img src="assets/images/SML.jpg" width="100%" alt="">
				</div> <!-- End col -->
			</div>





		</div>

	</div>
<!-- End Form Section -->


<?php include 'includes/scripts.php'; ?>

</body>
</html>
