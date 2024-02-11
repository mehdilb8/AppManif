<!DOCTYPE html>
<html>
<head>
    <title>Inscription à une activité</title>
    <link rel="stylesheet" type="text/css" href="/application manif/css/Participation.css">
</head>
<body>
    <h1>Inscription à une activité</h1>
    <?php
    
    
    $conn = new mysqli("127.0.0.1", "root", "", "manif");

    
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    $participants_query = "SELECT `num_participant`,`nom_participant`,`prenom_participant`,`mail_participant` FROM `participant`";
    $participants_result = $conn->query($participants_query);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (isset($_POST['participant'], $_POST['activite'], $_POST['creneau'])) {
            
            $participant_id = $conn->real_escape_string($_POST['participant']);
            $activite_id = $conn->real_escape_string($_POST['activite']);
            $creneau_id = $conn->real_escape_string($_POST['creneau']);

            
            $creneau_check_query = "SELECT `id_creneau` FROM `creneau` WHERE `id_creneau` = '$creneau_id'";
            $creneau_check_result = $conn->query($creneau_check_query);

            if ($creneau_check_result->num_rows > 0) {
                
                $insert_participation_sql = "INSERT INTO participation (id_part, id_act, num_participant, id_creneau) 
                                             VALUES ('$participant_id', '$activite_id', '$participant_id', '$creneau_id')";

                if ($conn->query($insert_participation_sql) === TRUE) {
                    echo "Inscription réussie à l'activité.";

                    
                    if (isset($_POST['validation']) && $_POST['validation'] == 'on') {
                        
                        $update_validation_sql = "UPDATE participation SET valide = 1 
                                                  WHERE id_part = '$participant_id' AND id_act = '$activite_id'";
                        if ($conn->query($update_validation_sql) === TRUE) {
                            echo "Participation validée avec succès.";
                        } else {
                            echo "Erreur lors de la validation de la participation : " . $conn->error;
                        }
                    }
                } else {
                    echo "Erreur lors de l'inscription : " . $conn->error;
                }
            } else {
                echo "Erreur lors de l'inscription : le créneau spécifié n'existe pas.";
            }
        } else {
            echo "Erreur lors de l'inscription : des données manquantes.";
        }
    }
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="participant">Participant :</label>
        <select name="participant" required>
            <?php
            
            if ($participants_result->num_rows > 0) {
                while ($row = $participants_result->fetch_assoc()) {
                    echo '<option value="' . $row['num_participant'] . '">' . $row['nom_participant'] . ' ' . $row['prenom_participant'] . ' - ' . $row['mail_participant'] . '</option>';
                }
            }
            ?>
        </select><br>
        <label for="activite">Activité :</label>
        <select name="activite" required>
            <?php
            
            $activites_query = "SELECT `id_act`,`nom_act`,`description`,`num_resp` FROM `activite`";
            $activites_result = $conn->query($activites_query);

            
            if ($activites_result->num_rows > 0) {
                while ($row = $activites_result->fetch_assoc()) {
                    echo '<option value="' . $row['id_act'] . '">' . $row['nom_act'] . ' - ' . $row['description'] . '</option>';
                }
            }
            ?>
        </select><br>

        <label for="creneau">Créneau :</label>
        <select name="creneau" required>
            <?php
            
            $creneaux_query = "SELECT `id_creneau`,`heure_debut`,`heure_fin` FROM `creneau`";
            $creneaux_result = $conn->query($creneaux_query);

            
            if ($creneaux_result->num_rows > 0) {
                while ($row = $creneaux_result->fetch_assoc()) {
                    echo '<option value="' . $row['id_creneau'] . '">' . $row['heure_debut'] . ' - ' . $row['heure_fin'] . '</option>';
                }
            }
            ?>
        </select><br>

        <label for="validation">Valider la participation :</label>
        <input type="checkbox" name="validation"><br>

        <input type="submit" value="S'inscrire">
    </form>
    </body>
</html>
