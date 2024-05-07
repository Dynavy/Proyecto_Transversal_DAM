<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="../assets/css/admin_profile.css">
    <script src="../assets/jQuery/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/deleteProfile.js" defer></script>
    <script src="../assets/js/modal.js" defer></script>
</head>
<body>
    <div class="overlay" id="overlay"></div>
    <div class="centrar">
        <img id="img_fondo" src="../ASSETS/IMG/findurmusic.png" alt="logo_header_user" width="320" height="300">
        <header>
            <div class="header_usuario">
                <div class="update_class">
                    <h1>Admin Nombre</h1>
                    <div class="update_a">
                        <button onclick="window.location.href='update_profile.php'">
                            <p>EDIT PROFILE</p>
                        </button>

                        <button id="deleteButton">
                            <p>DELETE PROFILE</p>
                        </button>

                    </div>
                </div>

                <div id="deleteProfile">
                    <p>¿Estás seguro de que quieres borrar tu cuenta? Esta acción no se puede deshacer.</p>

                    <form action="../controller/UserController.php" method="POST">
                        <button id="accept-delete" name="accept-delete">Aceptar</button>
                    </form>

                    <button id="reject-delete" name="reject-delete">Denegar</button>
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
                <h2>Admin manage tools:</h2>
                <div class="update_a">
                    <ul>
                        <li><button id="openModalBtn">CREATE EVENT</button></li>
                        <li><button>UPDATE EVENT</button></li>
                        <li><button>DELETE EVENT</button></li>
                    </ul>
                </div>
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

    <!-- MODAL PARA LA CREACION DE UN EVENTO: -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>

            <form id="eventForm" action="process_event.php" method="POST">

                <label for="nombre_concierto">Nombre del Concierto:</label><br>
                <input type="text" id="nombre_concierto" name="nombre_concierto"><br>

                <label for="precio_entradas">Precio de Entradas:</label><br>
                <input type="text" id="precio_entradas" name="precio_entradas"><br>

                <label for="info_concierto">Información del Concierto:</label><br>
                <textarea id="info_concierto"  rows="5" cols="50" name="info_concierto"></textarea><br>

                <label for="artistas">Artistas/Grupos:</label><br>
                <textarea type="text" id="artistas" name="artistas"></textarea><br>

                <input type="submit" value="Crear Evento">
            </form>
        </div>
    </div>
</body>
</html>
