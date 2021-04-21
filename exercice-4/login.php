<?php
require '../vendor/autoload.php';
require 'config/DB.php';


session_start();


$mail = $_POST['mail'] ?? '';
$password = $_POST['password'] ?? '';
$errors = [];

if (!empty($_POST)) {

    $admin = DB::query('SELECT * FROM admin WHERE mail = :mail', ['mail' => $mail]);


    if ($admin && password_verify($password, $admin->password)) {
        $_SESSION['admin'] = $admin;
        header('Location: dashboard.php');
    } else {
        echo 'Email ou mot de passe incorrect';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <form action="" method="POST">

        <label for="mail">Mail : </label><input type="text" name="mail" id="mail">
        <?= $errors['mail'] ?? null ?>
        <label for="password">Password : </label><input type="password" name="password" id="password">
        <?= $errors['password'] ?? null ?>

        <button type="submit">Se connecter</button>

    </form>

</body>

</html>