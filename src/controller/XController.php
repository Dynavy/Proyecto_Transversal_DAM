<?php
require_once 'Database.php';
session_start();

//Check if form is submitted
$event = new AdminController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Check button
    if (isset($_POST["createEvent"])) {
        $event->create();
    }
    if (isset($_POST["update"])) {
        $event->update();
    }
    if (isset($_POST["delete"])) {
        $event->delete();
    }
}

class AdminController
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function create(): void
    {

        $eventName = $_POST["eventName"];
        $eventLocation = $_POST["eventLocation"];
        $eventType = $_POST["eventType"];

        $stmt = $this->conn->prepare("INSERT INTO EVENTO (Nombre, Localizacion, Tipo) VALUES (:eventName, :eventLocation, :eventType)");
        $stmt->bindParam(':eventName', $eventName, PDO::PARAM_STR);
        $stmt->bindParam(':eventLocation', $eventLocation, PDO::PARAM_STR);
        $stmt->bindParam(':eventType', $eventType, PDO::PARAM_STR);
        try {
            // Ejecutar la consulta
            $stmt->execute();
            echo "Evento creado correctamente.";
            // Inicializar el array en la sesión si no existe
            if (!isset($_SESSION["eventName"])) {
                $_SESSION["eventName"] = array();
            }
            // Agregar el nombre del evento al array en la sesión
            $_SESSION["eventName"][] = $eventName;
            if (isset($_SESSION["eventName"])) {
                foreach ($_SESSION["eventName"] as $event) {
                }
            };
        } catch (PDOException $e) {
            die("Error en la inserción del evento: " . $e->getMessage());
        }
        echo '<script>window.location.href = "../view/admin_profile.php";</script>';
        exit();

    }
}
