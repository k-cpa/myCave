
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




