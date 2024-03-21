<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $type = $_POST["type"];

    
    $conn = new mysqli("127.0.0.1", "root", "", "manif");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    if ($type === "responsable") {
        
        $numResp = $_POST["num_resp"];
        $nomResp = $_POST["nom_resp"];
        $prenomResp = $_POST["prenom_resp"];
        
        

        
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
        
        $nomAct = $_POST["nom_act"];
        $description = $_POST["description"];
        $numResp = $_POST["num_resp"];

        

        
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
        
        $heureDebut = $_POST["heure_debut"];
        $heureFin = $_POST["heure_fin"];

        

        
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
    
    header("Location: formulaire_evenements.php");
    exit();
}
?>

