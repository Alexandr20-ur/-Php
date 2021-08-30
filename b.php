<?php
/*
 * Точка входа.
 */

session_start();

/*
 * Если контекст сессии не установлено имя польщователя или пароль, пытаемся взять его
 * из cookies.
 */

if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}

$username = $_SESSION['username'];

if (!isset($_SESSION['password']) && isset($_COOKIE['password'])) {
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
    <title>Страница Б</title>
</head>
<body>
<a href="a.php">A</a> и <b>Б</b> сидели на трубе.
<br>
<br>
Вы вошли как <b><?php echo $username; ?></b> | <a href="index.php">Выход</a>
</body>
</html>

