<?php
require_once 'Database.php';

$oldEventName = isset($_POST['oldEventName']) ? ($_POST['oldEventName']) : '';
$newEventName = isset($_POST['newEventName']) ? ($_POST['newEventName']) : '';
$newEventLocation = isset($_POST['newEventLocation']) ? ($_POST['newEventLocation']) : '';
$newEventType = isset($_POST['newEventType']) ? ($_POST['newEventType']) : '';

// Validación desde el servidor para que los campos no esten vacios.
if (empty($oldEventName) || empty($newEventName) || empty($newEventLocation) || empty($newEventType)) {
    $response['status'] = 'error';
    $response['message'] = "Todos los campos son obligatorios.";
    echo json_encode($response);
    exit();
}

try {
    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("UPDATE EVENTO 
    SET nombre = :newEventName, localizacion = :newEventLocation, tipo = :newEventType 
    WHERE nombre = :oldEventName");
    $stmt->bindParam(':oldEventName', $oldEventName, PDO::PARAM_STR);
    $stmt->bindParam(':newEventName', $newEventName, PDO::PARAM_STR);
    $stmt->bindParam(':newEventLocation', $newEventLocation, PDO::PARAM_STR);
    $stmt->bindParam(':newEventType', $newEventType, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $responde['status'] = 'success';
        $response['message'] = "El evento $oldEventName se ha actualizado correctamente mediante AJAX.";
        $_SESSION['success_message'] = $response['message'];
    } else {
        $responde['status'] = 'error';
        $response['message'] = "Error al actualizar el evento mediante AJAX.";
        $_SESSION['success_message'] = $response['message'];
    }
} catch (PDOException $updateError) {
    $response['status'] = 'error';
    $response['message'] = "Error de conexión a la base de datos: " . $updateError->getMessage();
}

echo json_encode($response);