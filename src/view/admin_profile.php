<?php
session_start();

?>


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
                        <li><button id="openCreateModal">1. CREATE EVENT</button></li>
                        <li><button id="openUpdateModal">2. UPDATE EVENT</button></li>
                        <li><button id="openDeleteModal">3. DELETE EVENT</button></li>
                        <br>
                        <?php
                        if (isset($_SESSION['success_message'])) {
                            echo '<span class="success-message">' . $_SESSION['success_message'] . '</p>';
                            unset($_SESSION['success_message']); // Limpiar el mensaje después de mostrarlo
                        }
                        ?>
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

            <form id="eventForm" action="../controller/XController.php" method="POST">

                <label for="nombre_concierto">Nombre del Concierto:</label>
                <input type="text" id="nombre_concierto" name="eventName" required>

                <label for="precio_entradas">Precio de Entradas:</label>
                <input type="text" id="precio_entradas" name="eventPrice" required>

                <label for="tipo_evento">Tipo de evento:</label>
                <input type="text" id="tipo_evento" name="eventType" required>

                <label for="localizacion_evento">Localizacion del evento:</label>
                <input type="text" id="localizacion_evento" name="eventLocation" required>

                <label for="info_concierto">Información del Concierto:</label>
                <textarea id="info_concierto" rows="5" cols="50" name="info_concierto" required></textarea>

                <label for="artistas">Artistas/Grupos:</label>
                <textarea type="text" id="artistas" name="eventArtists" required></textarea><br>

                <input type="submit" value="Crear Evento" name="createEvent" required>
            </form>
        </div>
    </div>

    <!-- MODAL PARA LA ACTUALIZACIÓN DE UN EVENTO: -->
    <div id="updateModal" class="updateModal">
        <div class="updateModal-content">
            <span class="close2">&times;</span>

            <form id="updateForm" action="../controller/XController.php" method="POST">

                <label for="nombre_concierto">Conciertos a modificar:</label>

                <?php if (isset($_SESSION["eventName"])) {

                    $nombres = $_SESSION["eventName"];

                    echo '<select name="eventName">';

                    foreach ($nombres as $nombre) {
                        echo '<option value="' . $nombre . '">' . $nombre . '</option>';
                    }

                    echo '</select>';
                    echo '<br>';


                } else {
                    echo '<p style="color: red;">No hay eventos creados.</p>';
                }

                ?>

                <label for="precio_entradas">Modificar precio:</label>
                <input type="text" id="precio_entradas" name="eventPrice" required>

                <label for="tipo_evento">Modificar tipo de evento:</label>
                <input type="text" id="tipo_evento" name="eventType" required>

                <label for="localizacion_evento">Modificar localización:</label>
                <input type="text" id="localizacion_evento" name="eventLocation" required>

                <label for="info_concierto">Modificiar información:</label>
                <textarea id="info_concierto" rows="5" cols="50" name="info_concierto" required></textarea>

                <label for="artistas">Modificar Artistas/Grupos:</label>
                <textarea type="text" id="artistas" rows="2" cols="20" name="eventArtists" required></textarea>
                <br>
                <input type="submit" value="Actualizar Evento" name="updateEvent" required>
            </form>
        </div>
    </div>

    <!-- MODAL PARA LA ELIMINACIÓN DE UN EVENTO: -->
    <div id="deleteModal" class="deleteModal">
        <div class="deleteModal-content">
            <span class="close3">&times;</span>

            <form id="deleteForm" action="../controller/XController.php" method="POST">

                <label for="nombre_concierto">Conciertos a eliminar:</label>

                <?php if (isset($_SESSION["eventName"])) {

                    $nombres = $_SESSION["eventName"];

                    echo '<select name="eventName">';

                    foreach ($nombres as $nombre) {
                        echo '<option value="' . $nombre . '">' . $nombre . '</option>';
                    }

                    echo '</select>';
                    echo '<br>';


                } else {
                    echo '<p style="color: red;">No hay eventos creados.</p>';
                }

                ?>

                <input type="submit" value="Eliminar Evento" name="deleteEvent" required>
            </form>
        </div>
    </div>


</body>

</html>