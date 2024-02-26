<?php 

function sessionStart(){
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }
}

function isAuthorized(string $role = null): bool
{
    if (isset($_SESSION['role'])) {
        if ($role === null) {
            return true;
        }
        return $_SESSION['role'] === $role;
    }
    return false;

}

function requireFields(array $fields) {
    // var_dump($_POST);
    // echo "<br>";
    // var_dump($_FILES);
    // echo "<br>";

    if (empty($_FILES['image'])) {
        return false;
    }
    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            return false;
        }
        else{
            continue;
        }
    }
    return true;
}