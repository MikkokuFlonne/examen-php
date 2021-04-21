<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 2</title>
</head>

<body>
    <article>
        <h2>Exercice 2</h2>
        <ol>
            <!-- Question 1 -->
            <li>
                MySql sert à gérer une base de données.
            </li>

            <!-- Question 2 -->
            <li>
                <ul>
                    <li>La base de données est gérée coté serveur et renvoie les informations demandées via un script coté client. Les données sont supprimées quand on en fait la requête SQL.</li>
                    <li>
                        <?php setcookie('Félicia-cookie')  ?>

                        Un cookie est une espèce de token qui est généré à l'arrivée sur une page et permet d'enregistré diverses informations sur l'utilisateur. Par défaut il est supprimé à la fermeture du navigateur mais on peut lui assigner une durée de vie.</li>
                    <li>Les variables de sessions sont générées et enregistré coté client quand on se connecte via la fonction session_start(). Les informations disparaissent quand on se déconnecte.</li>
                </ul>

            </li>

            <!-- Question 3-->
            <li>

                Requête SQL pour la création de la table stagiaire (id, name, created_at, phone, birthday) : </br>
                CREATE TABLE `exam_m2i`.`stagiaire` ( `id` INT NOT NULL AUTO_INCREMENT , `created_at` DATE NOT NULL , `name` VARCHAR(255) NOT NULL , `phone` VARCHAR(255) NOT NULL , `birthday` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = INNODB;

            </li>

            <!-- Question 4 -->
            <li>
                <?php

                $db = new PDO('mysql:host=localhost;dbname=exam_m2i;charset=UTF8', 'root', '', [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
                ?>
                Script : </br>


                $db = new PDO('mysql:host=localhost;dbname=exam_m2i;charset=UTF8', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);

            </li>

            <!-- Question 5 -->
            <li>
                <?php

                $names= ['tata', 'titi', 'toto', 'tutu', 'tintin'];
                $stagiaires = [];

                // //Script d'insert de base
                // $query = $db->prepare('INSERT INTO stagiaire (created_at, name, phone, birthday) VALUES (:created_at, :name, :phone, :birthday)');
                // $query->bindValue(':created_at', $created_at);
                // $query->bindValue(':name', $name);
                // $query->bindValue(':phone', $phone);
                // $query->bindValue(':birthday', $birthday);
                // $query->execute();

                // Création d'un tableau de stagiaire avec des données générées aléatoirement.
                foreach ($names as $name) {
                    $phone = '';
                    for ($i = 0; $i < 10; $i++) {
                        if ($i == 0) {
                            $phone .= '0';
                        } else {
                            $phone .= rand(0, 9);
                        }
                    }
                    $birthday = date('Y-m-d', rand(1262055681, 1598055681));
                    $created_at = date('Y-m-d');
                    
                    $stagiaires[] = ['created_at' => $created_at, 'name' => $name, 'phone' => $phone, 'birthday' => $birthday];

                }

                // Script d'insert des stagiaires, décommenter le code pour le lancer.
                // foreach($stagiaires as $stagiaire){
                //     $query = $db->prepare('INSERT INTO stagiaire (created_at, name, phone, birthday) VALUES (:created_at, :name, :phone, :birthday)');
                //     $query->bindValue(':created_at', $stagiaire['created_at']);
                //     $query->bindValue(':name', $stagiaire['name']);
                //     $query->bindValue(':phone', $stagiaire['phone']);
                //     $query->bindValue(':birthday', $stagiaire['birthday']);
                //     $query->execute();
                // }

                $query = $db->query('SELECT * from stagiaire');
                $trainees = $query->fetchAll();
                ?>
                <table>
                <?php
                foreach($trainees as $key => $trainee){
                    if ($key == 0) { ?>
                        <tr>
                        <?php foreach($trainee as $prop=>$props){?>
                                <th>
                                    <?= $prop?>
                                <?php } ?></th>
                    <?php
                    }?>
                        </tr>
        
                    <tr>
        
                        <td><?= $trainee['id'] ?></td>
                        <td><?= $trainee['created_at'] ?></td>
                        <td><?= $trainee['name'] ?></td>
                        <td><?= $trainee['phone'] ?></td>
                        <td><?= $trainee['birthday'] ?></td>
                    </tr>
                <?php
                }?>
                </table>

            </li>
        </ol>

    </article>

</body>

</html>