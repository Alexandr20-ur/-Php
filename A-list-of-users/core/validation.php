<?php
class validation
{
    public $data;
    public $errors = [];
    public static $fields = [];
    public $database;

    public function __construct($post_data)
    {
        $this->fields = $_POST;
        $this->data = $post_data;
        $this->database = new Database();
    }

    public function validateForm()
    {
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validateName();
        $this->validateEmail();
        $this->validateLogin();
        $this->validateTelephone();
        $this->validatePassword();
        return $this->errors;

    }

    public function validateName()
    {
        $val = trim($this->data['name']);

        if(empty($val)) {
            $this->addError('name','имя не передано');
            $flag = 1;
        } else {
            if(!preg_match('/^([А-ЯЁ]{1}[а-яё]{3,12})$/u', $val)) {
                $this->addError('name', 'имя не корректно');
                $flag = 1;
            }
        }
    }

    public function validateTelephone()
    {
        $val = trim($this->data['telephone']);

        if(empty($val)) {
            $flag = 1;
            $this->addError('telephone','телефон не указан');
        } else {
            if(!preg_match('/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/', $val)) {
                $flag = 1;
                $this->addError('telephone', 'не корректные данные');
            }
        }
    }

    public function validateEmail()
    {
        $val = trim($this->data['Email']);

        if(empty($val)) {
            $flag = 1;
            $this->addError('Email','Email не указан');
        } else {
            if(!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $flag = 1;
                $this->addError('Email', 'Email не корректный');
            }
        }
    }

    public function validateLogin()
    {
        $val = trim($this->data['login']);

        if(empty($val)) {
            $flag = 1;
            $this->addError('login','логин не указан');
        } else {
            if(!preg_match('/^[A-Z]{1}[Aa-zA0-9]{4,20}$/', $val)) {
                $flag = 1;
                $this->addError('login', 'login не корректный');
            }
        }
    }

    public function validatePassword()
    {
        $val = trim($this->data['password']);

        if(empty($val)) {
            $flag = 1;
            $this->addError('password','пароль не указан');
        } else {
            if(!preg_match('/^[A-Z]{1}[a-zA-Z0-9]{6,12}$/', $val)) {
                $flag = 1;
                $this->addError('password', 'Пароль не корректный');
            }
        }

    }

    public function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}