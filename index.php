<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Historique</title>
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
    <?php
        require_once ('connect.php');
        $req=$bdd->query("SELECT * FROM `ampoule`");
    ?>
    <table>
        <thead>
                <tr>
                    <th>Date de changement</th>
                    <th>Etage</th>
                    <th>Position</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                        foreach($req as $value) :
                    ?>
            <tr>
                <td><?= $value['date_de_changement']; ?></td>
                <td><?= $value['etage']; ?></td>
                <td><?= $value['position']; ?></td>
                <td><?= $value['prix']; ?></td>
                <td>
                    <a href="delete.php?id=<?= $value['id']; ?>">Supprimer</a>
                    <a href="live.php?id=<?= $value['id']; ?>">Modifier</a>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
    </table>
</body>
</html>