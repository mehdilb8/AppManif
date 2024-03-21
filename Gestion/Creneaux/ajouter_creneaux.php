<!DOCTYPE html>
<html>
<head>
    <title>Liste des Créneaux</title>
    <link rel="stylesheet" type="text/css" href="/application manif/css/ajoutcre.css">

</head>
<body>
    <h1>Liste des Créneaux</h1>
<?php

$conn = new mysqli("127.0.0.1", "root", "", "manif");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id_creneau, heure_debut, heure_fin FROM creneau";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Liste des Créneaux Existants :</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>ID Créneau : " . $row["id_creneau"] . " - Heure de Début : " . $row["heure_debut"] . " - Heure de Fin : " . $row["heure_fin"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Aucun créneau trouvé dans la base de données.</p>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id_creneau = isset($_POST["id_creneau"]) ? $_POST["id_creneau"] : null; // Allow null for auto-increment
    $heure_debut = isset($_POST["heure_debut"]) ? $_POST["heure_debut"] : "";
    $heure_fin = isset($_POST["heure_fin"]) ? $_POST["heure_fin"] : "";

  
    $checkSql = "SELECT id_creneau FROM creneau WHERE id_creneau = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("i", $id_creneau);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo "Erreur: id_creneau existe déjà.";
    } else {
        
        $insertSql = "INSERT INTO creneau (id_creneau, heure_debut, heure_fin) VALUES (?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("iss", $id_creneau, $heure_debut, $heure_fin);

        if ($id_creneau === null) {
            echo "Erreur: id_creneau ne peut pas être null.";
        } elseif ($insertStmt->execute()) {
            echo "Le créneau a été ajouté avec succès. ID Créneau : " . $id_creneau;
        } else {
            echo "Erreur lors de l'ajout du créneau : " . $insertStmt->error;
        }

        $insertStmt->close();
    }

    $checkStmt->close();
}

$conn->close();
?>

<!-- Formulaire d'ajout de créneau -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="id_creneau">ID du Créneau :</label>
    <input type="number" name="id_creneau"> <!-- Allow user input for id_creneau -->
    <br>

    <label for="heure_debut">Heure de début (format : YYYY-MM-DD HH:MM:SS) :</label>
    <input type="text" name="heure_debut" required>
    <br>

    <label for="heure_fin">Heure de fin (format : YYYY-MM-DD HH:MM:SS) :</label>
    <input type="text" name="heure_fin" required>
    <br><br>

    <input type="submit" value="Ajouter Créneau">
</form>
