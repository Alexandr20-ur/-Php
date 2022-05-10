<?php
include '../Database/DB.php';
$user = new Database();
$user->update($_POST);