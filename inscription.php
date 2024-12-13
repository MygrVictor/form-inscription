<form action="inscription.php" method="POST">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" id="nom" name="username" placeholder="Votre nom d'utilisateur" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" placeholder="Mot de passe" required>

    <button type="submit">Rechercher</button>
    <?php
    session_start();
    require_once '/Applications/MAMP/htdocs/projet/config.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);


        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $bdd->prepare($sql);

        // Étape 3 : Exécution avec liaison
        $stmt->execute([':username' => $username]);

        // Étape 4 : Traitement du résultat
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($utilisateur) {
            echo "Utilisateur trouvé : " . $utilisateur['username'] . " - ";
        } else {

            $insert_sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $insert_stmt = $bdd->prepare($insert_sql);
            $insert_stmt->execute([
                ':username' => $username,
                ':password' => $hash
            ]);
        }
    }
    ?>