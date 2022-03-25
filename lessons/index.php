<?php
$conn = mysqli_connect("localhost", "root", "", "photos");

$bigSql = "SELECT * FROM `big_img`";
$resultBig = mysqli_query($conn, $bigSql);
$itemsBig = mysqli_fetch_all($resultBig, MYSQLI_ASSOC);


$smallSql = "SELECT * FROM `small_img`";
$resultSmall = mysqli_query($conn,$smallSql);
$itemsSmall = mysqli_fetch_all($resultSmall, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery DB</title>
</head>
<body>
  <form action="core/addFile.php" method="post" enctype="multipart/form-data">
      <input type="file" name="image">
      <input type="submit" value="Download">
  </form>

  <h3>добавленые картинки </h3>
  <?php foreach ($itemsSmall as $item):?>
      <a href="Uploads/<?= $item['file_name']?>">
          <img src="minUploads/<?php echo $item['file_name'];?>" width="100">
      </a>
  <?php endforeach; ?>
</body>
</html>
