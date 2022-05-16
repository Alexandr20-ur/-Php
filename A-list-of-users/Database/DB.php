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

//class validation
//{
//    public $data;
//    public $errors = [];
//    public static $fields = [];
//    public $database;
//
//    public function __construct($post_data)
//    {
//        $this->fields = $_POST;
//        $this->data = $post_data;
//        $this->database = new Database();
//    }
//
//    public function validateForm()
//    {
//        foreach (self::$fields as $field) {
//            if (!array_key_exists($field, $this->data)) {
//                trigger_error("$field is not present in data");
//                return;
//            }
//        }
//
//        $this->validateName();
//        $this->validateEmail();
//        $this->validateLogin();
//        $this->validateTelephone();
//        $this->validatePassword();
//        return $this->errors;
//
//    }
//
//    public function validateName()
//    {
//        $val = trim($this->data['name']);
//
//        if(empty($val)) {
//            $this->addError('name','имя не передано');
//            $flag = 1;
//        } else {
//            if(!preg_match('/^([А-ЯЁ]{1}[а-яё]{4,12})$/u', $val)) {
//                $this->addError('name', 'имя не корректно');
//                $flag = 1;
//            }
//        }
//    }
//
//    public function validateTelephone()
//    {
//        $val = trim($this->data['telephone']);
//
//        if(empty($val)) {
//            $flag = 1;
//            $this->addError('telephone','телефон не указан');
//        } else {
//            if(!preg_match('/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/', $val)) {
//                $flag = 1;
//                $this->addError('telephone', 'не корректные данные');
//            }
//        }
//    }
//
//    public function validateEmail()
//    {
//        $val = trim($this->data['Email']);
//
//        if(empty($val)) {
//            $flag = 1;
//            $this->addError('Email','Email не указан');
//        } else {
//            if(!filter_var($val, FILTER_VALIDATE_EMAIL)) {
//                $flag = 1;
//                $this->addError('Email', 'Email не корректный');
//            }
//        }
//    }
//
//    public function validateLogin()
//    {
//        $val = trim($this->data['login']);
//
//        if(empty($val)) {
//            $flag = 1;
//            $this->addError('login','логин не указан');
//        } else {
//            if(!preg_match('/^[A-Z]{1}[Aa-zA0-9]{4,20}$/', $val)) {
//                $flag = 1;
//                $this->addError('login', 'login не корректный');
//            }
//        }
//    }
//
//    public function validatePassword()
//    {
//        $val = trim($this->data['password']);
//
//        if(empty($val)) {
//            $flag = 1;
//            $this->addError('password','пароль не указан');
//        } else {
//            if(!preg_match('/^[A-Z]{1}[a-zA-Z0-9]{6,12}$/', $val)) {
//                $flag = 1;
//                $this->addError('password', 'Пароль не корректный');
//            }
//        }
//
//    }
//
//    public function addError($key, $val)
//    {
//    $this->errors[$key] = $val;
//    }
//}
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
