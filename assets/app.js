
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
})

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
