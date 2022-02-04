<?php

const HOST = "localhost";
const DATABASE = "veville";
const USERNAME = "root"; // car sur localhost
const PASSWORD = ""; // car sur XAMPP (sur MAMP on met = "root")

try{
    // Arguments : 1 (serveur + la BDD), 2 (username), 3 (mdp), 4 (options)
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE . "", USERNAME, PASSWORD,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
    /* 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING : pour gérer les messages d'erreur
        PDO::mysql_ATTR_INIT_COMMAND => 'SET NAMES utf8' : pour encodage en utf-8
    */
    // echo "succes"; // test
} catch(PDOException $error) // PDO : php date object
{  
    echo "probleme connexion : " . $error->getMessage();
}