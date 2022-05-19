<?php
include '../core/Database.php';
include '../models/config/Connection.php';
$id = $_GET['id'];
$user = new Database();
$user->delete($id);