function showAlert(message, type = "danger", icon = "uil-exclamation-octagon") {
    // Crée l'élément de l'alerte
    const alertContainer = document.createElement("div");
    alertContainer.className = `alert alert-${type} alert-dismissible fade show`;
    alertContainer.setAttribute("role", "alert");

    // Contenu de l'alerte
    alertContainer.innerHTML = `
        <i class="uil ${icon} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;

    // Ajoute l'alerte dans un conteneur prévu pour les notifications
    const alertPlaceholder = document.getElementById("alert-placeholder");
    if (alertPlaceholder) {
        alertPlaceholder.appendChild(alertContainer);
    }
}
