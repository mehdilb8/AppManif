<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une Activité</title>
    <link rel="stylesheet" href="/application manif/css/style.css">
</head>
<body>
    <h1>Ajouter une Activité</h1>

    <form method="post" action="ajouter_activitephp.php">
        <label for="id_act">Id Activité:</label>
        <input type="text" name="id_act" required>
        <br><br>
        <label for="nom_act">Nom de l'Activité :</label>
        <input type="text" name="nom_act" required>
        <br><br>
        <label for="description">Description :</label>
        <textarea name="description" required></textarea>
        <br><br>
        <label for="num_resp">Numero responsable:</label>
        <input type="text" name="num_resp" required>
        <br>
        
        <input type="submit" value="Ajouter Activité">
    </form>
</body>
</html>
