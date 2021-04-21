<?php
$title = 'Ajout d\'admin';

require 'partials/header.php';


dump($_POST);
$mail = $_POST['mail'] ?? null;
$password = $_POST['password'] ?? null;
$passwordVerif = $_POST['passwordVerif'] ?? null;
$errors = [];

if(!empty($_POST)){
    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $errors['mail'] = 'Le mail n\'est pas valide';
    }
    if (strlen($password) < 6) {
        $errors['password'] = 'Le mot de passe est trop court';
    }
    
    $admin=DB::query('SELECT * from admin WHERE mail = :mail', ['mail'=>$mail]);

    if ($admin) {
        $errors['email'] = 'L\'email existe déjà';
    }

    if ($password !== $passwordVerif) {
        $errors['password'] = 'Les mots de passe ne correspondent pas';
    }

    if(empty($errors)){
        $query = DB::postQuery('INSERT into admin (mail, password) VALUES (:mail, :password)', ['mail' => $mail, 'password' => password_hash($password, PASSWORD_DEFAULT)]);

        header('Location: add-admin.php');
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout admin</title>
</head>
<body>

<form action="" method="POST">
<label for="mail">Mail : </label><input type="text" name="mail" id="mail">
<?= $errors['mail'] ?? null ?>
<label for="password">Password : </label><input type="password" name="password" id="password">
<?= $errors['password'] ?? null ?>
<label for="passwordVerif">Password : </label><input type="password" name="passwordVerif" id="passwordVerif">
<?= $errors['passwordVerif'] ?? null ?>

<button type="submit">Ajouter admin</button>
</form>
    
</body>
</html>