
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.scss';
import '@fortawesome/fontawesome-free/css/all.min.css';
import '@fortawesome/fontawesome-free/js/all.js';
import Choices from 'choices.js';

document.addEventListener('DOMContentLoaded', () => {
    const grapesSelect = document.getElementById('add_bottle_grapes');

    if (grapesSelect) {
        new Choices(grapesSelect, {
            removeItemButton: true,
            itemSelectText: '',
            searchEnabled: true,
            shouldSort: false,
            renderSelectedChoices: 'always',
        });
    }
});

// Lors que le DOM est entièrement chargé 
document.addEventListener('DOMContentLoaded', () => {
   const ratingContainer = document.querySelector('.rating_container');

   if (ratingContainer) {
    ratingContainer.addEventListener('click', (event) => {

        // Vérifie si élément cliqué est une étoile
            if(event.target && event.target.matches('.star')) {
                const clickedStar = event.target;
                const stars = Array.from(document.querySelectorAll('.rating .star'));
    
                stars.forEach((star, index) => {
                    // Ajoute ou enlève classe active en fonction de ce que l'utilisateur sélectionne
                    index <= stars.indexOf(clickedStar) ? star.classList.add('active') : star.classList.remove('active');
                });
    
                // Met à jour valeur input hidden
                document.getElementById('ratingInput').value = stars.indexOf(clickedStar) + 1;
            };
       });
   };
});

// Gestion affichage popin page unitCave
document.querySelectorAll('.bottle_description').forEach(description => {
    description.addEventListener('click', () => {
        let textElement = description.querySelector('.text');
        let fullText = textElement.getAttribute('data-full');

        if (textElement.textContent.includes("...")) {
            textElement.textContent = fullText; // Affiche le texte entier
            description.querySelector('.textFull_btn').textContent = "Lire moins"; // Change le texte du bouton

        } else {
            textElement.textContent = fullText.substring(0, 100) + "..."; // Re-tronque
            description.querySelector('.textFull_btn').textContent = "Lire plus"; // Change le texte du bouton
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const imageInput = document.getElementById("add_bottle_imageFile"); // Input de type file
    const previewImage = document.getElementById("img_preview"); // L'image d'aperçu
    const imageSpan = document.getElementById("image_span"); // Le texte "Aucune image téléchargée"

    // Par défaut, on affiche le texte "Aucune image téléchargée" et on cache l'image
    previewImage.style.display = "none"; 
    imageSpan.style.display = "block"; 

    // Lorsque l'utilisateur sélectionne un fichier
    imageInput.addEventListener("change", function () {
        const file = this.files[0]; // On récupère le premier fichier sélectionné

        // Si un fichier est sélectionné
        if (file) {
            const reader = new FileReader(); // Créer un lecteur de fichier

            reader.onload = function (event) {
                // Lorsque le fichier est lu, on met l'URL de l'image dans l'élément <img>
                previewImage.src = event.target.result; 
                previewImage.style.display = "block"; // Afficher l'image
                imageSpan.style.display = "none"; // Cacher le texte
            };

            reader.readAsDataURL(file); // Lire le fichier et obtenir l'URL de données
        } else {
            // Si aucun fichier n'est sélectionné, on réinitialise
            previewImage.src = ""; 
            previewImage.style.display = "none"; // Cacher l'image
            imageSpan.style.display = "block"; // Réafficher le texte
        }
    });
});




