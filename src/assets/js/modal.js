$(document).ready(function () {

    // Almacenamos en una variable, el div con la id de modal.
    var modal = document.getElementById("myModal");

    // Almacenamos en una variable, el boton con la id de openModalBtn.
    var btn = document.getElementById("openModalBtn");

    // Span que se encarga de cerrar el modal.
    var span = document.getElementsByClassName("close")[0];

    // Al hacer click en el boton con la id openModalBtn se abre el modal.
    btn.onclick = function () {
        modal.style.display = "block";
    }
    
    // Cerrar al modal darle a la X.
    span.onclick = function () {
        modal.style.display = "none";
    }

  
});