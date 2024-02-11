<!DOCTYPE html>
<html>
<head>
    <title>Liste des Créneaux</title>
    <link rel="stylesheet" type="text/css" href="/application manif/css/modifcre.css">

</head>
<body>
    <h1>Liste des Créneaux</h1>

    <?php
    // Connexion à la base de données
    $conn = new mysqli("127.0.0.1", "root", "", "manif");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Code pour la modification du créneau
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_creneau = isset($_POST["id_creneau"]) ;
        $heure_debut = isset($_POST["heure_debut"]) ;
        $heure_fin = isset($_POST["heure_fin"]) ;
        


        $sql = "UPDATE creneau SET heure_debut = ?, heure_fin = ? WHERE id_creneau = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $heure_debut, $heure_fin, $id_creneau);

        if ($stmt->execute()) {
            echo "Le créneau a été modifié avec succès.";
        } else {
            echo "Erreur lors de la modification du créneau : " . $stmt->error;
        }
    }

    // Récupérer les créneaux depuis la base de données
    $sql = "SELECT id_creneau, heure_debut, heure_fin FROM creneau";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Afficher les créneaux dans un tableau
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
                            <input type='text' name='heure_debut' placeholder='Nouvelle heure de début'>
                            <input type='text' name='heure_fin' placeholder='Nouvelle heure de fin'>
                            <input type='submit' value='Modifier'>
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
