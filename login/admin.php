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
</html>
    </form>
    <h1>gestion responsables </h1>

    

    
    <h2>Ajouter un Responsable</h2>
<form method="post" action="..\Gestion\Responsables\ajoute_responsable.php">
    
    <input type="hidden" name="type" value="responsable">
    <input type="submit" value="Ajouter Responsable"><br>
</form>
<h3>Modifer responsable </h2>
<form method="post" action="..\Gestion\Responsables\modifier_responsablefor.php">
    
    <input type="hidden" name="type" value="responsable">
    <input type="submit" value="Modifier Responsable"><br>
</form>

<h4>supprimer responsable</h4>
<form method="post" action="..\Gestion\Responsables\supprimer_responsable.php">
    
    <input type="hidden" name="type" value="responsable">
    <input type="submit" value="supprimer responsable"><br>
</form>
    <h2>gestion Activité</h2>

    <h2>Ajouter une Activité</h2>
<form method="post" action="..\Gestion\Activites\ajouter_activite.php">

<input type="hidden" name="type" value="activité">
    <input type="submit" value="Ajouter"><br>
</form>
<h3>Modifer Activité </h2>
<form method="post" action="..\Gestion\Activites\modifier_activite.php">

<input type="hidden" name="type" value="activité">
    <input type="submit" value="Modifier "><br>
</form>

<h4>supprimer Activité</h4>
<form method="post" action="..\Gestion\Activites\supprimer_activite.php">
    
    <input type="hidden" name="type" value="activité">
    <input type="submit" value="supprimer "><br>
</form>

<h2>gestion des créneau </h2>
    
    <h2>Ajouter créneau</h2>
<form method="post" action="..\Gestion\Creneaux\ajouter_creneaux.php">
    
    <input type="hidden" name="type" value="créneau">
    <input type="submit" value="Ajouter"><br>
</form>

<h3>Modifer créneau </h2>
<form method="post" action="..\Gestion\Creneaux\modifier_creneaux.php">
    
    <input type="hidden" name="type" value="créneau">
    <input type="submit" value="Modifier "><br>
</form>

<h4>supprimer créneau</h4>
<form method="post" action="..\Gestion\Creneaux\supprimer_creneaux.php">
    
    <input type="hidden" name="type" value="créneau">
    <input type="submit" value="supprimer "><br>
</form>
<h5>Gestion Utilisateurs</h5>
<form method="post" action="..\Gestion\Utilisateur\Utilisateur.php">
    
    <input type="hidden" name="type" value="créneau">
    <input type="submit" value="Gestion"><br>
</form>
    

</body>
</html>
