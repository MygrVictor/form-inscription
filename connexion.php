<?php
session_start();
require_once '/Applications/MAMP/htdocs/projet/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([':username' => $username]);

    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {

        if (password_verify($password, $utilisateur['password'])) {

            $_SESSION['username'] = $utilisateur['username'];
            header('Location: acceuil.php');
            exit;
        } else {

            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {

        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<form action="connexion.php" method="POST">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" id="username" name="username" placeholder="Votre nom d'utilisateur" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" placeholder="Mot de passe" required>

    <button type="submit">Se connecter</button>
</form>