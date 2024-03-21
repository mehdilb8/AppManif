<!DOCTYPE html>
<html>
<head>
    <title>Modifier un Responsable</title>
    <link rel="stylesheet" type="text/css" href="modresp.css"></head>
<body>
    <h1>Modifier un Responsable</h1>

    <form method="post" action="modifier_responsable.php">
        <label for="responsable">Sélectionnez un Responsable :</label>
        <select name="responsable" required>
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
        <label for="nouveau_nom">Nouveau Nom :</label>
        <input type="text" name="nouveau_nom" required>
        <br>
        <label for="nouveau_prenom">Nouveau Prénom :</label>
        <input type="text" name="nouveau_prenom" required>
        <br>
        <input type="submit" value="Modifier Responsable">
    </form>
</body>
</html>

