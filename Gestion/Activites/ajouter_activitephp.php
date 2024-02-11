<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $idactivite=$_POST["id_act"];
    $nomActivite = $_POST["nom_act"];
    $description = $_POST["description"];
    $numResp = $_POST["num_resp"];
    // Récupérez d'autres données de formulaire au besoin

    // Connexion à la base de données
    $conn = new mysqli("127.0.0.1", "root", "", "manif");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Préparer la requête SQL pour insérer une nouvelle activité
    $sql = "INSERT INTO activite (id_act,nom_act, description,num_resp) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi",$idactivite, $nomActivite, $description,$numResp);

    if ($stmt->execute()) {
        echo "L'activité a été ajoutée avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'activité : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirection vers le formulaire d'ajout d'activité si la requête n'est pas de type POST
    header("Location: ajouter_activite.php");
    exit();
}
?>
