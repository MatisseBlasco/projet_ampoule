<?php
require_once('connect.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $req = $bdd->prepare('DELETE FROM `ampoule` WHERE `id` = :id');
    $req->bindParam(':id',$_GET['id'], PDO::PARAM_INT);
    // $req->execute();


} else {
    $erreur = 'Aucun ID correspondant';
}

header("Location: index.php");