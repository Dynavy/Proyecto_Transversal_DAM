$(document).ready(function () {

    $("#AjaxUpdateEventButton").click(function () {
        // Hacemos la solicitud ajax al servidor 'email_validator.php'.
        let oldEventNameAJAX = $("select[name='eventName']").val();
        let newEventNameAJAX = $("input[name='newEventName']").val();
        let newEventLocationAJAX = $("input[name='newEventLocation']").val();
        let newEventTypeAJAX = $("input[name='newEventType']").val();

       
        $("#newEventNameError").text("");

        if (oldEventNameAJAX === '' || newEventNameAJAX === '' || newEventLocationAJAX === '' || newEventTypeAJAX === '') {
            $("#newEventNameError").text("Todos los campos son obligatorios.").css("color", "red");
            return;
        }

        $.ajax({
            url: "../controller/updateEventAJAX.php",
            type: "POST",
            dataType: "json",
            data: {
                oldEventName: oldEventNameAJAX,
                newEventName: newEventNameAJAX,
                newEventLocation: newEventLocationAJAX,
                newEventType: newEventTypeAJAX
            },
            success: function (data) {

                if (data.message) {

                    window.location.href = "../view/admin_profile.php";
                }

            },
            error: function () {
                console.log("Error al procesar la solicitud.");

            }
        });
    });
});
