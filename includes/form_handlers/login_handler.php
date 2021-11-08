<?php
//-- Start Login Button --//
if(isset($_POST['login_button'])) {

	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //sanitize email
	$_SESSION['log_email'] = $email; //Store email into session variable

	$password = md5($_POST['log_password']); //Get password

	$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);
	$row = mysqli_fetch_array($check_database_query);

	if($check_login_query == 1 && $row["user_type"] == "user") { //Login query
		$username = $row['username'];

		$_SESSION['username'] = $username;
		header("Location: userhome.php");
		exit();
    }
	elseif($check_login_query == 1 && $row["user_type"] == "admin") {
		$username = $row['username'];

		$_SESSION['username'] = $username;
		header("Location: adminhome.php");
		exit();
	}
    else{
        array_push($error_array, "Email or password was incorrect<br>");
    } //End login query
} //-- End Login Button --//
?>
