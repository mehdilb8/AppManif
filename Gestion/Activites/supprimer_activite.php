<!DOCTYPE html>
<html>
<head>
    <title>Supprimer une Activité</title>
    <link rel="stylesheet" type="text/css" href="/application manif/css/supprimer_activite.css"> 
</head>
<body>
    <h1>Supprimer une Activité</h1>

    <form method="post" action="supprimer_activitephp.php">
        <label for="activite">Sélectionnez une Activité à Supprimer :</label>
        <select name="activite" required>
            <?php
            
            $conn = new mysqli("127.0.0.1", "root", "", "manif");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "SELECT id_act, nom_act, description FROM activite";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["id_act"] . '">' . $row["nom_act"] . '</option>';
                }
            } else {
                echo '<option value="" disabled>Aucune activité trouvée</option>';
            }

            $conn->close();
            ?>
        </select>
        <br>
        <input type="submit" value="Supprimer Activité">
    </form>
</body>
</html>
