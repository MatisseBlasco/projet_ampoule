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
                    <li><a id="insert" href="live.php">Gestion</a></li>
                </ul>
            </nav>
    </header>
    <?php
        require_once ('connect.php');
        $req=$bdd->query("SELECT * FROM `ampoule`");
    ?>
    <table class="content-table">
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
                    <a href="live.php?id=<?= $value['id']; ?>"><img src="../projet_ampoule/medias/icone.modifier.png" alt="Modifier" id="img-edit"></a></a>
                    <a href="delete.php?id=<?= $value['id']; ?>"onclick="return confirm('Etes-vous sûr de vouloir supprimer cette entrée ?');"><img src="../projet_ampoule/medias/icone.supprimer.png" alt="Supprimer" id="img-delete"></a>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
    </table>
</body>
</html>