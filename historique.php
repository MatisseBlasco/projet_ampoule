<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="historique.css">
    <title>Historique</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="historique.php">Historique</a></li>
                <li><a href="ajouter.php">Ajouter</a></li>
            </ul>
        </nav>
    </header>

    <?php
        $servername= "localhost";
        $dataname= "projet_ampoule";
        $user ="root";
        try{
            $connect = new PDO("mysql:host=$servername; dbname=$dataname", $user);
        }
        catch (PDOException $e){
            echo "Erreur :". $e->getMessage();
        }
        $ampoule=$connect->query("SELECT date_de_changement FROM ampoule"); 
        $ampoule2=$connect->query("SELECT etage FROM ampoule"); 
        $ampoule3=$connect->query("SELECT position FROM ampoule"); 
        $ampoule4=$connect->query("SELECT prix FROM ampoule"); 
    ?>
    

    <div>
    <p>Date de changement</p>
        <div>
        <?php foreach($ampoule as $value) : ?>
        <?= $value['date_de_changement']; ?>
        <?php endforeach; ?>
        </div>
    </div>

    <div>
    <p>Etage</p>
        <div>
        <?php foreach($ampoule2 as $value2) : ?>
        <?= $value2['etage']; ?>
        <?php endforeach; ?>
        </div>
    </div>

    <div>
    <p>Position</p>
        <div>
        <?php foreach($ampoule3 as $value3) : ?>
        <?= $value3['position']; ?>
        <?php endforeach; ?>
        </div>
    </div>

    <div>
    <p>Prix</p>
        <div>
        <?php foreach($ampoule4 as $value4) : ?>
        <?= $value4['prix']; ?>
        <?php endforeach; ?>
        </div>
    </div>


</body>
</html>