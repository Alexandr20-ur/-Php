<?php
include '../Database/DB.php';
include 'validation.php';
if (isset($_POST['submit'])) {
    $validation = new validation($_POST);
    $errors = $validation->validateForm();
    if (empty($validation->errors)) {
        $validation->database->insert($_POST);
    }
}


//
//var_dump($_POST['submit']);
//echo '<pre>';
//var_dump($validation->errors);
//echo '</pre>';
//
//var_dump($_POST);
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
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <h3>Имя</h3>
    <input type="text" name="name" value="<?php if(!empty($_POST['name'])) {echo $_POST['name'];}?>">
    <div class="error">
        <?=$errors['name'] ?? ''?>
    </div>
    <h3>Фамилия</h3>
    <input type="text" name="surname" value="<?php if(!empty($_POST['surname'])) {echo $_POST['surname'];}?>">
    <h3>Отчество</h3>
    <input type="text" name="patronymic" value="<?php if(!empty($_POST['patronymic'])) {echo $_POST['patronymic'];}?>">
    <h3>Город</h3>
    <input type="text" name="city" value="<?php if(!empty($_POST['city'])) {echo $_POST['city'];}?>">
    <h3>Телефон</h3>
    <input type="text" name="telephone" value="<?php if(!empty($_POST['telephone'])) {echo $_POST['telephone'];}?>">
    <div class="error">
        <?=$errors['telephone'] ?? ''?>
    </div>
    <h3>E-mail</h3>
    <input type="text" name="Email" value="<?php if(!empty($_POST['Email'])) {echo $_POST['Email'];}?>" >
    <div class="error">
        <?=$errors['Email'] ?? ''?>
    </div>
    <h3>Логин</h3>
    <input type="text" name="login" value="<?php if(!empty($_POST['login'])) {echo $_POST['login'];}?>">
    <div class="error">
        <?=$errors['login'] ?? ''?>
    </div>
    <h3>Пароль</h3>
    <input type="password" name="password" value="<?php if(!empty($_POST['password'])) {echo $_POST['password'];}?>">
    <div class="error">
        <?=$errors['password'] ?? ''?>
    </div>
    <br>
    <input type="submit" value="Добавить" name="submit">
</form>
</body>
</html>
