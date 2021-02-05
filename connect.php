<?php     
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_ampoule', 'root');
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage() . "<br>";
}
