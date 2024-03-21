<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idActivite = $_POST["activite"]; // Récupérer l'ID de l'activité à supprimer

    
    $conn = new mysqli("127.0.0.1", "root", "", "manif");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
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
    
    header("Location: supprimer_activite.php");
    exit();
}
?>
