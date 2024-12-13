<?php
session_start();
echo "Bienvenue, " . $_SESSION['username'] . "! Vous êtes connecté.";

?>
<a href="deconexion.php">cliquez ici pour vous deconnecter</a>