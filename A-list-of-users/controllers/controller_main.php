<?php
$users = new Database();
$users->display();
foreach ($users->display() as $user) {
    ?>
    <tr>
        <td><?= $user['id']; ?></td>
        <td><?= $user['surname']; ?></td>
        <td><?= $user['name']; ?></td>
        <td><?= $user['patronymic']; ?></td>
        <td><?= $user['city']; ?></td>
        <td><?= $user['Email']; ?></td>
        <td><?= $user['login']; ?></td>
        <td><a href="views/update_view.php?id=<?= $user['id'];?>">Изменить пост</a></td>
        <td><a href="views/delete_view.php?id=<?= $user['id'];?>">Удалить пост</a></td>

    </tr>
    <?php

}
?>