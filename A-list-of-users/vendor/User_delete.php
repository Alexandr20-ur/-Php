<?php
require '../Database/DB.php';
$id = $_GET['id'];

$delete = mysqli_query($db, "DELETE FROM `users` WHERE `users`.`id` = '$id'");

header("Location: ../index.php");
?>


