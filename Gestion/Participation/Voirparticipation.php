<?php
// Inclure le fichier CSS
echo '<link rel="stylesheet" type="text/css" href="/application manif/css/voirparticpant.css">';
?>
<?php
session_start();

// Vérifier si l'utilisateur est authentifié
if(isset($_SESSION['user_id'])){
    // Récupérer l'identifiant de l'utilisateur à partir de la session
    $user_id = $_SESSION['user_id'];

    // Connexion à la base de données (à adapter avec vos paramètres)
    $conn = new mysqli("127.0.0.1", "root", "", "manif");

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Requête SQL pour récupérer les activités inscrites par l'utilisateur actuel
    $sql = "SELECT a.id_act, a.nom_act, a.description
            FROM activite a
            INNER JOIN participation p ON a.id_act = p.id_act
            WHERE p.num_participant = $user_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2 style='color: blue;'>Activités Inscrites</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<strong>Nom de l'activité:</strong> " . $row['nom_act'] . "<br>";
            echo "<strong>Description:</strong> " . $row['description'];
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p style='color: blue;'>Aucune activité inscrite pour l'utilisateur actuel.</p>";
    }

    // Fermez la connexion à la base de données à la fin
    $conn->close();
} else {
    echo "L'utilisateur n'est pas authentifié.";
}
?>
