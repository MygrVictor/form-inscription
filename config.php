<?php
$servername = "localhost";
$port = "8889";
$username = "root";
$password = "root";

try {
    $bdd = new PDO("mysql:host=$servername:$port;dbname=authentification", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage()); 
}
