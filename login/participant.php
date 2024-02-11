<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Inscriptions</title>
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
    <h1>Gestion des Inscriptions</h1>

    
    <h2>Inscription à une Activité</h2>
    <form method="post" action="../Gestion/Participation/Participation.php">

        <input type="hidden" name="type" value="inscription_activite">
        <input type="submit" value="S'inscrire à une Activité"><br>
    </form>

    
    <h2>Mes Activités Inscrites</h2>
    <form method="post" action="../Gestion/Participation/Voirparticipation.php">
        
        <input type="hidden" name="type" value="validation_participation">
        <input type="submit" value="Valider Participation"><br>
    </form>
    
    
</body>
</html>
