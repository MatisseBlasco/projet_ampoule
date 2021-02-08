<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Live</title>
</head>
<body>
    <header>
            <nav>
                <ul>
                    <li><a id="index" href="index.php">Historique</a></li>
                    <li><a id="insert" href="live.php">Ajouter</a></li>
                </ul>
            </nav>
    </header>
    <form action="insert.php" method="POST">
        <fieldset>
            <?php
                if(isset($_GET['id'])) :
            ?>
                <input type="hidden" value="<?= $_GET['id']; ?>" name="id">
            <?php
                require_once('connect.php');
                $req = $bdd->prepare('SELECT `id`, `date_de_changement`, `etage`, `position`, `prix` FROM `ampoule` WHERE `id` = :id');
                $req->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
                $req->execute();
                $data = $req->fetch();
                endif;
            ?>
             <div>
                <label for="date_de_changement">Date de changement</label>
                <input type="date" name="date_de_changement" class="form" value="<?= $data ['date_de_changement'] ?? ''?>">
        </div>

        <div>
            <label for="etage">Etage</label>
            <select name="etage" class="form"  value="<?= $data ['etage'] ?? ' '?>">
                <option value="">Choisir un étage</option>
                <option value="rez-de-chaussee"  <?= (isset($data["etage"]) && $data["etage"] == "rez-de-chaussee")? "selected" : "" ?> >rez-de-chaussée</option>
                <option value="etage 1"  <?= (isset($data["etage"]) && $data["etage"] == "etage 1")? "selected" : "" ?> >étage 1</option>
                <option value="etage 2"  <?= (isset($data["etage"]) && $data["etage"] == "etage 2")? "selected" : "" ?> >étage 2</option>
                <option value="etage 3"  <?= (isset($data["etage"]) && $data["etage"] == "etage 3")? "selected" : "" ?> >étage 3</option>
                <option value="etage 4"  <?= (isset($data["etage"]) && $data["etage"] == "etage 4")? "selected" : "" ?> >étage 4</option>
                <option value="etage 5"  <?= (isset($data["etage"]) && $data["etage"] == "etage 5")? "selected" : "" ?> >étage 5</option>
                <option value="etage 6"  <?= (isset($data["etage"]) && $data["etage"] == "etage 6")? "selected" : "" ?> >étage 6</option>
                <option value="etage 7"  <?= (isset($data["etage"]) && $data["etage"] == "etage 7")? "selected" : "" ?> >étage 7</option>
                <option value="etage 8"  <?= (isset($data["etage"]) && $data["etage"] == "etage 8")? "selected" : "" ?> >étage 8</option>
                <option value="etage 9"  <?= (isset($data["etage"]) && $data["etage"] == "etage 9")? "selected" : "" ?> >étage 9</option>
                <option value="etage 10" <?= (isset($data["etage"]) && $data["etage"] == "etage 10")? "selected" : "" ?> >étage 10</option>
                <option value="etage 11" <?= (isset($data["etage"]) && $data["etage"] == "etage 11")? "selected" : "" ?> >étage 11</option>
            </select>
        </div>

        <div>
            <label for="position">Position</label>
            <select name="position" class="form" value="<?= $data 
            ['position'] ?? ' '?>">
                <option value="">Choisir une position</option>
                <option value="cote gauche"   <?= (isset($data["position"]) && $data["position"] == "cote gauche")? "selected" : "" ?> >côté gauche</option>
                <option value="cote droit"   <?= (isset($data["position"]) && $data["position"] == "cote droit")? "selected" : "" ?> >côté droit</option>
                <option value="fond"  <?= (isset($data["position"]) && $data["position"] == "fond")? "selected" : "" ?> >fond</option>
            </select> 
        </div>

        <div>
            <label for="prix">Prix</label>
            <input type="number" step="0.01" name="prix" class="form" value="<?= $data
            ['prix'] ?? ' '?>"> 
        </div>

        <div>
            <input type="submit" value="Envoyer">
        </div>
        </fieldset>
    </form>
</body>
</html>