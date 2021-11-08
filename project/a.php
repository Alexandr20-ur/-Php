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
    <style>
        form {
            font-size: 26px;
        }
        input, button {
            display: block;
            margin-bottom: 5px;
        }

    </style>

        <div>
            <b>A</b> и <a href="b.php">Б</a> сидели на трубе.
            <br>
            <br>
            Вы вошли как <b><?php echo $username; ?></b> | <a href="index.php">Выход</a>
        </div>

    <div>
            <form action="core/upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="image">
                <button type="submit">Upload</button>
            </form>
        </div>


    </body>
</html>

