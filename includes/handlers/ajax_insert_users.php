<?php
$connect = mysqli_connect("localhost", "root", "", "business");

if(!empty($_POST)) {

    $first_name = mysqli_real_escape_string($connect, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($connect, $_POST["last_name"]);
    $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
	$password_1 = md5($password); //Encrypt password before sending to database
    $signup_date = mysqli_real_escape_string($connect, $_POST["signup_date"]);
    $user_type = mysqli_real_escape_string($connect, $_POST["user_type"]);

    if($_POST["users_id"] != '') {
        $query = "
        UPDATE users
        SET first_name='$first_name',
        last_name='$last_name',
        gender='$gender',
        username='$username',
        email='$email',
        password='$password',
        signup_date='$signup_date',
        user_type= '$user_type'
        WHERE id='".$_POST["users_id"]."'";
    }
    else {
        $query = "
        INSERT INTO users(first_name, last_name, username, email, password, signup_date, user_type, gender)
        VALUES('$first_name', '$last_name','$username', '$email', '$password_1', '$signup_date', '$user_type', '$gender');
        ";
    }
    if(mysqli_query($connect, $query)) {

    }

}


?>
