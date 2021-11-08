<?php
$image = $_FILES['image'];
$path = "../uploads/";
$minPath = "../minUploads/";
$images = glob($path."*.*", GLOB_BRACE);



//Валидация

$types = ['image/jpeg', 'image/png', 'image/gif'];

if (!in_array($image['type'], $types)) {
    die('incorrect file type');
}
/*
if ($image['type'] !== 'image/jpeg' && $image['type'] !== 'image/png') {
    die('incorrect file type');
}
*/

$fileSize = $image['size'] / 10000000; //b
$maxSize = 1; //mb

if ($fileSize > $maxSize) {
    die('incorrect file size');
}


// создание уникального названия
$extension = pathinfo($image['name'], PATHINFO_EXTENSION);

$fileName = $path . time() . ".$extension";
$thumbpath = $minPath . time() . ".$extension";
// загрузка файла
if(!move_uploaded_file($image['tmp_name'],$fileName)) {
    die ('Не удалось загрузить файл');
}

//Изменяем размер фотографий

foreach ($images as $image) {

    $im_php = imagecreatefromjpeg($image);
    switch ($im_php)
    {case 1:   //   gif -> jpg
        $img_src = imagecreatefromgif($image);
            break;
        case 2:   //   jpeg -> jpg
            $img_src = imagecreatefromjpeg($image);
            break;
        case 3:  //   png -> jpg
            $img_src = imagecreatefrompng($image);
            break;
    }
    $im_php = imagescale($im_php,200);
    $new_height = imagesy($im_php);
    $new_name = str_replace('-1920x1080', '-200x'.$new_height, basename($image));
    imagejpeg($im_php,$path.'../minUploads/'.$new_name);
}

//Вызываем изображение на рабочий стол

$openFile = glob("../uploads/*.*");
for ($i = 0; $i < count($openFile); $i++) {
    $open = $openFile[$i];
    echo "<a href='$open'>";
}

$openMinFile = glob("../minUploads/*.*");

for ($i = 0; $i < count($openMinFile); $i++) {
    $openMin = $openMinFile[$i];
    echo '<img src="'.$openMin.'" alt=""/>';
}

?>