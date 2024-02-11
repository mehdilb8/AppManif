<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Événements</title>
    <link rel="stylesheet" type="text/css" href="/application manif/css/style.css">
    <style>
        .logout-button {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>
<body>
    <form method="post" action="login.php">
        
        <input type="submit" value="Déconnexion" class="logout-button">
    </form>
</body>
</head>
<body>

   <!-- gestion d'activité -->
    <h2>Gestion Activité</h2>
    <!-- Formulaire Ajouter une Activité -->
    <h2>Ajouter une Activité</h2>
<form method="post" action="..\Gestion\Activites\ajouter_activite.php">
    <!-- ... (vos champs existants) -->
    <input type="hidden" name="type" value="activité">
    <input type="submit" value="Ajouter"><br>
</form>
<h3>Modifer Activité </h2>
<form method="post" action="..\Gestion\Activites\modifier_activite.php">
    <!-- ... (vos champs existants) -->
    <input type="hidden" name="type" value="activité">
    <input type="submit" value="Modifier "><br>
</form>

<h4>supprimer Activité</h4>
<form method="post" action="..\Gestion\Activites\supprimer_activite.php">
    <!-- ... (vos champs existants) -->
    <input type="hidden" name="type" value="activité">
    <input type="submit" value="supprimer "><br>
</form>
    <!-- Formulaire  des créneau -->
    <h2>gestion des créneau </h2>
    <!-- Formulaire Ajouter des créneau -->
    <h2>Ajouter créneau</h2>
<form method="post" action="..\Gestion\Creneaux\ajouter_creneaux.php">
    <!-- ... (vos champs existants) -->
    <input type="hidden" name="type" value="créneau">
    <input type="submit" value="Ajouter"><br>
</form>

<h3>Modifer créneau </h2>
<form method="post" action="..\Gestion\Creneaux\modifier_creneaux.php">
    <!-- ... (vos champs existants) -->
    <input type="hidden" name="type" value="créneau">
    <input type="submit" value="Modifier "><br>
</form>

<h4>supprimer créneau</h4>
<form method="post" action="..\Gestion\Creneaux\supprimer_creneaux.php">
    <!-- ... (vos champs existants) -->
    <input type="hidden" name="type" value="créneau">
    <input type="submit" value="supprimer "><br>
</form>

    

</body>
</html>

