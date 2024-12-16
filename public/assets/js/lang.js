(function() {
    "use strict"; // Active le mode strict pour éviter certaines erreurs courantes

    // Langue par défaut (français)
    const defaultLanguage = "fr";
    // Récupère la langue actuelle depuis le localStorage ou utilise la langue par défaut
    let currentLanguage = localStorage.getItem("language") || defaultLanguage;

    // Fonction pour mettre à jour l'image du drapeau en fonction de la langue choisie
    const updateFlag = (language) => {
        const flagImg = document.getElementById("header-lang-img"); // Sélectionne l'élément image du drapeau
        if (flagImg) {
            // Map des langues aux URL des drapeaux
            const flagMap = {
                fr: "https://flagcdn.com/w20/fr.png", // Drapeau français
                en: "https://flagcdn.com/w20/us.png", // Drapeau anglais
            };
            // Met à jour la source de l'image du drapeau ou utilise le drapeau français par défaut
            flagImg.src = flagMap[language] || flagMap.fr;
        }
    };

    // Fonction pour charger les traductions depuis un fichier JSON
    const loadLanguage = async (language) => {
        try {
            // Récupère le fichier de traduction correspondant à la langue choisie
            const response = await fetch(`/assets/lang/${language}.json`);
            if (!response.ok) throw new Error('Erreur réseau'); // Vérifie si la réponse est correcte
            const translations = await response.json(); // Convertit la réponse en JSON
            
            // Met à jour le contenu des éléments HTML en fonction des traductions
            Object.keys(translations).forEach(key => {
                document.querySelectorAll(`[data-key='${key}']`).forEach(element => {
                    element.textContent = translations[key]; // Met à jour le texte de chaque élément
                });
            });
        } catch (error) {
            console.error('Erreur lors du chargement de la langue :', error); // Affiche une erreur en cas de problème
        }
    };

    // Fonction pour définir la langue choisie par l'utilisateur
    const setLanguage = (language) => {
        localStorage.setItem("language", language); // Sauvegarde la langue choisie dans le localStorage
        currentLanguage = language; // Met à jour la langue actuelle
        updateFlag(language); // Met à jour le drapeau
        loadLanguage(language); // Charge les traductions pour la langue choisie
    };

    // Initialisation au chargement de la page
    window.onload = () => {
        updateFlag(currentLanguage); // Met à jour le drapeau selon la langue actuelle
        loadLanguage(currentLanguage); // Charge les traductions pour la langue actuelle
    };

    // Écouteur d'événements pour les clics sur les éléments de langue
    document.addEventListener("DOMContentLoaded", () => {
        // Sélectionne tous les éléments avec la classe "language" et ajoute un écouteur d'événements
        document.querySelectorAll(".language").forEach(item => {
            item.addEventListener("click", () => setLanguage(item.getAttribute("data-lang"))); // Change la langue au clic
        });
    });
})();