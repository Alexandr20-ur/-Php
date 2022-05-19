<?php
    $users = new Database();
    $users->displayRecordById($_GET['id']);

    foreach ($users->displayRecordById($_GET['id']) as $user) {
        ?>
        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['surname']; ?></td>
            <td><?= $user['name']; ?></td>
            <td><?= $user['patronymic']; ?></td>
            <td><?= $user['city']; ?></td>
            <td><?= $user['Email']; ?></td>
            <td><?= $user['login']; ?></td>
            <td><a href="../controllers/controller_del_user.php?id=<?= $user['id'];?>">Да</a></td>
            <td><a href="index.php">Нет</a></td>

        </tr>
        <?php

    }