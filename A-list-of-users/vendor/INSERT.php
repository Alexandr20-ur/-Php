<?php
include '../Database/DB.php';
//$name = $_POST['name'];
//$surname = $_POST['surname'];
//$patronymic = $_POST['patronymic'];
//$city = $_POST['city'];
//$telephone = $_POST['telephone'];
//$Email = $_POST['Email'];
//$login = $_POST['login'];
//$password = $_POST['password'];

$user = new Database();
$user->insert($_POST);

//$query = $mysqli->query("INSERT INTO `users` (`id`,`name`, `surname`, `patronymic`, `city`, `telephone`, `Email`, `login`, `password`) VALUES (NULL, '$name', '$surname', '$patronymic', '$city', '$telephone', '$Email', '$login', '$password')");
//
//if(!$query) {
//    die('error');
//}
//
//
//
//header("Location:../index.php");

?>