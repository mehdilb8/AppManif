<!DOCTYPE html>
<html>

<head>
    <title>Gestion des  Utilisateurs</title>
    <link rel="stylesheet" type="text/css" href="/application manif/css/ajoutcre.css">
</head>

<body>
    <h1>Gestion des Utilisateurs</h1>
    <?php
    
    $conn = new mysqli("127.0.0.1", "root", "", "manif");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

  ?>
    
    

    <h2>Créer un Nouvel Utilisateur :</h2>
    <form method="post" action="">
        <label for="username">Nom d'Utilisateur :</label>
        <input type="text" name="username" required>
        <br>

        <label for="password">Mot de Passe :</label>
        <input type="password" name="password" required>
        

        <br>

        <label for="role">Rôle :</label>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="participant">Participant</option>
            <option value="responsable">Responsable</option>
        </select>
        <br><br>

        <input type="submit" value="Créer Utilisateur">
        </form>
        <?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {
        // Récupérer et nettoyer les données du formulaire
        $user_username = $conn->real_escape_string($_POST['username']);
        $user_password = $conn->real_escape_string($_POST['password']); // Idéalement, utilisez password_hash() pour plus de sécurité
        $user_role = $conn->real_escape_string($_POST['role']);

        
        $sql = "INSERT INTO users (username, password, role) VALUES ('$user_username', '$user_password', '$user_role')";

        
        if ($conn->query($sql) === TRUE) {
            echo "Nouvel utilisateur créé avec succès";
        } else {
            echo "Erreur lors de la création de l'utilisateur: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
    

    
    <h2>Modifier un Utilisateur :</h2>
    <form method="post" action="">
        <label for="user_select">Sélectionner Utilisateur :</label>
        <select name="user_select" id="user_select" required>
        <?php
    
    $sql_users = "SELECT id, username FROM users";
    $result_users = $conn->query($sql_users);

    if ($result_users->num_rows > 0) {
        while ($user = $result_users->fetch_assoc()) {
            echo "<option value=\"" . $user["id"] . "\">" . $user["username"] . " (ID: " . $user["id"] . ")</option>";
        }
    }
    ?>
        </select>
        <br>

        <label for="new_password">Nouveau Mot de Passe :</label>
        <input type="password" name="new_password" id="new_password" required>
        <br>

        <label for="new_role">Nouveau Rôle :</label>
        <select name="new_role" id="new_role" required>
            <option value="admin">Admin</option>
            <option value="participant">Participant</option>
            <option value="responsable">Responsable</option>
        </select>
        <br><br>

        <input type="submit" value="Modifier Utilisateur">
    </form>


    
    <h2>Supprimer un Utilisateur :</h2>
    <form method="post" action="">
        <label for="user_delete">Sélectionner Utilisateur :</label>
        <select name="user_delete" id="user_delete" required>
        <?php
    
    $sql_users = "SELECT id, username FROM users";
    $result_users = $conn->query($sql_users);

    if ($result_users->num_rows > 0) {
        while ($user = $result_users->fetch_assoc()) {
            echo "<option value=\"" . $user["id"] . "\">" . $user["username"] . " (ID: " . $user["id"] . ")</option>";
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }

    
    ?>
        </select>
        <br><br>

        <input type="submit" value="Supprimer Utilisateur">
    </form>
</body>

</html>
