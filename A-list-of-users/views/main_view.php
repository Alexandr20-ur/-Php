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
    <?php include 'controllers/controller_main.php';?>
</table>

<button name="Adding" type="submit"><a href="views/add_view.php">Добавить</a>
</button>

</body>
</html>