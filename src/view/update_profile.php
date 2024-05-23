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
    <title>Update Profile</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <script src="../assets/jQuery/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/jquery.validate.js"></script>
    <script src="../assets/js/additional-methods.js"></script>
    <script src="../assets/js/updateProfile-validation.js" defer></script>
    <script src="../assets/js/updateAjax.js" defer></script>
</head>

<body>

    <div class="container">
        <div class="center">
            <form id="updateProfileForm" action="../controller/UserController.php" method="POST">
                <h1>EDITAR PERFIL</h1>
                <img id="logo" src="../ASSETS/IMG/findurmusic.png" alt="logo" alt="logo" width="210" height="200">
                <div class="center_text">
                    <div class="moverInput">
                        <label>Nuevo Email:</label><br>
                        <input id="usuario" type="text" placeholder="Introduce el nuevo correo..." name="new_username"
                            required>
                    </div>
                    <div class="moverInput">
                        <label for="pass">Nueva contraseña:</label><br>
                        <input type="password" id="pass" name="new_password"
                            placeholder="Escribe la nueva contraseña...">
                    </div>

                    <input type="hidden" name="old_username" value="<?php echo $username; ?>">
                    <input type="submit" value="Update" name="update">
                    <input type="button" value="Update Ajax" name="updateAjax" id="updateAjax">

                    <input type="reset" value="Clear form">

                    <a href="index.php">
                        <p id="volver">Volver a la página principal</p>
                    </a>

                </div>



            </form>
        </div>
    </div>


</body>


</html>