<?php
$title = 'Ajout de stagiaire';

require 'partials/header.php';

function formatDate($date, $format = '%d %B %Y'){
    setlocale(LC_ALL, 'fr.utf-8');

    return strftime($format, strtotime($date));
}


$name = $_POST['name'] ?? null;
$phone = $_POST['phone'] ?? null;
$birthday = $_POST['birthday'] ?? null;
$errors = [];
$created_at = date('Y-m-d');
$stagiaire = ['created_at' => $created_at, 'name' => $name, 'phone' => $phone, 'birthday' => $birthday];

$abilities = $_POST['abilities'] ?? null;

$month = formatDate($birthday, '%m');
$day = formatDate($birthday, '%d');
$year = formatDate($birthday, '%Y');

if(!empty($_POST)){
    if(strlen($name)<2){
        $errors['name']= 'Votre nom est trop court.';
    }
    if(strlen($phone)<10){
        $errors['phone']= 'Votre numéro de téléphone n\'est pas valide.';
    }
    if ($birthday !== formatDate($birthday, '%Y-%m-%d') || !checkdate($month, $day, $year)) {

        $errors['birthday'] = 'La date n\'est pas valide';
    }
    if(empty($errors)){
        dump($stagiaire);
        dump($abilities);
        $query = DB::postQuery('INSERT INTO stagiaire (created_at, name, phone, birthday) VALUES (:created_at, :name, :phone, :birthday)', $stagiaire);

        $id = DB::lastInsertId();

        if(!empty($abilities)){
            foreach($abilities as $ability){
                $query = DB::postQuery('INSERT INTO stagiaire_has_competence (stagiaire_id, competence_id) VALUES (:stagiaire_id, :competence_id)', ['stagiaire_id'=>$id, 'competence_id'=>intval($ability)]);
            }
        }

        header('Location add-staigiare');
    }

}

$competences = DB::query('SELECT * FROM competence');


?>



<form action="" method="POST">
<fieldset>
<legend>Infos Stagiaire</legend>
<label for="name">Nom du stagiaire : </label><input type="text" name="name" id="name" value="<?= $name ?? null ?>"> <?= $errors['name'] ?? null ?> </br>
<label for="phone">Numéro de téléphone : </label><input type="text" name="phone" id="phone" value="<?= $phone ?? null ?>"> <?= $errors['phone'] ?? null ?> </br>
<label for="birthday">Date de naissance : </label><input type="date" name="birthday" id="birthday" value="<?= $birthday ?? null ?>"> <?= $errors['birthday'] ?? null ?> </br>
</fieldset>

<fieldset>
<legend>Compétences</legend>
<?php
foreach($competences as $competence){?>
<label for="<?=$competence->ability?>"><?=$competence->ability?></label><input type="checkbox" name="abilities[]" id="<?=$competence->ability?>" value="<?=$competence->id ?>"></br>
<?php
}?>
</fieldset>



</label>
<?= $errors['stagiaire'] ?? null ?>

<button type="submit">Ajouter stagiaire</button>
</form>
    
</body>
</html>