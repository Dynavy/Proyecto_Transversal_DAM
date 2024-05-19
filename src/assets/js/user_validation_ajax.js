
// Captura la selección del usuario. 
$("input[name='username']").blur(function() {
    // Hacemos la solicitud ajax al servidor 'email_validator.php'.
    let usernameAjax = $(this).val();
    $.ajax({
        url: "../controller/email_validator.php",
        type: "POST",
        dataType: "json",
        data: { username: usernameAjax},
        success: function(data) {
            if (data.message === "Correo válido") {
                $("#validationMessage").text(data.message).css("color", "green");
            } else {
                $("#validationMessage").text(data.message).css("color", "red");
            }
        },
        error: function() {
            $("#validationMessage").text("Error al procesar la solicitud").css("color", "red");
        }
    });
});