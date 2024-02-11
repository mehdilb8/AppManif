<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idActivite = $_POST["activite"]; // Récupérer l'ID de l'activité à supprimer

    // Connexion à la base de données
    $conn = new mysqli("127.0.0.1", "root", "", "manif");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Préparer la requête SQL pour supprimer l'activité
    $sql = "DELETE FROM activite WHERE id_act = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idActivite);

    if ($stmt->execute()) {
        echo "L'activité a été supprimée avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'activité : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirection vers le formulaire de suppression d'activité si la requête n'est pas de type POST
    header("Location: supprimer_activite.php");
    exit();
}
?>
