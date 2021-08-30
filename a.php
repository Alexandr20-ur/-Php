<?php
/*
 * Точка входа.
 */

session_start();

/*
 * Если контекст сессии не установлено имя польщователя или пароль, пытаемся взять его
 * из cookies.
 */

if (!isset($_SESSION['username']) && empty($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}

$username = $_SESSION['username'];

if (!isset($_SESSION['password']) && empty($_COOKIE['password'])) {
    $_SESSION['password'] = $_COOKIE['password'];
}

$password = $_SESSION['password'];

if ($username == null || $password == null) {
    header ("Location: index.php");
    exit();
}

?>

<html lang="ru">
    <head>
        <title>Страница А</title>
    </head>
    <body>
    <b>A</b> и <a href="b.php">Б</a> сидели на трубе.
    <br>
    <br>
    Вы вошли как <b><?php echo $username; ?></b> | <a href="index.php">Выход</a>
    </body>
</html>

