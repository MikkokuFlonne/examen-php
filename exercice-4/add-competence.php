<?php
$title = 'Ajout de compétence';

require 'partials/header.php';

dump($_POST);
$competence = $_POST['competence'] ?? null;
$errors = [];

if(!empty($_POST)){
    if(strlen($competence)< 2){
        $errors['competence'] = 'La compétence n\'est pas valide';
    }

    if(empty($errors)){
        $query = DB::postQuery('INSERT into competence (ability) VALUES (:ability)', ['ability'=>$competence]);

        header('Location: add-competence.php');
    }
}

$stagiaire = DB::query('SELECT * FROM stagiaire');
dump($stagiaire);

?>



<form action="" method="POST">
<label for="competence">Nom de la compétence : </label><input type="text" name="competence" id="competence">
<?= $errors['competence'] ?? null ?>

<button type="submit">Ajouter compétence</button>
</form>
    
</body>
</html>