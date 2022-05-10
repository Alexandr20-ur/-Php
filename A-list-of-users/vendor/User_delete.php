<?php
require '../Database/DB.php';
$id = $_GET['id'];
$user = new Database();
$user->delete($id);
//$query = "DELETE FROM `users` WHERE `users`.`id` = '$id'";
//$delete = $mysqli->query($query) or die(mysqli_errno($delete));
//
//
//header("Location: ../index.php");
?>


