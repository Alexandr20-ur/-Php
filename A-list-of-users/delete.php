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
        $users = new Database();
        $users->displayRecordById($_GET['id']);

        foreach ($users->displayRecordById($_GET['id']) as $user) {
            ?>
    <tr>
        <td><?= $user['id']; ?></td>
        <td><?= $user['surname']; ?></td>
        <td><?= $user['name']; ?></td>
        <td><?= $user['patronymic']; ?></td>
        <td><?= $user['city']; ?></td>
        <td><?= $user['Email']; ?></td>
        <td><?= $user['login']; ?></td>
        <td><a href="vendor/User_delete.php?id=<?= $user['id'];?>">Да</a></td>
        <td><a href="index.php">Нет</a></td>

    </tr>
    <?php

        }
    ?>

</table>

<button name="Adding" type="submit"><a href="vendor/addingUser.php">Добавить</a>
</button>

</body>
</html>
