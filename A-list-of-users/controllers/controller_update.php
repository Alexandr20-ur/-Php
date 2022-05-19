<?php
function display()
{
    $id = $_GET['id'];
    if (!isset($_POST['submit'])) {
        $user = new Database();
        $user = $user->displayRecordById($_GET['id']);
    }
    return $user;
}
function update()
{
    if (isset($_POST['submit'])) {
        $validation = new validation($_POST);
        $errors = $validation->validateForm();
        if (empty($validation->errors)) {
            $validation->database->update($_POST);
        }
    }
}
update();
