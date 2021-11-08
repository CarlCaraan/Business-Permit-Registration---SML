<?php
//Stop access when not logged in!
if (isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    //$user is to select all data from users table
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: register.php");
}


define('USERSITE', true);
?>


<!-- Start Navigation -->
<nav class="navbar navbar-expand-md fixed-top">
<div class="container-fluid">
	<a class="navbar-brand" href="#"><img src="assets/images/icons/favicon.ico" alt=""></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
		<span class="custom-toggler-icon"><i class="fas fa-bars"></i></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link <?php if($page=='user'){echo 'active';}?>" href="userhome.php">Registration</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if($page=='submit'){echo 'active';}?>" href="submit.php">Submit</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if($page=='settings'){echo 'active';}?>" href="settings_user.php">Settings</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if($page=='logout'){echo 'active';}?>" href="includes/handlers/logout.php">Logout</a>
			</li>
		</ul>
	</div>
</div>
</nav>
<!--- End Navigation -->
