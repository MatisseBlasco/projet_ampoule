<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajouter.css">
    <title>Ajouter</title>
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
    <form action="ajouter.php" method="POST">

        <div>
            <label for="date_de_changement">Date de changement</label>
            <input type="date" id="date_de_changement" name="date_de_changement"> 
        </div>

        <div>
            <label for="etage">Etage</label>
            <select name="etage" id="etage_select">
                <option value="">Choisir un étage</option>
                <option value="rez-de-chaussee">rez-de-chaussée</option>
                <option value="etage 1">étage 1</option>
                <option value="etage 2">étage 2</option>
                <option value="etage 3">étage 3</option>
                <option value="etage 4">étage 4</option>
                <option value="etage 5">étage 5</option>
                <option value="etage 6">étage 6</option>
                <option value="etage 7">étage 7</option>
                <option value="etage 8">étage 8</option>
                <option value="etage 9">étage 9</option>
                <option value="etage 10">étage 10</option>
                <option value="etage 11">étage 11</option>
            </select>
        </div>

        <div>
            <label for="position">Position</label>
            <select name="position" id="position_select">
                <option value="">Choisir une position</option>
                <option value="cote gauche">côté gauche</option>
                <option value="cote droit">côté droit</option>
                <option value="fond">fond</option>
            </select> 
        </div>

        <div>
            <label for="prix">Prix</label>
            <input type="number" step="0.01" id="prix" name="prix"> 
        </div>

        <div>
            <input type="submit" value="Ajouter">
        </div>
    </form>

    <?php
    if (isset($_POST["date_de_changement"])) {

        $servername = "localhost";
        $dataname = "projet_ampoule";
        $user = "root";
        $date_de_changement = $_POST ["date_de_changement"];
        $etage = $_POST ["etage"];
        $position = $_POST ["position"];
        $prix = $_POST ["prix"];
    
        try {
            $connect = new PDO("mysql:host=$servername; dbname=$dataname", $user);
            if (!empty($date_de_changement) && !empty($etage) && !empty($position) && !empty($prix)) {
                $variable = $connect->prepare ("INSERT INTO ampoule (date_de_changement, etage, position, prix) VALUES (:date_de_changement, :etage, :position, :prix)");
                $variable->bindParam(':date_de_changement', $date_de_changement);
                $variable->bindParam(':etage', $etage);
                $variable->bindParam(':position', $position);
                $variable->bindParam(':prix', $prix);
                $variable->execute();
            }
        }
    
        catch (PDOException $e) {
            echo "Erreur : ". $e->getMessage();
        }
    }
    ?>
</body>
</html>