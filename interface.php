<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Événements</title>
    <link rel="stylesheet" type="text/css" href="Css\styles.css">
</head>
<body>
    <h1>Gestion des Événements</h1>

    <div class="section">
        <h2>Responsables</h2>
        <div class="action">
            <form method="post" action="Gestion\Responsables\ajoute_responsable.php">
                <input type="hidden" name="type" value="responsable">
                <input type="submit" value="Ajouter un Responsable">
            </form>
        </div>

        <div class="action">
            <form method="post" action="Gestion\Responsables\modifier_responsablefor.php">
                <input type="hidden" name="type" value="responsable">
                <input type="submit" value="Modifier un Responsable">
            </form>
        </div>

        <div class="action">
            <form method="post" action="Gestion\Responsables\supprimer_responsable.php">
                <input type="hidden" name="type" value="responsable">
                <input type="submit" value="Supprimer un Responsable">
            </form>
        </div>
    </div>

    <div class="section">
        <h2>Activités</h2>
        <div class="action">
            <form method="post" action="Gestion\Activites\ajouter_activite.php">
                <input type="hidden" name="type" value="activité">
                <input type="submit" value="Ajouter une Activité">
            </form>
        </div>

        <div class ="action">
            <form method="post" action="Gestion\Activites\modifier_activite.php">
                <input type="hidden" name="type" value="activité">
                <input type="submit" value="Modifier une Activité">
            </form>
        </div>

        <div class="action">
            <form method="post" action="Gestion\Activites\supprimer_activite.php">
                <input type="hidden" name="type" value="activité">
                <input type="submit" value="Supprimer une Activité">
            </form>
        </div>
    </div>

    <div class="section">
        <h2>Créneaux</h2>
        <div class="action">
            <form method="post" action="Gestion\Creneaux\ajouter_creneaux.php">
                <input type="hidden" name="type" value="créneau">
                <input type="submit" value="Ajouter un Créneau">
            </form>
        </div>

        <div class="action">
            <form method="post" action="Gestion\Creneaux\modifier_creneaux.php">
                <input type="hidden" name="type" value="créneau">
                <input type="submit" value="Modifier un Créneau">
            </form>
        </div>

        <div class="action">
            <form method="post" action="Gestion\Creneaux\supprimer_creneaux.php">
                <input type="hidden" name="type" value="créneau">
                <input type="submit" value="Supprimer un Créneau">
            </form>
        </div>
    </div>
</body>
</html>
