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
        <h2>Exercice 1</h2>

        <ol>

            <!-- Question 1 -->
            <li>
            
            </li>

            <!-- Question 2 -->
            <li>
            
            </li>

            <!-- Question 3 -->
            <li>
                Javascript
            </li>

            <!-- Question 4 -->
            <li>
                String, integer, boolean, float...
                <?php
                    if(10 != 'toto'){
                        echo 'Ce ne sont pas des variables de même type';
                    }
                ?>

            </li>

            <!-- Question 5 -->
            <li>
                    <?php
                    function test($x){
                        echo $x.'</br>';
                    }
                        $noms = ['toto', 'titi', 'tata', 'tutu'];
                        echo 'Version array_map : </br>';
                        array_map('test',$noms);

                        echo 'Version foreach() : </br>';
                        foreach($noms as $nom){
                            echo $nom.'</br>';
                        }
                    ?>            
            </li>
            
            <!-- Question 6 -->
            <li>
                    ==, ===, >=,<=, >, </br>
                    <?php
                    if(5 !== 'truc'){
                        echo 'Exemple de comparaison de 5 et du string truc </br>';
                    }
                    if(6<= 10){
                        echo '6 est bien plus petit que 10 </br>';
                    }

                ?>
            
            </li>

            <!-- Question 7 -->
            <li>
            <?php
                function multiplication($x,$y){
                    return $x*$y;
                }
                $result = multiplication(5,6);
                echo $result;
            ?>            
            </li>

        </ol>

    </article>
</body>

</html>