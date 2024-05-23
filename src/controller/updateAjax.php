<?php
require_once 'Database.php';
session_start();
function updateCredentials()
{
    $old_username = isset($_SESSION['user']) ? ($_SESSION['user']) : '';

    $new_email = isset($_POST['new_username']) ? ($_POST['new_username']) : '';

    $new_password = isset($_POST['new_password']) ? ($_POST['new_password']) : '';

    $success = null;
    $messageSuccess = "Actualización hecha correctamente";
    $messageError = "No se ha podido actualizar";
    $successIdentifier = "update_success";
    $errorIdentifier = "update_error";

    
    $db = new Database();
    $conn = $db->getConnection();
    try {
        $stmt = $conn->prepare("UPDATE USUARIO SET Correo_electronico=:new_username, Contrasena=:new_password WHERE Correo_electronico=:old_username");
        $stmt->bindParam(':new_username', $new_email, PDO::PARAM_STR);
        $stmt->bindParam(':new_password', $new_password, PDO::PARAM_STR);
        $stmt->bindParam(':old_username', $old_username, PDO::PARAM_STR);
        $stmt->execute();
        $_SESSION['showName'] = $new_email;
        $success = true;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        $success = false;
    }
    
    if ($success) {
        $response = array(
            "message" => $messageSuccess,
            "identifier" => $successIdentifier
        );
    } else {
        $response = array(
            "message" => $messageError,
            "identifier" => $errorIdentifier
        );
    }
    echo json_encode($response);
    
}
updateCredentials();