// Attend que le DOM soit chargé avant d'exécuter le code
document.addEventListener("DOMContentLoaded", function() {

    
    // Initialise un compteur pour numéroter les questions
    let questionCounter = 0;


    // Sélectionne l'élément HTML qui contiendra les questions
    const questionsContainer = document.getElementById("questionsContainer");


    // Sélectionne le bouton qui permettra d'ajouter une nouvelle question
    const addQuestionBtn = document.getElementById("addQuestionBtn");

    // Ajoute un écouteur d'événement au clic sur le bouton "Ajouter une question"
    addQuestionBtn.addEventListener("click", function() {


        // Incrémente le compteur de questions à chaque clic sur le bouton
        questionCounter++;


        // Crée un nouvel élément div pour contenir la nouvelle question
        const newQuestionDiv = document.createElement("div");


        // Ajoute une classe CSS à l'élément div créé
        newQuestionDiv.classList.add("question");


        // Définit le contenu HTML de l'élément div avec une chaîne de caractères contenant un libellé de question et un champ de saisie
        newQuestionDiv.innerHTML = `
            <label for="question${questionCounter}">Question ${questionCounter} :</label><br>
            <input type="text" id="question${questionCounter}" name="questions[]" required><br><br>

            `;
        // Ajoute le nouvel élément div contenant la question à l'élément qui contient toutes les questions
        questionsContainer.appendChild(newQuestionDiv);
    });
});
