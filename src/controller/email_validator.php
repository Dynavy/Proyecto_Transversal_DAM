<?php
require_once 'Database.php';

function validateEmail(){

    $username = isset($_POST['username']) ? ($_POST['username']) : '';
    $db = new Database();
    $conn = $db->getConnection();
    $stmt = $conn->query("SELECT Correo_electronico FROM USUARIO");
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $response = null;
    // Comparar el valor de 'username' con los correos electrónicos obtenidos
    
    if (in_array($username, $resultados)) {
        $response = array("message" => "Correo en uso, pruebe con otro.");
    } else {
        $response = array("message" => "Correo válido");
    }
    
    echo json_encode($response);
}

 validateEmail();

?>



