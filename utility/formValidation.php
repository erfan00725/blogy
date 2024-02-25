<?php

function validation(array $fields) {
    foreach ($fields as $field) {
        if (!array_key_exists($field, $_POST) && empty($_POST)) {
            return false;
        }
        else{
            continue;
        }
    }
    return true;
}