<?php

require_once 'Database.php';
session_start();

//Check if form is submitted
$user = new UserController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Check button
    if (isset($_POST["login"])) {
        $user->login();
    }
    if (isset($_POST["logout"])) {
        $user->logout();
    }
    if (isset($_POST["register"])) {
        $user->register();
    }
    if (isset($_POST["update"])) {
        $user->update();
    }
    if (isset($_POST["accept-delete"])) {
        $user->delete();
    }

}

class UserController
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }


    //update 
    public function update(): void
    {

        $old_username = $_SESSION["user"];
        $new_username = $_POST["new_username"];
        $new_password = $_POST["new_password"];

        try {
            $stmt = $this->conn->prepare("UPDATE USUARIO SET Correo_electronico=:new_username, Contrasena=:new_password WHERE Correo_electronico=:old_username");
            $stmt->bindParam(':new_username', $new_username, PDO::PARAM_STR);
            $stmt->bindParam(':new_password', $new_password, PDO::PARAM_STR);
            $stmt->bindParam(':old_username', $old_username, PDO::PARAM_STR);
            $stmt->execute();
            echo '<script>window.location.href = "../view/profile.php";</script>';
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function delete(): void
    {

        $username = $_SESSION["user"];
        try {
            $stmt = $this->conn->prepare("DELETE FROM Usuario WHERE Correo_electronico=:username");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $this->logout();

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        echo '<script>window.location.href = "../view/index.php";</script>';
    }

    public function login(): void
    {

        // Limpiar cualquier mensaje de error anterior
        unset($_SESSION["error"]);
        $username = $_POST["username"];
        $password = $_POST["password"];
        $is_admin = false;


        try {


            $stmt = $this->conn->prepare("SELECT Correo_electronico, Contrasena, esAdmin FROM USUARIO WHERE Correo_electronico=:username AND Contrasena=:password");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->bindColumn('esAdmin', $is_admin);

            if ($stmt->fetch()) {
                // Verificar si el usuario es administrador
                if ($is_admin) {
                    // Autenticación exitosa para el administrador
                    $_SESSION["logged"] = true;
                    $_SESSION["user"] = $username;
                    $_SESSION["admin"] = true; // Establecer una bandera de sesión para administrador
                    $conn = null;
                    echo '<script>window.location.href = "../view/admin_profile.php";</script>'; // Redirigir al panel de administrador
                    exit();
                } else {
                    // Autenticación exitosa para el usuario normal
                    $_SESSION["logged"] = true;
                    $_SESSION["user"] = $username;
                    $conn = null;
                    echo '<script>window.location.href = "../view/profile.php";</script>'; // Redirigir al panel de usuario normal
                    exit();
                }
            } else {
                // Falló la autenticación, mostrar un mensaje de error
                $_SESSION["logged"] = false;
                $_SESSION["error"] = "Usuario o contraseña incorrectos";
                $conn = null;
                echo '<script>window.location.href = "../view/login.php";</script>';
                exit();
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }



    public function logout(): void
    {

        //clean variables
        unset($_SESSION["logged"]);
        unset($_SESSION["user"]);
        //destroy session
        session_destroy();
        //redirect to index page
        echo '<script>window.location.href = "../view/index.php";</script>';

    }

    //REGISTER USER TO APPLICATION


    public function register(): void
    {

        // Limpiar cualquier mensaje de error anterior
        unset($_SESSION["error"]);
        // Obtener datos del formulario
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Modificar la obtención del valor de isAdmin
        $esAdmin = isset($_POST["esAdmin"]) && $_POST["esAdmin"] === "true";

        // Validar el formato de correo electrónico
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"] = "<span style='color: red;'>Invalid email format, try again please.</span>";
            // Redireccionar al formulario de registro
            if ($esAdmin) {
                $_SESSION["admin"] = true; // Establecer una bandera de sesión para administrador

                echo '<script>window.location.href = "../view/admin_register.php";</script>';
            } else {
                echo '<script>window.location.href = "../view/register.php";</script>';
            }

            exit();
        }

        // Preparar la consulta SQL
        $stmt = $this->conn->prepare("INSERT INTO USUARIO (Correo_electronico, Contrasena, esAdmin) VALUES (:username, :password, :esAdmin)");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':esAdmin', $esAdmin, PDO::PARAM_INT);
        // Ejecutar la consulta SQL
        if ($stmt->execute()) {
            // Registro exitoso, establecer variables de sesión y redirigir
            $_SESSION["logged"] = true;
            $_SESSION["user"] = $username;
            if ($esAdmin) {
                $_SESSION["admin"] = true; // Establecer una bandera de sesión para administrador

                echo '<script>window.location.href = "../view/index.php";</script>';
            } else {
                echo '<script>window.location.href = "../view/index.php";</script>';
            }
            exit();
        } else {
            // Error en la consulta SQL, mostrar un mensaje de error
            $_SESSION["error"] = "Registration failed. Please try again later.";
            echo '<script>window.location.href = "../view/register.php";</script>';
            exit();
        }
    }


}





?>