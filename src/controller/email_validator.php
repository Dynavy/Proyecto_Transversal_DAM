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
        // El correo electrónico existe en la base de datos
        $response ="Correo no válido";
        
    } else {
        // El correo electrónico no coincide con ningún correo electrónico en la base de datos
        $response = "Correo válido";
    }
    
    echo json_encode($response);
}

 validateEmail();

?>



å