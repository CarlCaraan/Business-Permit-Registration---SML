<?php
require("config/config.php");
include("includes/classes/User.php");
?>

<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<?php include 'includes/head.php'; ?>
    <?php require 'includes/form_handlers/pdo_handler.php'; ?>
	<title>Admin Panel</title>
</head>

<body>

	<!-- Start Admin Section -->
	<div class="home">

		<!-- Navigation -->
		<header>
		<?php
		$page = 'admin';
		$side = 'dashboard_users';
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

			<!-- Start Table -->
        	<div class="card-header"><h3 class="text-dark font-weight-bold text-uppercase" id="admin_user_headings">User Accounts</h3></div>
	        <div class="card-body">
	        	<div class="form-group">
	            	<input type="text" name="search_box" id="search_box" class="form-control" placeholder="Search...">
	        	</div>
	        	<div class="table-responsive" id="dynamic_content">
					<div id="users_table">
						<!--- Ajax Content Here --->
					</div>
	        	</div>
	        </div>

		</div>
		<!-- End Page Content holder -->



	</div>
	<!-- End Admin Section -->

</body>

<!-- Javascript -->
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
<script src="bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script><!-- Modern Date Picker -->

</html>

<!-- Start Modal Section -->

<!-- Start Delete Modal -->
<div class="modal fade" id="delete_modal" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">

  		<div class="modal-header">
			<h4>Delete User</h4>
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
    	</div>

    	<div class="modal-body">
    		<p>Are you sure you want to delete this user?</p>
            <form method="POST" action="delete_users.php" id="form-delete-user">
                <input type="hidden" name="id">
            </form>
    	</div>

    	<div class="modal-footer">
			<button type="submit" form="form-delete-user" class="btn btn-danger">Delete</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    	</div>

    </div>

	</div>
</div>
<!-- End Delete Modal -->

<!-- Start Insert/Update User Modal -->
<div class="modal fade" id="add_data_Modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User Details</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" required><br>

                    <label for="last_name">Last Name</label>
                    <input name="last_name" id="last_name" class="form-control" required></input><br>

                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select><br>

                    <label for="username">Username</label>
                    <input name="username" id="username" class="form-control" required></input><br>

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required></input><br>

					<div id="password_input">
	                    <label for="password">Password</label>
	                    <input type="password" name="password" id="password" class="form-control" required></input><br>
					</div>

                    <label for="signup_date">Sign Up Date</label>
                    <input type="text" name="signup_date" id="signup_date" class="form-control" required></input><br>

                    <label for="user_type">User Type</label>
                    <select name="user_type" id="user_type" class="form-control" required>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select><br>

	                <input type="hidden" name="users_id" id="users_id">
	                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success">
					<input type="reset" class="btn btn-secondary"></input>
                </form>
            </div>

            <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
       </div>
  </div>
</div> <!-- End Insert User Modal -->
<!-- Start Modal Section -->


<!-- Modern Datetime picker UI -->
<script>
    flatpickr('#signup_date', {
        enableTime: false
    })
</script>


<!-- Start ajax_fetch_users -->
<script>
$(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"includes/handlers/ajax_fetch_users.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
            $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
        var page = $(this).data('page_number');
        var query = $('#search_box').val();
        load_data(page, query);
    });

    $('#search_box').keyup(function(){
        var query = $('#search_box').val();
        load_data(1, query);
    });

});
</script>
<!-- End ajax_fetch_users -->
