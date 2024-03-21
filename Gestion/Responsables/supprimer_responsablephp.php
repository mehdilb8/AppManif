<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numResp = $_POST["responsable"]; //récupérer le numero du responsable à supprimer 

    $conn = new mysqli("127.0.0.1","root","","manif");

    if($conn->connect_error){
        die("connection failed : " .$conn->connect_error);
    }

    
    $sql = "DELETE FROM responsable WHERE num_resp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$numResp);

    if ($stmt->execute()) {
         echo "Le resposnable a été supprimé avec succés.";
    }else{
        echo "Erreur lors de la suppresion du responsable : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    
    header("Location: supprimer_responsablephp.php");
    exit();
}
?>
