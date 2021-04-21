<?php
require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 3</title>
</head>

<body>

    <article>
        <ol>
            <!-- Question 1 -->
            <li>
                La POO permet de définir des propriétés et méthodes réutilisables pour chaque instaciation d'objets, elle permet d'économiser et simplifier l'écriture du code et déviter d'avoir des redondances. La POO nécéssite en revanche une meilleure organisation en amont des différents dossiers et fichier afin d'appeler chaque classe facilement.

                Le style procédural est pratique lorsqu'on veut une variable unique ou une méthode qu'on n'utilisera que dans certains cas. Elle est en revanche redondante de par sa nature.
            </li>

            <!-- Question 2 -->
            <li>
            $objet = new Classe();
            
            </li>

            <!-- Question 3 -->
            <li>
            Il sert à définir les différentes propriétés d'un objet.
            </li>

            <!-- Question 4 -->
            <li>
            Un getter sert à récupérer les propriétés d'un objet.
            Un setter sert à modifier les propriétées d'un objet.
            
            </li>

            <!-- Question 5 -->
            <li>
            Si la méthode ou propriété est public, on peut alors y accéder à l'intérieur et à l'extérieur de la classe.
            Si elle est private elle n'est alors accessible qu'au sein de la classe.
            
            </li>

            <!-- Question 6 -->
            <li>
            Il permet d'utiliser les méthodes et propriété d'une classe 'parent' à ses classes 'enfants' qui par exemple ont des méthodes/props communes.</br>
            Class Animal</br>
            Class Cat extends Animal
            
            </li>

            <!-- Question 7 -->
            <li>
            L'interface permet de forcer une classe à utiliser d'autres méthodes. Le mot-clé est implements.
            </li>

            <!-- Question 8 -->
            <li>
            
            </li>

            <!-- Question 9 -->
            <li>
            Les méthodes magiques sont des méthodes spéciales qui écrase l'action par défaut de PHP quand certaines actions sont réalisées sur un objet. 
            __construct() permet de construire l'objet.
            __clone() permet d'intéragir avec un objet déjà existant sans pour autant le modifier directement vu qu'il s'agirait d'un clone.
            
            </li>

            <!-- Question 10 -->
            <li>
            ($objet instanceof Classe)
            
            </li>

            <!-- Question 11 -->
            <li>
            <a href="src/Stagiaire.php">Classe Stagiaire</a>
            
            </li>

            <!-- Question 12 -->
            <li>
            <?php
                spl_autoload_register(function ($class) {
                    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
                
                    require_once __DIR__.'/src/'.$class.'.php';
                });

                $titi = new Stagiaire('titi', '0123456789', '1993-07-01');
                $tata = new Stagiaire('tata', '0123456789', '1993-07-01');
                $toto = new Stagiaire('toto', '0123456789', '1993-07-01');
                $tutu = new Stagiaire('tutu', '0123456789', '1993-07-01');

            ?>
            
            
            </li>

            <!-- Question 13 -->
            <li>

            <?php
                var_dump($titi);
                var_dump($tata);
                var_dump($toto);
                var_dump($tutu);
            ?>
            
            </li>

            <!-- Question 14 -->
            <li>
            Composer est un outil permettant de gérer les dependency en php. Il permet la déclaration des librairie dont un projet dépend et gérera leur installation et mise à jour.
            </li>

            <!-- Question 15 -->
            <li>
            <?php
                dump($titi);
            ?>
            </li>
        </ol>
    </article>

</body>

</html>