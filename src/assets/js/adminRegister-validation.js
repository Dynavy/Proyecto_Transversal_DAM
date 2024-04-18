// Validació per el form de admin register.

    $("#adminRegisterForm").validate({
        // Nos permite que los inputs no se muevan al hacer popup las validaciones.
        errorElement: "div",
        errorPlacement: function(error, element) {
            // Insertar el mensaje de error debajo del input correspondiente.
            error.insertAfter(element);
            
            // Estilizar el mensaje de error.
            error.css({
                "font-size": "14px",
                "color": "red"
            });
        },
        rules: {
            username: {
                required: true,
                email: true,
                minlength: 12,
                maxlength: 50
            },
            password: {
                required: true,
                minlength: 10,
                maxlength: 20
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            }            
        },
        messages: {
            // Mensajes personalizados para cada input.
            username: {
                required: "Por favor, introduce tu email.",
                minlength: "El correo electrónico debe tener al menos 12 carácteres.",
                maxlength: "El correo electrónico no puede tener más de 50 carácteres.",
                email: "Por favor, introduzca un formato de correo electrónico válido."
            },
            password: {
                required: "Por favor, introduce tu contraseña.",
                minlength: "La contraseña debe tener al menos 10 carácteres.",
                maxlength: "La contraseña no puede tener más de 20 carácteres."
            },
            confirm_password: {
                required: "Por favor, confirma tu contraseña.",
                equalTo: "Las contraseñas no coinciden."
            }
        },
        // Nos permite que los inputs no se muevan al hacer popup las validaciones.
        errorClass: "Error"
    });
    


