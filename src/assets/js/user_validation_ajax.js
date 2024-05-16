
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
            $("#test").html("Validación: " + data);
        },
        error: function() {
        }
    })
});