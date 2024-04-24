$(document).ready(function(){
    // Ocultar el div #deleteCookies al cargar la página
    $("#deleteProfile").hide();
    
    // Manejar clic en el botón de aceptar cookies
    $('#deleteButton').click(function(){
        // Mostrar el div #deleteCookies cuando se hace clic en el botón
        $("#deleteProfile").show();
        $("#overlay").show();
    });
    
    // Manejar clic en el botón de denegar la eliminación del perfil
    $('#reject-delete').click(function(){
        // Ocultar el div #deleteCookies cuando se hace clic en el botón "Denegar"
        $("#deleteProfile").hide();
        $("#overlay").hide();
    });
});