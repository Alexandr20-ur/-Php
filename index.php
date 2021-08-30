<?php
    // Имя и пароль не должны быть пустой строкой.
    function Login($username, $password, $remember) {
        if (empty($username) || empty($password)) {
            return false;
        }

    // Запоминаем имя и пароль в сессии.
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

    // и в cookies, если пользователь пожелал запомнить его ( на неделю)
        if ($remember) {
            setcookie('username', $username, time() + 3600 * 24 * 7);
            setcookie('password', $password, time() + 3600 * 24 * 7);
        }
    // Успешная авторизация
        return true;
    }

    function Logout() {
        setcookie ('username', '', time() - 1);
        setcookie('password', '', time() - 1);

        unset ($_SESSION['username']);
        unset ($_SESSION['password']);
    }
/*
 *  Точка входа.
 */

session_start();
$enter_site = false;

// Попадая на страницу index.php, авторизация сбрасывается
Logout();

//Если массив POST не пуст, значит, обрабатываем отправку формы.
if (count($_POST) > 0) {
    $enter_site = Login($_POST['username'], $_POST['password'], $_POST['remember'] == 'on');
}

/*
 *  Если авторизация пройдена, переадресуем пользователя
 *  на одну из страниц сайта.
 */

if ($enter_site) {
    header("Location: a.php");
    exit();
}
?>

<!doctype html>
<html lang="ru">
<head>
    <title>Страница авторизации</title>
</head>
<body>
<form action="/" method="post">
    Логин:
    <br>
    <label>
        <input type="text" name="username" />
    </label>
    <br>
    Пароль:
    <br>
    <label>
        <input type="password" name="password" />
    </label>
    <br>
    <label>
        <input type="checkbox" name="remember" />
    </label> Запомнить меня
    <br>
    <input type="submit" value="Войти" name="log_in" />
</form>
</body>
</html>
