<?php
session_start();


// Mostrar el mensaje de error si está presente
if (isset($_SESSION['error'])) {
    echo "<h1>{$_SESSION['error']}</h1>";
    unset($_SESSION['error']); // Eliminar el mensaje de error después de mostrarlo
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/register.css">
    <script src="../assets/jQuery/jquery-3.7.1.min.js"></script>    
    <script src="../assets/js/jquery.validate.js"></script>
    <script src="../assets/js/additional-methods.js"></script>
    <script src="../assets/js/register-validation.js" defer></script>
    
</head>

<body>

    <div class="container">
        <div class="center">
            <form id="registerForm" action="../controller/UserController.php" method="POST">
                <h1>REGISTRARSE</h1>
                <img id="logo" src="../ASSETS/IMG/findurmusic.png" alt="logo" alt="logo" width="330" height="110">
                <div class="center_text">
                    <div class="moverInput">
                        <label>Email: </label><br>
                            <input id="username" type="text" placeholder="Introduce tus datos..." name="username" required>                
                    </div>
                    <div class="moverInput">
                        <label for="pass">Contraseña:</label><br>
                        <input type="password" id="password" name="password" placeholder="Escribe la contraseña..." required>
                    </div>
                    <div class="moverInput">
                        <label for="confirmPass">Confirmar contraseña:</label><br>
                        <input type="password" required id="confirm_password" name="confirm_password" placeholder="Confirma la contraseña..." required>
                    </div>

                    <div class="moureBotons">
                        <input type="submit" value="Registre" name="register">
                        <input type="reset" value="Clear form">
                    </div>
                    <a href="index.php">
                        <p id="volver">Volver a la página principal</p>
                    </a>
                    <input type="hidden" name="esAdmin" value="false">

                </div>
            </form>
        </div>
    </div>

</body>

</html>