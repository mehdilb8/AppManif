<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $numResp = $_POST["responsable"]  ;
    $nouveauNom = $_POST["nouveau_nom"] ;
    $nouveauPrenom = $_POST["nouveau_prenom"] ;

    // Connexion à la base de données
    $conn = new mysqli("127.0.0.1", "root", "", "manif");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Vérifier si le responsable existe dans la base de données
    $sql = "SELECT * FROM responsable WHERE num_resp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $numResp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Le responsable existe, procédez à la mise à jour
        $sql = "UPDATE responsable SET nom_resp = ?, prenom_resp = ? WHERE num_resp = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $nouveauNom, $nouveauPrenom, $numResp);

        if ($stmt->execute()) {
            echo "Le responsable a été modifié avec succès.";
        } else {
            echo "Erreur lors de la modification du responsable : " . $stmt->error;
        }
    } else {
        echo "Le responsable avec le numéro " . $numResp . " n'existe pas.";
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirection vers le formulaire de modification si la requête n'est pas de type POST
    header("Location: modifier_responsable.php");
    exit();
}
?>
