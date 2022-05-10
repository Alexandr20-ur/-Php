<?php

    include '../Database/DB.php';
    $id = $_GET['id'];
    $user = new Database();
    $user = $user->displayRecordById($id);
    ?>


<form action="UPDATE.php?id=<?=$_GET['id']?>" method="post">
    <input type="hidden" value="<?= $id?>">
    <h3>Имя</h3>
    <input type="text" name="name" value="<?=$user[0]['name']?>">
    <h3>Фамилия</h3>
    <input type="text" name="surname" value="<?=$user[0]['surname'] ?>">
    <h3>Отчество</h3>
    <input type="text" name="patronymic" value="<?=$user[0]['patronymic'] ?>">
    <h3>Город</h3>
    <input type="text" name="city" value="<?=$user[0]['city'] ?>">
    <h3>Телефон</h3>
    <input type="text" name="telephone" value="<?=$user[0]['telephone'] ?>">
    <h3>E-mail</h3>
    <input type="text" name="Email" value="<?=$user[0]['Email'] ?>">
    <h3>Логин</h3>
    <input type="text" name="login" value="<?=$user[0]['login'] ?>">
    <h3>Пароль</h3>
    <input type="password" name="password" value="<?=$user[0]['password'] ?>">
    <br>
    <button type="submit" name="ADD">Изменить</button>
</form>
