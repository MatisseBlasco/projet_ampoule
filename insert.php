<?php
require_once('connect.php'); 

if(isset($_POST['date_de_changement'])) {
    
    $date_de_changement = $_POST['date_de_changement'];
    $etage = $_POST['etage'];
    $position = $_POST['position'];
    $prix = $_POST['prix'];
    if(isset($_POST['id'])){
        $req = $bdd->prepare('UPDATE ampoule SET date_de_changement = :date_de_changement, etage = :etage, position=:position, prix=:prix WHERE id=:id');
        $req->bindParam(':id', $_POST['id']);
        $req->bindParam(':date_de_changement', $date_de_changement);
        $req->bindParam(':etage', $etage);
        $req->bindParam(':position', $position);
        $req->bindParam(':prix', $prix);
        $req->execute();
  
    }   else {
            $req = $bdd->prepare('INSERT INTO `ampoule` (`date_de_changement`, `etage`, `position`, `prix`)
        VALUES (:date_de_changement, :etage, :position, :prix)');
        $req->bindParam(':date_de_changement', $date_de_changement, PDO::PARAM_STR);
        $req->bindParam(':etage', $etage, PDO::PARAM_STR);
        $req->bindParam(':position', $position, PDO::PARAM_STR);
        $req->bindParam(':prix', $prix, PDO::PARAM_STR);
    
        $req->execute();
    
        header("Location: live.php");
    }   
}
 else {
    $erreur = 'Tout les champs sont requis !';
}

