!function() {
    "use strict";
    var e, t, n, a, o = localStorage.getItem("language"), s = "fr";  // Langue par défaut est le français

    // Fonction pour changer la langue et l'image du drapeau
    function l(e) {
        // Mise à jour de l'image du drapeau
        var flagImg = document.getElementById("header-lang-img");

        if (flagImg) {
            if (e === "fr") {
                flagImg.src = "https://flagcdn.com/w20/fr.png";  // Drapeau de la France
            } else if (e === "en") {
                flagImg.src = "https://flagcdn.com/w20/us.png";  // Drapeau des États-Unis
            } else if (e === "es") {
                flagImg.src = "https://flagcdn.com/w20/es.png";  // Drapeau de l'Espagne
            } else if (e === "de") {
                flagImg.src = "https://flagcdn.com/w20/de.png";  // Drapeau de l'Allemagne
            } else if (e === "it") {
                flagImg.src = "https://flagcdn.com/w20/it.png";  // Drapeau de l'Italie
            }
        }

        // Sauvegarder la langue dans localStorage
        localStorage.setItem("language", e);
        o = localStorage.getItem("language");

        // Charger le fichier de traduction correspondant à la langue sélectionnée
        function loadLanguage() {
            var e = new XMLHttpRequest();
            e.open("GET", "/assets/lang/" + o + ".json", true);
            e.onreadystatechange = function() {
                var n;
                if (e.readyState === 4 && e.status === 200) {
                    n = JSON.parse(e.responseText);
                    Object.keys(n).forEach(function(t) {
                        document.querySelectorAll("[data-key='" + t + "']").forEach(function(e) {
                            e.textContent = n[t];
                        });
                    });
                }
            };
            e.send();
        }

        loadLanguage();
    }

    // Lors du chargement de la page, vérifier si une langue est définie
    window.onload = function() {
        if (!o) {
            l(s);  // Si aucune langue n'est définie, charger la langue par défaut (français)
        } else {
            l(o);
        }
    };

    // Lors de l'interaction avec les éléments de la liste des langues, changer la langue et le drapeau
    document.addEventListener("DOMContentLoaded", function() {
        var languageItems = document.querySelectorAll(".language");
        languageItems.forEach(function(t) {
            t.addEventListener("click", function() {
                l(t.getAttribute("data-lang"));
            });
        });
    });

}();
