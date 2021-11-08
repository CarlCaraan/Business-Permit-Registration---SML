  <?php
 //ajax_fetch_update_users.php
 $connect = mysqli_connect("localhost", "root", "", "business");
 if(isset($_POST["users_id"]))
 {
      $query = "SELECT * FROM users WHERE id = '".$_POST["users_id"]."'";
      $result = mysqli_query($connect, $query);
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
 }
 ?>
