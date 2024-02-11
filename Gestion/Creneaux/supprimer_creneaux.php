<!DOCTYPE html>
<html>
<head>
    <title>Supprimer Créneau</title>
    <link rel="stylesheet" type="text/css" href="/application manif/css/suppcre.css">
</head>
<body>
    <h1>Supprimer un Créneau</h1>

    <?php
    // Connexion à la base de données
    $conn = new mysqli("127.0.0.1", "root", "", "manif");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer l'ID du créneau à supprimer
        $id_creneau = isset($_POST["id_creneau"]);

        // Supprimer le créneau de la base de données
        $sql = "DELETE FROM creneau WHERE id_creneau = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_creneau);

        if ($stmt->execute()) {
            echo "Le créneau a été supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression du créneau : " . $stmt->error;
        }
    }

    // Récupérer les créneaux depuis la base de données
    $sql = "SELECT id_creneau, heure_debut, heure_fin FROM creneau";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Afficher les créneaux dans un tableau avec option de suppression
        echo "<table border='1'>
                <tr>
                    <th>ID du Créneau</th>
                    <th>Heure de Début</th>
                    <th>Heure de Fin</th>
                    <th>Actions</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id_creneau"] . "</td>
                    <td>" . $row["heure_debut"] . "</td>
                    <td>" . $row["heure_fin"] . "</td>
                    <td>
                        <form method='post'>
                            <input type='hidden' name='id_creneau' value='" . $row["id_creneau"] . "'>
                            <input type='submit' value='Supprimer'>
                        </form>
                    </td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "Aucun créneau trouvé dans la base de données.";
    }

    $conn->close();
    ?>
</body>
</html>
