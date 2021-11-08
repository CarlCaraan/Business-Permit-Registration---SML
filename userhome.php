<?php
require("config/config.php");
include("includes/classes/User.php");
?>

<html>
<head>
	<?php include 'includes/head.php'; ?>
	<title>Registration | Welcome</title>
</head>

<body>

	<!-- Start Home Section -->
	<div id="home" class="offset">

		<!-- Navigation -->
		<header>
		<?php $page = 'user';include 'includes/navbar_user.php'; ?>
		</header>

		<a title="Go to your account settings" href="settings_user.php" id="username_container">
			<?php
				$fullname_obj = new User($con, $userLoggedIn);
				echo $fullname_obj->getFirstAndLastName();
			?>
		</a>


		<div class="container mt-5 pt-5">
			<h3 class="center">Step 1 - Business Permit Registration</h3>
			<p class="center">Fill up the details below and download the pdf</p>

			<form class="center" action="makepdf.php" method="POST">

				<div class="narrow">

					<div class="row mb-1">
					    <div class="col-md p-0 mx-1">
							<input class="form-control" type="text" name="fname" placeholder="First Name" required>
					    </div>
						<div class="col-md p-0 mx-1">
							<input class="form-control" type="text" name="lname" placeholder="Last Name" required>
						</div>
					</div>

					<div class="mx-1 mb-1">
						<input class="form-control" type="email" name="email" placeholder="Email" required>
					</div>

					<div class="mx-1 mb-1">
						<input class="form-control" type="tel" name="phone" placeholder="Cellphone Number" required>
					</div>

					<button class="btn btn-outline-light btn-lg bg-success" type="submit" name="">Create PDF</button>

				</div>

			</form>

		</div>



	</div>
	<!-- End Home Section -->

<?php include 'includes/scripts.php'; ?>

</body>


</html>
