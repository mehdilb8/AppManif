<!DOCTYPE html>
<html>
    <head>
        <title>supprimer un responsable</title>
        <link rel="stylesheet" type="text/css" href="suprep.css">
    </head>
    <body>
        <h1>supprimer un responsable</h1>

        <form method="post" action="supprimer_responsablephp.php">
            <label for="responsable">Sélectionnez un responsable à supprimer:</label>
            <select name="responsable" required>
                <?php
                $conn = new mysqli("127.0.0.1","root","","manif");

                if ($conn->connect_error){
                    die("connection failed: " . $conn->connect_error);
                }
                
                $sql  = "SELECT num_resp, nom_resp,prenom_resp FROM responsable";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["num_resp"] . '">' . $row["nom_resp"] . ' ' . $row["prenom_resp"] . '</option>';
                    }
                } else {
                    echo '<option value="" disabled>Aucun responsable trouvé</option>';
                }
    
                $conn->close();
                ?>

            </select>
            
    <input type="submit" value="Supprimer Responsable">
        </form>
    </form>
    </body>
</html>
