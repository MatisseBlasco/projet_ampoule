<?php
    define('DATABASE', 'livecoding');
    define('USER', 'root');
    define('HOST', 'localhost');

        try {
                $dbh = new PDO('mysql:host='.HOST.';dbname='. DATABASE, USER, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
    ?>