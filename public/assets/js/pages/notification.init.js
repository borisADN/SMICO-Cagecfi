// document.getElementById("alert").addEventListener("click",function(){alertify.alert("Alert Title","Alert Message!",function(){alertify.success("Ok")})}),document.getElementById("alert-confirm").addEventListener("click",function(){alertify.confirm("This is a confirm dialog.",function(){alertify.success("Ok")},function(){alertify.error("Cancel")})}),document.getElementById("alert-prompt").addEventListener("click",function(){alertify.prompt("This is a prompt dialog.","Default value",function(e,t){alertify.success("Ok: "+t)},function(){alertify.error("Cancel")})}),document.getElementById("alert-success").addEventListener("click",function(){alertify.success("Success message")}),document.getElementById("alert-error").addEventListener("click",function(){alertify.error("Error message")}),document.getElementById("alert-warning").addEventListener("click",function(){alertify.warning("Warning message")}),document.getElementById("alert-message").addEventListener("click",function(){alertify.message("Normal message")});




// le code initial etait trop strict 
//on ne pouvait pas utiliser une alerte specifique 
// soit tu utilise tout ou tu n'utilise rien !



// Fonction pour attacher un gestionnaire d'événement si l'élément existe
function addAlertListener(id, callback) {
    const element = document.getElementById(id);
    if (element) {
        element.addEventListener("click", callback);
    }
}

// Attache les événements aux éléments disponibles
addAlertListener("alert", function () {
    alertify.alert("Alert Title", "Alert Message!", function () {
        alertify.success("Ok");
    });
});

addAlertListener("alert-confirm", function () {
    alertify.confirm(
        "This is a confirm dialog.",
        function () {
            alertify.success("Ok");
        },
        function () {
            alertify.error("Cancel");
        }
    );
});

addAlertListener("alert-prompt", function () {
    alertify.prompt(
        "This is a prompt dialog.",
        "Default value",
        function (e, t) {
            alertify.success("Ok: " + t);
        },
        function () {
            alertify.error("Cancel");
        }
    );
});

addAlertListener("alert-success", function () {
    alertify.success("Success message");
});

addAlertListener("alert-error", function () {
    alertify.error("Error message");
});

addAlertListener("alert-warning", function () {
    alertify.warning("Warning message");
});

addAlertListener("alert-message", function () {
    alertify.message("Normal message");
});
