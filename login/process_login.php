<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $conn = new mysqli("127.0.0.1", "root", "", "manif");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, role FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            //Stocker uniquement l'ID de l'utilisateur en fonction de son role 
            $_SESSION["user_id"] = $row["id"];
            
            // Redirigez l'utilisateur en fonction de son rôle
            if ($row["role"] == "admin") {
                header("Location: admin.php");
            } elseif ($row["role"] == "participant") {
                header("Location: participant.php");
            } elseif ($row["role"] == "responsable") {
                header("Location: responsable.php");
            } else {
                echo "Rôle non valide.";
            }
            exit(); // Assurez-vous de quitter le script après la redirection
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {
        echo "Erreur lors de la requête : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Méthode non autorisée.";
}
?>

