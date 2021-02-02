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

    <p><a href="ajouter.php"> Ajouter </a></p>

    <table>
        <tr>
            <th>Id</th>
            <th>Date de changement</th>
            <th>Etage </th>
            <th>Position</th>
            <th>Prix</th>
        </tr>
    </table>

<?php
    define('DATABASE', 'projet_ampoule');
    define('USER', 'root');
    define('PWD', '');
    define('HOST', 'localhost');
        
        try {
                $dbh = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
        $sql = 'SELECT id, date_de_changement, etage, position, prix FROM ampoule';
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $datas = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach( $datas as $data){
            echo'<tr>';
                echo'<td>'.$data['id'].'</td>';
                echo'<td>'.$data['date_de_changement'].' </td>';
                echo'<td>'.$data['etage'].' </td>';
                echo'<td>'.$data['position'].' </td>';
                echo'<td>'.$data['prix'].'</td>';
                echo '<td><a href="edit.php?edit=1&id='.$data['id'].'">Modifier</a> <a href="delete.php?id='.$data['id'].'">Supprimer<a><td>';
            echo '</tr>';
        }

        // $intlDateFormatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);
    ?>

</body>
</html>