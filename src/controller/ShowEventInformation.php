<?php
require_once 'Database.php';

// Función para desplegar los nombres de los eventos.
function showEventNames()
{
    $db = new Database();
    $conn = $db->getConnection();
    $stmt = $conn->query("SELECT Nombre FROM EVENTO");
    if ($stmt->rowCount() > 0) {
        echo '<select name="eventName">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $row["Nombre"] . '">' . $row["Nombre"] . '</option>';
        }
        echo '</select>';
    } else {
        echo '<p style="color: red;">No hay eventos creados.</p>';
    }
}

// Función para que el usuario normal pueda leer los datos de un evento.
function showEventsInfo()
{
    $db = new Database();
    $conn = $db->getConnection();
    $stmt = $conn->query("SELECT Nombre, Tipo, Localizacion FROM EVENTO");
   
}

// Enviamos true a getEventDetails desde el ajax para que se ejecute este if.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["getEventDetails"])) {
    $eventName = $_POST["eventName"];
    // 1. Enviar como parametro $eventName para que busque la información de ese evento en específico.
    // 2. Almacenar todos los datos en $eventDetails para más tarde usarla como respuesta al servidor.
    $eventDetails = getEventDetails($eventName);
    echo json_encode($eventDetails);
    exit();
}

function getEventDetails($eventName)
{
    $db = new Database();
    $conn = $db->getConnection();
    // Hace la query con el valor del argumento $eventName en el where.
    $stmt = $conn->prepare("SELECT Nombre, Localizacion, Tipo FROM EVENTO WHERE Nombre = :eventName");
    $stmt->bindParam(':eventName', $eventName, PDO::PARAM_STR);
    $stmt->execute();
    $eventDetails = $stmt->fetch(PDO::FETCH_ASSOC);
    // Retorna todos los datos del evento.
    return $eventDetails;
}
?>