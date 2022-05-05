<?php
include '../Database/DB.php';


?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adding</title>
    <style>
        form {
            text-align: center;
            line-height: 10px;
        }
    </style>
</head>
<body>
<form action="INSERT.php" method="post">
    <h3>Имя</h3>
    <input type="text" name="name">
    <h3>Фамилия</h3>
    <input type="text" name="surname">
    <h3>Отчество</h3>
    <input type="text" name="patronymic">
    <h3>Город</h3>
    <input type="text" name="city">
    <h3>Телефон</h3>
    <input type="text" name="telephone">
    <h3>E-mail</h3>
    <input type="text" name="Email">
    <h3>Логин</h3>
    <input type="text" name="login">
    <h3>Пароль</h3>
    <input type="password" name="password">
    <br>
    <button type="submit" name="ADD">Добавить</button>
</form>
</body>
</html>

