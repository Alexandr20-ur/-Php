<?php

    include '../Database/DB.php';
    include 'validation.php';
    $id = $_GET['id'];
if (!isset($_POST['submit'])) {
    $user = new Database();
    $user = $user->displayRecordById($_GET['id']);
}


if (isset($_POST['submit'])) {
    $validation = new validation($_POST);
    $errors = $validation->validateForm();
    if (empty($validation->errors)) {
        $validation->database->update($_POST);
    }
}
    ?>


    <form action="" method="post">
        <h3>Имя</h3>
        <input type="text" name="name" value="<?php if(isset($_POST['submit'])) {echo $_POST['name'];} else {echo $user[0]['name'];}?>">
        <div class="error">
            <?=$errors['name'] ?? ''?>
        </div>
        <h3>Фамилия</h3>
        <input type="text" name="surname" value="<?php if(isset($_POST['submit'])) {echo $_POST['surname'];} else {echo $user[0]['surname'];}?>">
        <h3>Отчество</h3>
        <input type="text" name="patronymic" value="<?php if(isset($_POST['submit'])) {echo $_POST['patronymic'];} else {echo $user[0]['patronymic'];}?>">
        <h3>Город</h3>
        <input type="text" name="city" value="<?php if(isset($_POST['submit'])) {echo $_POST['city'];} else {echo $user[0]['city'];}?>">
        <h3>Телефон</h3>
        <input type="text" name="telephone" value="<?php if(isset($_POST['submit'])) {echo $_POST['telephone'];} else {echo $user[0]['telephone'];}?>">
        <div class="error">
            <?=$errors['telephone'] ?? ''?>
        </div>
        <h3>E-mail</h3>
        <input type="text" name="Email" value="<?php if(isset($_POST['submit'])) {echo $_POST['Email'];} else {echo $user[0]['Email'];}?>" >
        <div class="error">
            <?=$errors['Email'] ?? ''?>
        </div>
        <h3>Логин</h3>
        <input type="text" name="login" value="<?php if(isset($_POST['submit'])) {echo $_POST['login'];} else {echo $user[0]['login'];}?>">
        <div class="error">
            <?=$errors['login'] ?? ''?>
        </div>
        <h3>Пароль</h3>
        <input type="password" name="password" value="<?php if(isset($_POST['submit'])) {echo $_POST['password'];} else {echo $user[0]['password'];}?>">
        <div class="error">
            <?=$errors['password'] ?? ''?>
        </div>
        <br>
        <input type="submit" value="Добавить" name="submit">
    </form>



<?php //if(isset($_POST['submit'])) {echo $_POST[''];} else {echo $user[0][''];}?>