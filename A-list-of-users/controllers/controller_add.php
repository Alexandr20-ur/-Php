<?php
function insert()
{
    if (isset($_POST['submit'])) {
        $validation = new validation($_POST);
        $errors = $validation->validateForm();
        if (empty($validation->errors)) {
            $validation->database->insert($_POST);
        }
    }
}
insert();
