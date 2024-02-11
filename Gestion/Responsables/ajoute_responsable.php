<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Événements</title>
    <link rel="stylesheet" type="text/css" href="ajoustyle.css">
</head>
<body>
    <h1>gestion responsables </h1>

    <!-- Formulaire d'ajout de responsable -->
    <h2>Ajouter un Responsable</h2>
    <form method="post" action="ajouter_evenement.php">
        <label for="num_resp">Numero de responsable:</label>
        <input type="text" name="num_resp"required><br>
        <label for="nom_resp">Nom du Responsable :</label>
        <input type="text" name="nom_resp" required>
        <br>
        <label for="prenom_resp">Prénom du Responsable :</label>
        <input type="text" name="prenom_resp" required>
        <br><br>
        <input type="hidden" name="type" value="responsable">
        <input type="submit" value="Ajouter Responsable"><br><br>
       
    </form>



</body>
</html>

