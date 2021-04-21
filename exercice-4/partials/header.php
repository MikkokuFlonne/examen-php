<?php
require '../vendor/autoload.php';
require 'config/DB.php';

session_start();

function isAdmin(){
    $admins = DB::query('SELECT * FROM admin');
    foreach ($admins as $admin) {
        if ($_SESSION['admin']->mail == $admin->mail) {
            return true;
        }
    }
}

if (!isAdmin()) {
    require '403.php';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<body>

