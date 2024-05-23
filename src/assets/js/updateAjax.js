$(document).ready(function () {

    $("#updateAjax").click(function () {
        // Hacemos la solicitud ajax al servidor 'email_validator.php'.
        let newEmailAjax = $("input[name='new_username']").val();
        let newPasswordAjax = $("input[name='new_password']").val();
        $.ajax({
            url: "../controller/updateAjax.php",
            type: "POST",
            dataType: "json",
            data: { 
                new_email : newEmailAjax,
                new_password : newPasswordAjax
            },
            success: function (data) {
                if (data.message === "update_sucess") {
                    $("#validationMessage").text(data.message).css("color", "green");
                    window.location.href = "../view/profile.php";
                } else {
                    $("#validationMessage").text(data.message).css("color", "red");
                   
                }
            },
            error: function () {
                $("#validationMessage").text("Error al procesar la solicitud").css("color", "red");
                
            }
        });
    });
});
