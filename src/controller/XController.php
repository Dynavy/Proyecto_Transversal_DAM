<?php
require_once 'Database.php';
session_start();

//Check if form is submitted
$event = new AdminController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Check button
    if (isset($_POST["login"])) {
        $event->create();
    }
    if (isset($_POST["update"])) {
        $event->update();
    }
    if (isset($_POST["delete"])) {
        $event->delete();
    }
}

class AdminController {
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function create(): void {

        unset($_SESSION["error"]);
        $eventName = $_POST["eventName"];
        $eventPrice = $_POST["eventPrice"];
        $eventLocation = $_POST["eventLocation"];
        $eventArtist = $_POST["eventArtis"];

       

            exit();
        }
    }


?>

