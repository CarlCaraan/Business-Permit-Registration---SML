<?php
require("config/config.php");
include("includes/classes/User.php");
?>

<html>
<head>
	<?php include 'includes/head.php'; ?>
	<title>Account | Settings</title>
</head>

<body>

	<!-- Navigation -->
	<header>
	<?php $page = 'settings';include 'includes/navbar_user.php'; ?>
	</header>

	<!-- Start Settings Section -->
	<div id="settings" class="offset">

		<a href="settings_user.php" id="username_container">
			<?php
				$fullname_obj = new User($con, $userLoggedIn);
				echo $fullname_obj->getFirstAndLastName();
			?>
		</a>

		<div class="container mt-5 pt-5">
			<h3 class="center">Account Settings</h3>
			<hr class="socket"><br>
			<p class="center">Note: Modify the value and click 'Update Details'</p>

				<div class="narrow">

					<div class="row mb-1">

					<?php
					//Settings Handler
					include("includes/form_handlers/settings_handler.php");

					$user_data_query = mysqli_query($con, "SELECT first_name, last_name, email FROM users WHERE username='$userLoggedIn'");
					$row = mysqli_fetch_array($user_data_query);

					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
					$email = $row['email'];
					?>

					<div class="col-md p-0 mx-1">
						<form class="" action="settings_user.php" method="POST">
							<strong><p>Basic Information</p></strong>
							<input class="form-control mt-1" type="text" name="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" required>
							<input class="form-control mt-1" type="text" name="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" required>
							<input class="form-control mt-1" type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
							<input class="btn btn-outline-light btn-lg bg-success mt-1" type="submit" name="update_details" value="Update Details"></input>
							<?php echo $message; ?>
						</form>
					</div>

					<div class="col-md p-0 mx-1">
						<form class="" action="settings_user.php" method="POST">
							<strong><p>Change Password</p></strong>
							<input class="form-control mt-1" type="password" name="old_password" placeholder="Current Password" required>
							<input class="form-control mt-1" type="password" name="new_password_1" placeholder="New Password" required>
							<input class="form-control mt-1" type="password" name="new_password_2" placeholder="Confirm New Password" required>
							<input class="btn btn-outline-light btn-lg bg-success mt-1" type="submit" name="update_password" value="Update Password"></input>
							<?php echo $password_message; ?>
						</form>
					</div>

				</div> <!-- End Row -->

				</div> <!-- End Narrow -->

		</div> <!-- End Container -->

	</div>
	<!-- End Settings Section -->


<?php include 'includes/scripts.php'; ?>

</body>


</html>
