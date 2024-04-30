<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="../assets/css/admin_profile.css">
</head>

<body>
    <div class="centrar">
        <img id="img_fondo" src="../ASSETS/IMG/findurmusic.png" alt="logo_header_user" width="600px">
        <header>
            <div class="header_usuario">
                <div class="update_class">
                    <h1>Admin Nombre</h1>
                    <div class="update_a">
                        <button onclick="window.location.href='update_profile.php'">
                            <p>EDIT PROFILE</p>
                    </button>
                    <button onclick="window.location.href='update_profile.php';">
                            <p>DELETE PROFILE</p>
                        </button>
                    </div>
                </div>

                <div class="texto_derecha">
                    <img class="texto_derecha" src="../ASSETS/IMG/login_usuario.png" alt="login_user" width="120px">
                    <div class="texto_usuario">
                        <p class="text1"> Usuarios Totales</p>
                        <p class="text1">Posts Totales</p>
                        <p class="text1">Reventas Totales</p>
                    </div>
                </div>
            </div>
            <div class="artistas">
                <h2>Herramientas Admin</h2>
                <ul>
                    <li>Usuarios Administradores</li>
                    <li>Posts Administrados</li>
                    <li>Reportes Financieros</li>
                </ul>
            </div>
            <br>
        </header>
        <footer>
            <p id="Muro">
                Admin Dashboard
                *Interacciones del Admin en el Dashboard*
            </p>
        </footer>
        <a href="index.php">
            <p id="volver">Volver a la página principal</p>
        </a>
    </div>
</body>


</html>