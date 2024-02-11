<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idActivite = $_POST["activite"]; // Récupérer l'ID de l'activité à modifier
    $nouveauNom = $_POST["nom_act"];
    $nouvelleDescription = $_POST["description"];
    $nouveauResp = $_POST["num_resp"];

    // Connexion à la base de données
    $conn = new mysqli("127.0.0.1", "root", "", "manif");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Préparer la requête SQL pour mettre à jour l'activité
    $sql = "UPDATE activite SET nom_act = ?, description = ?, num_resp = ? WHERE id_act = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $nouveauNom, $nouvelleDescription, $nouveauResp, $idActivite);

    if ($stmt->execute()) {
        echo "L'activité a été modifiée avec succès.";
    } else {
        echo "Erreur lors de la modification de l'activité : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirection vers le formulaire de modification d'activité si la requête n'est pas de type POST
    header("Location: modifier_activite.php");
    exit();
}
?>
