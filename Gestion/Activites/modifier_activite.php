<!DOCTYPE html>
<html>
<head>
    <title>Modifier une Activité</title>
    <link rel="stylesheet" type="text/css" href="/application manif/css/modifier_activite.css">

</head>
<body>
    <h1>Modifier une Activité</h1>

    <form method="post" action="modifier_activitephp.php">
        <label for="activite">Sélectionnez une Activité à Modifier :</label>
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
        <label for="nom_act">Nouveau Nom de l'Activité :</label>
        <input type="text" name="nom_act" required>
        <br>
        <label for="description">Nouvelle Description :</label>
        <textarea name="description" required></textarea>
        <br>
        <label for="num_resp">Nouveau Responsable :</label>
        <select name="num_resp" required>
            <?php
            
            $conn = new mysqli("127.0.0.1", "root", "", "manif");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "SELECT num_resp, nom_resp, prenom_resp FROM responsable";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["num_resp"] . '">' . $row["nom_resp"] . ' ' . $row["prenom_resp"] . '</option>';
                }
            } else {
                echo '<option value="" disabled>Aucun responsable trouvé</option>';
            }

            $conn->close();
            ?>
        </select>
        <br>
        <input type="submit" value="Modifier Activité">
    </form>
</body>
</html>
