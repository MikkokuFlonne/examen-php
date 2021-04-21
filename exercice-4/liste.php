<?php
require '../vendor/autoload.php';
require 'config/DB.php';


$trainees = DB::query('SELECT * from stagiaire');
$abilities = DB::query('SELECT * from competence');
?>

<table>
    <?php
    foreach ($trainees as $key => $trainee) {
        if ($key == 0) { ?>
            <tr>
                <?php foreach ($trainee as $prop => $props) { ?>
                    <th>
                        <?= $prop ?>
                    <?php } ?></th>
                    <th>Nombre de compétences</th>
                <?php
            } ?>
            </tr>

            <tr>

                <td><?= $trainee->id ?></td>
                <td><?= $trainee->created_at ?></td>
                <td><?= $trainee->name ?></td>
                <td><?= $trainee->phone ?></td>
                <td><?= $trainee->birthday ?></td>
                <td><?= countAbility($trainee->name)?></td>
            </tr>
        <?php
    } ?>
</table>

<table>
    <?php
    foreach ($abilities as $key => $ability) {
        if ($key == 0) { ?>
            <tr>
                <?php foreach (get_object_vars($ability) as $key => $competence) { ?>

                    <th><?= $key ?></th>

                <?php
                } ?>
            <?php
        } ?>
            </tr>

            <tr>

                <td><?= $ability->id ?></td>
                <td><?= $ability->ability ?></td>

            </tr>
        <?php
    } ?>
</table>

<?php
    function countItem($table){
        $count = DB::query('SELECT COUNT(*) as count FROM '.$table);
        if($count->count> 1){
            $item = $table.'s';
        }else{
            $item = $table;
        }
        return "Il y a $count->count $item dans la BDD. </br>";
    }
    echo countItem('stagiaire');
    echo countItem('competence');

    function countAbility($name){
        $count = DB::query('SELECT COUNT(*) as count FROM stagiaire_has_competence as stag
        INNER JOIN stagiaire ON stagiaire.id = stag.stagiaire_id AND name = :name', ['name' => $name]);
        if($count->count> 1){
            $item = 'compétences';
        }else{
            $item = 'compétence';
        }
        return "$name a $count->count $item";
    }

    $felicia = DB::query('SELECT * from stagiaire where name = :name', ['name'=>'Félicia']);
    echo countAbility('Félicia');

    function stagiaireHasCompetence($competences){

        $query = 'SELECT * from stagiaire 
        INNER JOIN stagiaire_has_competence as stag ON stag.stagiaire_id = stagiaire.id 
        INNER JOIN competence ON competence.id = stag.competence_id 
        ';
        $where = '';
        if(count($competences)> 1){

            foreach($competences as $index=> $competence){
                if($index == 0){
                    $where = 'WHERE competence.ability = :competence'.$index;
                }else{
                    $where .= ' OR competence.ability = :competence'.$index;
                }
                $ability["competence$index"] = $competence;
            }
            $query .= $where;
            dump($ability);
            dump($query);
            
        }else{       
            
            $where = 'WHERE competence.ability = :competence ';
            $query .= $where;
            dump($query);
            $ability = $competences;
            dump($ability);
        }

        $stagiaires = DB::query($query, $ability);

        dump($stagiaires);
        $results = '';
        $comp = '';
        if(count($stagiaires)>0){
            foreach($stagiaires as $index => $stagiaire){
                if($index == 0){
                    $results .= $stagiaire->name;
                    $comp .= $stagiaire->ability;
                }
            }
        }
    }
    
    echo stagiaireHasCompetence(['javascript', 'react', 'SQL']);
    
?>