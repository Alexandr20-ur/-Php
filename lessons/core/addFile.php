<?php
//Подключение к базе данных
require "db.php";

$image = $_FILES["image"];
$path = "../uploads/";
$minPath = "../minUploads/";
$images = glob($path."*.*", GLOB_BRACE);



//Валидация

$types = ['image/jpeg', 'image/png', 'image/gif'];

if (!in_array($image['type'], $types)) {
    die('incorrect file type');
}

$fileSize = $image['size'] / 10000000; //b
$maxSize = 1; //mb

if ($fileSize > $maxSize) {
    die('incorrect file size');
}


// создание уникального названия
$extension = pathinfo($image['name'], PATHINFO_EXTENSION);

$fileName = $path . time() . ".$extension";
$thumbpath = $minPath . time() . ".$extension";

//Загрузка файлов

if (move_uploaded_file($_FILES['image']['tmp_name'], $fileName)) {
    $QueryInsertBigFile = "INSERT INTO `big_img` (`id`, `file_name`) VALUES (NULL, '$fileName')";
   mysqli_query($db, $QueryInsertBigFile);
}
if(copy($fileName, $thumbpath))
{
    $QueryInsertSmallFile = "INSERT INTO `small_img` (`id`, `file_name`) VALUES (NULL, '$thumbpath')";
    mysqli_query($db, $QueryInsertSmallFile);
}

//Переход на главную страницу
header ("location: ../index.php");
?>