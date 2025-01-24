function showSpinner(message = "Chargement en cours...") {
    const spinnerAlert = document.getElementById('custom-spinner-alert');
    const spinnerText = document.getElementById('custom-spinner-text');

    spinnerText.textContent = message; // Définit le message personnalisé
    spinnerAlert.style.display = 'flex'; // Affiche le spinner
}

function hideSpinner() {
    const spinnerAlert = document.getElementById('custom-spinner-alert');
    spinnerAlert.style.display = 'none'; // Masque le spinner
}