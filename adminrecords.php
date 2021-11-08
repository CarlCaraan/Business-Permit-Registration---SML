<?php
require("config/config.php");
include("includes/classes/User.php");
?>

<html>
<head>
	<?php include 'includes/head.php'; ?>
	<title>Admin Panel</title>
</head>

<body>

	<!-- Start Admin Section -->
	<div class="home">

		<!-- Navigation -->
		<header>
		<?php
		$page = 'admin';
		$side = 'dashboard_records';
		include 'includes/navbar_admin.php';
		?>
		</header>



		<!-- Start Vertical navbar -->
		<div class="vertical-nav bg-light" id="sidebar">

			<a title="Go to your account settings" href="settings_admin.php" id="username_container">
				<?php
					$fullname_obj = new User($con, $userLoggedIn);
					echo $fullname_obj->getFirstAndLastName();
				?>
			</a>

			<!-- Dashboard -->
		    <p class="text-dark font-weight-bold text-uppercase px-3 mt-5">Dashboard</p>

		    <ul class="nav flex-column bg-white mb-0">
		        <li class="nav-item">
		            <a href="adminhome.php" class="nav-link text-dark" id="admin_navlink" style="<?php if($side=='dashboard_users'){echo 'background-color: #DAE0E5;';}?>">
		                <i class="fas fa-users mr-3 text-success"></i>Users
		            </a>
		        </li>

		        <li class="nav-item">
		            <a href="adminrecords.php" class="nav-link text-dark" id="admin_navlink" style="<?php if($side=='dashboard_records'){echo 'background-color: #DAE0E5;';}?>">
		                <i class="fas fa-book-open mr-3 text-success"></i>Records
		            </a>
		        </li>
		    </ul>

		</div>
		<!-- End Vertical navbar -->


		<!-- Start Page Content holder -->
		<div class="page-content" id="admin_content">

		    <!-- Toggle button -->
		    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded shadow-sm">
		        <i class="fas fa-bars text-success"></i>
		    </button>

			<h1 class="center">Records Table.</h1>

		</div>
		<!-- End Page Content holder -->



	</div>
	<!-- End Admin Section -->

</body>


<?php include 'includes/scripts.php' ?>

</html>
