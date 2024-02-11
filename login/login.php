<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../css/stylelog.css">
</head>
<body>
    <h1>Connexion</h1>
    <form method="post" action="process_login.php">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Se connecter">
    </form>
    <?php
// Établir la connexion à la base de données
$conn = mysqli_connect("127.0.0.1", "root", "", "manif");
$username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';


// Vérifier la connexion
if (!$conn) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}
if ( isset($_POST['$username']) && isset($_POST['$password'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
}
// Après avoir vérifié le nom d'utilisateur et le mot de passe et confirmé la connexion
$query = "SELECT * FROM users WHERE username = '$username'  AND password = '$password'";
$result = mysqli_query($conn, $query);

if ($result) {
    // La requête a réussi, vous pouvez accéder aux données
    if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    $userRole = $row['role'];

    if ($userRole === 'admin') {
        header("Location: admin.php ");
        exit(); // Assurez-vous de quitter le script après la redirection
    } elseif ($userRole === 'participant') {
        header("Location: participant.php");
        exit();
    } elseif ($userRole === 'responsable') {
        header("Location: responsable.php");
        exit();
    } else {
        // Gérer les erreurs d'authentification
        // Rediriger vers une page d'erreur, par exemple login.php
    }
}
} else {
    // La requête a échoué
    echo "Erreur de requête : " . mysqli_error($conn);
}

// Fermer la connexion
mysqli_close($conn);
?>

</body>
</html>

