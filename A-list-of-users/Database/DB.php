<?php
class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'list_of_users';
    public $connect;

    public function __construct()
    {
        $this->connect = new mysqli($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("error connect");
        } else {
            return $this->connect;
        }
    }

    public function insert($post)
    {
        $id = $this->connect->real_escape_string($_GET['id']);
        $name = $this->connect->real_escape_string($_POST['name']);
        $surname = $this->connect->real_escape_string($_POST['surname']);
        $patronymic = $this->connect->real_escape_string($_POST['patronymic']);
        $city = $this->connect->real_escape_string($_POST['city']);
        $telephone = $this->connect->real_escape_string($_POST['telephone']);
        $Email = $this->connect->real_escape_string($_POST['Email']);
        $login = $this->connect->real_escape_string($_POST['login']);
        $password = $this->connect->real_escape_string($_POST['password']);
        $query =("INSERT INTO `users` (`id`,`name`, `surname`, `patronymic`, `city`, `telephone`, `Email`, `login`, `password`) VALUES (NULL, '$name', '$surname', '$patronymic', '$city', '$telephone', '$Email', '$login', '$password')");
        $sql = $this->connect->query($query);
        if ($sql == true) {
            header("Location: ../index.php");
        } else {
            echo 'Failed';
        }
    }

    public function display()
    {

        $query = ("SELECT * FROM `users` ORDER BY `surname` ASC, `name` ASC, `patronymic` ASC");
        $result = $this->connect->query($query);
        if ($result->num_rows >= 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function displayRecordById($id)
    {
        $query = "SELECT * FROM `users` WHERE id = '$id'";
        $result = $this->connect->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo 'Not Found';
        }
    }

    public function update($postData)
    {
        $id = $this->connect->real_escape_string($_GET['id']);
        $name = $this->connect->real_escape_string($_POST['name']);
        $surname = $this->connect->real_escape_string($_POST['surname']);
        $patronymic = $this->connect->real_escape_string($_POST['patronymic']);
        $city = $this->connect->real_escape_string($_POST['city']);
        $telephone = $this->connect->real_escape_string($_POST['telephone']);
        $Email = $this->connect->real_escape_string($_POST['Email']);
        $login = $this->connect->real_escape_string($_POST['login']);
        $password = $this->connect->real_escape_string($_POST['password']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE `users` SET `name` = '$name', `surname` = '$surname', `patronymic` = '$patronymic', `city` = '$city', `telephone` = '$telephone', `Email` = '$Email', `login` = '$login', `password` = '$password' WHERE `users`.`id` = '$id'";
            $update = $this->connect->query($query);
            if ($update == true) {
                header("Location: ../index.php");
            } else {
                echo 'failed';
            }
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM `users` WHERE `users`.`id` = '$id'";
        $sql = $this->connect->query($query);
        if ($sql == true) {
            header("Location: ../index.php");
        } else {
            echo 'Failed';
        }
    }
}
//
//$mysqli = new mysqli('localhost', 'root', '', 'list_of_users');
//$mysqli->query("SET NAMES 'utf8'");
//if (!$mysqli) {
//    die('Error connect');
//}
//$name = $_POST['name'];
//$surname = $_POST['surname'];
//$patronymic = $_POST['patronymic'];
//$city = $_POST['city'];
//$telephone = $_POST['telephone'];
//$Email = $_POST['Email'];
//$login = $_POST['login'];
//$password = $_POST['password'];