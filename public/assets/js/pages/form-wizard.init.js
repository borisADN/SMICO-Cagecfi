var currentTab = 0;
function showTab(e) {
  var t = document.getElementsByClassName("wizard-tab");
  (t[e].style.display = "block"), (document.getElementById(
    "prevBtn"
  ).style.display =
    0 == e ? "none" : "inline"), e == t.length - 1
    ? (document.getElementById("nextBtn").innerHTML = "Submit")
    : (document.getElementById("nextBtn").innerHTML =
        "Suivant"), fixStepIndicator(e);
}
function nextPrev(e) {
  var t = document.getElementsByClassName("wizard-tab");
  (t[currentTab].style.display = "none"), (currentTab += e) >= t.length &&
    (t[(currentTab -= e)].style.display = "block"), showTab(currentTab);
}
function fixStepIndicator(e) {
  for (
    var t = document.getElementsByClassName("list-item"), n = 0;
    n < t.length;
    n++
  )
    t[n].className = t[n].className.replace(" active", "");
  t[e].className += " active";
}
showTab(currentTab);
var currentTab = 0;
function showTab(e) {
  var t = document.getElementsByClassName("wizard-tab");
  t[e].style.display = "block";

  // Gérer l'affichage des boutons précédent et suivant
  document.getElementById("prevBtn").style.display =
    e === 0 ? "none" : "inline";

    const nextBtn = document.getElementById("nextBtn");

    // Dernière étape
    if (e === t.length - 1) {
        nextBtn.innerHTML = "Soumettre";
    
        // Supprimer tous les anciens gestionnaires d'événements
        nextBtn.replaceWith(nextBtn.cloneNode(true));
        const newNextBtn = document.getElementById("nextBtn");
    
        // Ajouter un gestionnaire pour "TERMINER"
        newNextBtn.addEventListener("click", handleFinish);
    } else {
        nextBtn.innerHTML = "Suivant";
    
        // Supprimer tous les anciens gestionnaires d'événements
        nextBtn.replaceWith(nextBtn.cloneNode(true));
        const newNextBtn = document.getElementById("nextBtn");
    
        // Ajouter un gestionnaire pour "Suivant"
        newNextBtn.addEventListener("click", () => nextPrev(1));
    }

  fixStepIndicator(e);
}

function nextPrev(e) {
  var t = document.getElementsByClassName("wizard-tab");
  (t[currentTab].style.display = "none"), (currentTab += e) >= t.length &&
    (t[(currentTab -= e)].style.display = "block"), showTab(currentTab);
}
function fixStepIndicator(e) {
  for (
    var t = document.getElementsByClassName("list-item"), n = 0;
    n < t.length;
    n++
  )
    t[n].className = t[n].className.replace(" active", "");
  t[e].className += " active";
}
showTab(currentTab);
