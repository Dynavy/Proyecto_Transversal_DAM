
$(document).ready(function () {
    let isEmailValid = false;

    $("input[name='username']").blur(function () {
        // Hacemos la solicitud ajax al servidor 'email_validator.php'.
        let usernameAjax = $(this).val();


        $.ajax({
            url: "../controller/email_validator.php",
            type: "POST",
            dataType: "json",
            data: { username: usernameAjax },
            success: function (data) {
                if (data.message === "Correo válido") {
                    $("#validationMessage").text(data.message).css("color", "green");
                    isEmailValid = true;
                } else {
                    $("#validationMessage").text(data.message).css("color", "red");
                    isEmailValid = false;
                }
            },
            error: function () {
                $("#validationMessage").text("Error al procesar la solicitud").css("color", "red");
                isEmailValid = false;
            }
        });
    });

    // No dejamos que el usuario interactue con el boton de registrar si el correo no es válido.
    $("#registerForm, #adminRegisterForm").submit(function (event) {
        // Prevent form submission if the email is not valid
        if (!isEmailValid) {
            event.preventDefault();
            $("#validationMessage").text("Correo no válido, no se puede registrar").css("color", "red");
        }
    });
});