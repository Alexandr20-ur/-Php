<?php
include 'Database/DB.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Город</th>
        <th>Телефон</th>
        <th>Email</th>
    </tr>
    <?php

        $users = mysqli_query($db, "SELECT * FROM `users` ORDER BY `surname` ASC, `name` ASC, `patronymic` ASC");
        $users = mysqli_fetch_all($users);

        foreach ($users as $user) {
            ?>
    <tr>
        <td><?= $user[0]; ?></td>
        <td><?= $user[2]; ?></td>
        <td><?= $user[1]; ?></td>
        <td><?= $user[3]; ?></td>
        <td><?= $user[4]; ?></td>
        <td><?= $user[5]; ?></td>
        <td><?= $user[6]; ?></td>
        <td><a href="vendor/User_delete.php?id=<?= $user[0];?>">Удалить пост</a></td>

    </tr>
    <?php
        }
    ?>

</table>

<button name="Adding" type="submit"><a href="vendor/addingUser.php">Добавить</a>
</button>

</body>
</html>