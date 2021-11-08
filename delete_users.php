<?php
require_once 'includes/form_handlers/pdo_handler.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = $conn->prepare("DELETE FROM users WHERE id='$id'");
    $query->execute();

    header('Location: adminhome.php');
}

?>
