<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer le type d'événement depuis le formulaire
    $type = $_POST["type"];

    // Connexion à la base de données
    $conn = new mysqli("127.0.0.1", "root", "", "manif");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Gestion de l'ajout en fonction du type d'événement
    if ($type === "responsable") {
        // Récupérer les données du formulaire pour le responsable
        $numResp = $_POST["num_resp"];
        $nomResp = $_POST["nom_resp"];
        $prenomResp = $_POST["prenom_resp"];
        
        // Valider et sécuriser les données (ajoutez des validations supplémentaires au besoin)

        // Préparer la requête SQL pour insérer un nouveau responsable
        $sql = "INSERT INTO responsable (num_resp,nom_resp, prenom_resp) VALUES (?,?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt !== false) {
            $stmt->bind_param("iss",$numResp, $nomResp, $prenomResp);

            if ($stmt->execute()) {
                echo "Le responsable a été ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout du responsable : " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erreur lors de la préparation de la requête SQL.";
        }
    } elseif ($type === "activite") {
        // Récupérer les données du formulaire pour l'activité
        $nomAct = $_POST["nom_act"];
        $description = $_POST["description"];
        $numResp = $_POST["num_resp"];

        // Valider et sécuriser les données (ajoutez des validations supplémentaires au besoin)

        // Préparer la requête SQL pour insérer une nouvelle activité
        $sql = "INSERT INTO activite (nom_act, description, num_resp) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt !== false) {
            $stmt->bind_param("ssi", $nomAct, $description, $numResp);

            if ($stmt->execute()) {
                echo "L'activité a été ajoutée avec succès.";
            } else {
                echo "Erreur lors de l'ajout de l'activité : " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erreur lors de la préparation de la requête SQL.";
        }
    } elseif ($type === "creneau") {
        // Récupérer les données du formulaire pour le créneau
        $heureDebut = $_POST["heure_debut"];
        $heureFin = $_POST["heure_fin"];

        // Valider et sécuriser les données (ajoutez des validations supplémentaires au besoin)

        // Préparer la requête SQL pour insérer un nouveau créneau
        $sql = "INSERT INTO creneau (heure_debut, heure_fin) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt !== false) {
            $stmt->bind_param("ss", $heureDebut, $heureFin);

            if ($stmt->execute()) {
                echo "Le créneau a été ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout du créneau : " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erreur lors de la préparation de la requête SQL.";
        }
    } else {
        echo "Type d'événement non valide.";
    }

    $conn->close();
} else {
    // Redirection vers la page du formulaire si la requête n'est pas de type POST
    header("Location: formulaire_evenements.php");
    exit();
}
?>

