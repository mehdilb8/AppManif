<!DOCTYPE html>
<html>
<head>
    <style>
        /* Reset some default browser styles */
        body, html {
            margin: 0;
            padding: 0;
        }

        /* Set a background color for the entire page */
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        /* Style the header */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        /* Style the main content container */
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* Style the wallet data */
        .wallet-data {
            margin-top: 20px;
        }

        .wallet-data table {
            width: 100%;
            border-collapse: collapse;
        }

        .wallet-data table th, .wallet-data table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .wallet-data table th {
            background-color: #333;
            color: #fff;
        }

        /* Style the footer */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        /* Style links */
        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
// Vérifiez l'authentification de l'utilisateur ici et récupérez son identifiant utilisateur
$user_id = 1; // Remplacez ceci par l'identifiant de l'utilisateur authentifié

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manif";

// Créez une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query pour sélectionner le portefeuille de l'utilisateur actuel
$sql = "SELECT `num_participant`, `amount`, `created_at` FROM `portefeuille`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Affichez les données du portefeuille de l'utilisateur
    echo '<div class="container"><div class="wallet-data"><table>';
    echo '<tr><th>Participant</th><th>Montant</th><th>Crée à</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row["num_participant"] . '</td><td>' . $row["amount"] . '</td><td>' . $row["created_at"] . '</td></tr>';
    }
    echo '</table></div></div>';
} else {
    echo "No data found for this user's wallet.";
}

// Fermez la connexion à la base de données
$conn->close();
?>
</body>
</html>
