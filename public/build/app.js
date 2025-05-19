"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.array.from.js */ "./node_modules/core-js/modules/es.array.from.js");
/* harmony import */ var core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_array_includes_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.array.includes.js */ "./node_modules/core-js/modules/es.array.includes.js");
/* harmony import */ var core_js_modules_es_array_includes_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_includes_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_array_index_of_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.array.index-of.js */ "./node_modules/core-js/modules/es.array.index-of.js");
/* harmony import */ var core_js_modules_es_array_index_of_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_index_of_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.string.includes.js */ "./node_modules/core-js/modules/es.string.includes.js");
/* harmony import */ var core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/esnext.iterator.constructor.js */ "./node_modules/core-js/modules/esnext.iterator.constructor.js");
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/esnext.iterator.for-each.js */ "./node_modules/core-js/modules/esnext.iterator.for-each.js");
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");
/* harmony import */ var _fortawesome_fontawesome_free_css_all_min_css__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! @fortawesome/fontawesome-free/css/all.min.css */ "./node_modules/@fortawesome/fontawesome-free/css/all.min.css");
/* harmony import */ var _fortawesome_fontawesome_free_js_all_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! @fortawesome/fontawesome-free/js/all.js */ "./node_modules/@fortawesome/fontawesome-free/js/all.js");
/* harmony import */ var _fortawesome_fontawesome_free_js_all_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_fortawesome_fontawesome_free_js_all_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var choices_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! choices.js */ "./node_modules/choices.js/public/assets/scripts/choices.mjs");










/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */





///////////////////////////////////////////////////////////////////////////////////////////

// Gestion select déroulant dans form addBottle avec Choices.js

document.addEventListener('DOMContentLoaded', function () {
  var grapesSelect = document.getElementById('add_bottle_grapes');
  if (grapesSelect) {
    new choices_js__WEBPACK_IMPORTED_MODULE_13__["default"](grapesSelect, {
      removeItemButton: true,
      itemSelectText: '',
      searchEnabled: true,
      shouldSort: false,
      renderSelectedChoices: 'always'
    });
  }
});

///////////////////////////////////////////////////////////////////////////////////////////

// Gestion display notes de cave via svg étoiles dans les caves 

// Lors que le DOM est entièrement chargé 
document.addEventListener('DOMContentLoaded', function () {
  var ratingContainer = document.querySelector('.rating_container');
  if (ratingContainer) {
    ratingContainer.addEventListener('click', function (event) {
      // Vérifie si élément cliqué est une étoile
      if (event.target && event.target.matches('.star')) {
        var clickedStar = event.target;
        var stars = Array.from(document.querySelectorAll('.rating .star'));
        stars.forEach(function (star, index) {
          // Ajoute ou enlève classe active en fonction de ce que l'utilisateur sélectionne
          index <= stars.indexOf(clickedStar) ? star.classList.add('active') : star.classList.remove('active');
        });

        // Met à jour valeur input hidden
        document.getElementById('ratingInput').value = stars.indexOf(clickedStar) + 1;
      }
      ;
    });
  }
  ;
});

///////////////////////////////////////////////////////////////////////////////////////////

// Gestion affichage fullText pour les descriptions de bouteilles -> page unitCave

document.querySelectorAll('.bottle_description').forEach(function (description) {
  description.addEventListener('click', function () {
    var textElement = description.querySelector('.text');
    var fullText = textElement.getAttribute('data-full');
    if (textElement.textContent.includes("...")) {
      textElement.textContent = fullText; // Affiche le texte entier
      description.querySelector('.textFull_btn').textContent = "Lire moins"; // Change le texte du bouton
    } else {
      textElement.textContent = fullText.substring(0, 100) + "..."; // Re-tronque
      description.querySelector('.textFull_btn').textContent = "Lire plus"; // Change le texte du bouton
    }
  });
});

///////////////////////////////////////////////////////////////////////////////////////////

// Gestion thumbnail avec FileLoader() pour form addBottle 

document.addEventListener("DOMContentLoaded", function () {
  var imageInput = document.getElementById("add_bottle_imageFile"); // Input de type file
  var previewImage = document.getElementById("img_preview"); // L'image d'aperçu
  var imageSpan = document.getElementById("image_span"); // Le texte "Aucune image téléchargée"

  // Par défaut, on affiche le texte "Aucune image téléchargée" et on cache l'image
  previewImage.style.display = "none";
  imageSpan.style.display = "block";

  // Lorsque l'utilisateur sélectionne un fichier
  imageInput.addEventListener("change", function () {
    var file = this.files[0]; // On récupère le premier fichier sélectionné

    // Si un fichier est sélectionné
    if (file) {
      var reader = new FileReader(); // Créer un lecteur de fichier

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

// GESTION BURGER MENU RESPONSIVE 
var burgerMenu = document.querySelector('.burger_menu');
var menu = document.querySelector('.burger_bg');
var burgerIcon = document.querySelector('.burger_icon');
burgerMenu.addEventListener('click', function () {
  menu.classList.toggle('active');
  burgerMenu.classList.toggle('active');
  if (burgerIcon.innerHTML === "<i class='fa-solid fa-bars'></i>") {
    burgerIcon.innerHTML = '<i class="fa-solid fa-xmark"></i>';
  } else {
    burgerIcon.innerHTML = '<i class="fa-solid fa-xmark"></i>';
  }
});

/***/ }),

/***/ "./assets/styles/app.scss":
/*!********************************!*\
  !*** ./assets/styles/app.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_fortawesome_fontawesome-free_js_all_js-node_modules_fortawesome_fontawes-f9891c"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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Q2hDLENBQUMsTUFBTTtNQUNIO01BQ0FKLFlBQVksQ0FBQ1MsR0FBRyxHQUFHLEVBQUU7TUFDckJULFlBQVksQ0FBQ0UsS0FBSyxDQUFDQyxPQUFPLEdBQUcsTUFBTSxDQUFDLENBQUM7TUFDckNGLFNBQVMsQ0FBQ0MsS0FBSyxDQUFDQyxPQUFPLEdBQUcsT0FBTyxDQUFDLENBQUM7SUFDdkM7RUFDSixDQUFDLENBQUM7QUFDTixDQUFDLENBQUM7O0FBRUY7QUFDQSxJQUFNUyxVQUFVLEdBQUcvQyxRQUFRLENBQUNVLGFBQWEsQ0FBQyxjQUFjLENBQUM7QUFDekQsSUFBTXNDLElBQUksR0FBR2hELFFBQVEsQ0FBQ1UsYUFBYSxDQUFDLFlBQVksQ0FBQztBQUNqRCxJQUFNdUMsVUFBVSxHQUFHakQsUUFBUSxDQUFDVSxhQUFhLENBQUMsY0FBYyxDQUFDO0FBRXpEcUMsVUFBVSxDQUFDOUMsZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFlBQ3JDO0VBQ0krQyxJQUFJLENBQUN6QixTQUFTLENBQUMyQixNQUFNLENBQUMsUUFBUSxDQUFDO0VBQy9CSCxVQUFVLENBQUN4QixTQUFTLENBQUMyQixNQUFNLENBQUMsUUFBUSxDQUFDO0VBRXJDLElBQUlELFVBQVUsQ0FBQ0UsU0FBUyxLQUFLLGtDQUFrQyxFQUFFO0lBQzdERixVQUFVLENBQUNFLFNBQVMsR0FBRyxtQ0FBbUM7RUFDOUQsQ0FBQyxNQUFNO0lBQ0hGLFVBQVUsQ0FBQ0UsU0FBUyxHQUFHLG1DQUFtQztFQUM5RDtBQUNKLENBQUMsQ0FBQzs7Ozs7Ozs7Ozs7QUNySUYiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zdHlsZXMvYXBwLnNjc3MiXSwic291cmNlc0NvbnRlbnQiOlsiXG4vKlxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxuICpcbiAqIFRoaXMgZmlsZSB3aWxsIGJlIGluY2x1ZGVkIG9udG8gdGhlIHBhZ2UgdmlhIHRoZSBpbXBvcnRtYXAoKSBUd2lnIGZ1bmN0aW9uLFxuICogd2hpY2ggc2hvdWxkIGFscmVhZHkgYmUgaW4geW91ciBiYXNlLmh0bWwudHdpZy5cbiAqL1xuaW1wb3J0ICcuL3N0eWxlcy9hcHAuc2Nzcyc7XG5pbXBvcnQgJ0Bmb3J0YXdlc29tZS9mb250YXdlc29tZS1mcmVlL2Nzcy9hbGwubWluLmNzcyc7XG5pbXBvcnQgJ0Bmb3J0YXdlc29tZS9mb250YXdlc29tZS1mcmVlL2pzL2FsbC5qcyc7XG5pbXBvcnQgQ2hvaWNlcyBmcm9tICdjaG9pY2VzLmpzJztcblxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy9cblxuLy8gR2VzdGlvbiBzZWxlY3QgZMOpcm91bGFudCBkYW5zIGZvcm0gYWRkQm90dGxlIGF2ZWMgQ2hvaWNlcy5qc1xuXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCdET01Db250ZW50TG9hZGVkJywgKCkgPT4ge1xuICAgIGNvbnN0IGdyYXBlc1NlbGVjdCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdhZGRfYm90dGxlX2dyYXBlcycpO1xuXG4gICAgaWYgKGdyYXBlc1NlbGVjdCkge1xuICAgICAgICBuZXcgQ2hvaWNlcyhncmFwZXNTZWxlY3QsIHtcbiAgICAgICAgICAgIHJlbW92ZUl0ZW1CdXR0b246IHRydWUsXG4gICAgICAgICAgICBpdGVtU2VsZWN0VGV4dDogJycsXG4gICAgICAgICAgICBzZWFyY2hFbmFibGVkOiB0cnVlLFxuICAgICAgICAgICAgc2hvdWxkU29ydDogZmFsc2UsXG4gICAgICAgICAgICByZW5kZXJTZWxlY3RlZENob2ljZXM6ICdhbHdheXMnLFxuICAgICAgICB9KTtcbiAgICB9XG59KTtcblxuLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vL1xuXG4vLyBHZXN0aW9uIGRpc3BsYXkgbm90ZXMgZGUgY2F2ZSB2aWEgc3ZnIMOpdG9pbGVzIGRhbnMgbGVzIGNhdmVzIFxuXG4vLyBMb3JzIHF1ZSBsZSBET00gZXN0IGVudGnDqHJlbWVudCBjaGFyZ8OpIFxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignRE9NQ29udGVudExvYWRlZCcsICgpID0+IHtcbiAgIGNvbnN0IHJhdGluZ0NvbnRhaW5lciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5yYXRpbmdfY29udGFpbmVyJyk7XG5cbiAgIGlmIChyYXRpbmdDb250YWluZXIpIHtcbiAgICByYXRpbmdDb250YWluZXIuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoZXZlbnQpID0+IHtcblxuICAgICAgICAvLyBWw6lyaWZpZSBzaSDDqWzDqW1lbnQgY2xpcXXDqSBlc3QgdW5lIMOpdG9pbGVcbiAgICAgICAgICAgIGlmKGV2ZW50LnRhcmdldCAmJiBldmVudC50YXJnZXQubWF0Y2hlcygnLnN0YXInKSkge1xuICAgICAgICAgICAgICAgIGNvbnN0IGNsaWNrZWRTdGFyID0gZXZlbnQudGFyZ2V0O1xuICAgICAgICAgICAgICAgIGNvbnN0IHN0YXJzID0gQXJyYXkuZnJvbShkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcucmF0aW5nIC5zdGFyJykpO1xuICAgIFxuICAgICAgICAgICAgICAgIHN0YXJzLmZvckVhY2goKHN0YXIsIGluZGV4KSA9PiB7XG4gICAgICAgICAgICAgICAgICAgIC8vIEFqb3V0ZSBvdSBlbmzDqHZlIGNsYXNzZSBhY3RpdmUgZW4gZm9uY3Rpb24gZGUgY2UgcXVlIGwndXRpbGlzYXRldXIgc8OpbGVjdGlvbm5lXG4gICAgICAgICAgICAgICAgICAgIGluZGV4IDw9IHN0YXJzLmluZGV4T2YoY2xpY2tlZFN0YXIpID8gc3Rhci5jbGFzc0xpc3QuYWRkKCdhY3RpdmUnKSA6IHN0YXIuY2xhc3NMaXN0LnJlbW92ZSgnYWN0aXZlJyk7XG4gICAgICAgICAgICAgICAgfSk7XG4gICAgXG4gICAgICAgICAgICAgICAgLy8gTWV0IMOgIGpvdXIgdmFsZXVyIGlucHV0IGhpZGRlblxuICAgICAgICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdyYXRpbmdJbnB1dCcpLnZhbHVlID0gc3RhcnMuaW5kZXhPZihjbGlja2VkU3RhcikgKyAxO1xuICAgICAgICAgICAgfTtcbiAgICAgICB9KTtcbiAgIH07XG59KTtcblxuLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vL1xuXG4vLyBHZXN0aW9uIGFmZmljaGFnZSBmdWxsVGV4dCBwb3VyIGxlcyBkZXNjcmlwdGlvbnMgZGUgYm91dGVpbGxlcyAtPiBwYWdlIHVuaXRDYXZlXG5cbmRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5ib3R0bGVfZGVzY3JpcHRpb24nKS5mb3JFYWNoKGRlc2NyaXB0aW9uID0+IHtcbiAgICBkZXNjcmlwdGlvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpID0+IHtcbiAgICAgICAgbGV0IHRleHRFbGVtZW50ID0gZGVzY3JpcHRpb24ucXVlcnlTZWxlY3RvcignLnRleHQnKTtcbiAgICAgICAgbGV0IGZ1bGxUZXh0ID0gdGV4dEVsZW1lbnQuZ2V0QXR0cmlidXRlKCdkYXRhLWZ1bGwnKTtcblxuICAgICAgICBpZiAodGV4dEVsZW1lbnQudGV4dENvbnRlbnQuaW5jbHVkZXMoXCIuLi5cIikpIHtcbiAgICAgICAgICAgIHRleHRFbGVtZW50LnRleHRDb250ZW50ID0gZnVsbFRleHQ7IC8vIEFmZmljaGUgbGUgdGV4dGUgZW50aWVyXG4gICAgICAgICAgICBkZXNjcmlwdGlvbi5xdWVyeVNlbGVjdG9yKCcudGV4dEZ1bGxfYnRuJykudGV4dENvbnRlbnQgPSBcIkxpcmUgbW9pbnNcIjsgLy8gQ2hhbmdlIGxlIHRleHRlIGR1IGJvdXRvblxuXG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICB0ZXh0RWxlbWVudC50ZXh0Q29udGVudCA9IGZ1bGxUZXh0LnN1YnN0cmluZygwLCAxMDApICsgXCIuLi5cIjsgLy8gUmUtdHJvbnF1ZVxuICAgICAgICAgICAgZGVzY3JpcHRpb24ucXVlcnlTZWxlY3RvcignLnRleHRGdWxsX2J0bicpLnRleHRDb250ZW50ID0gXCJMaXJlIHBsdXNcIjsgLy8gQ2hhbmdlIGxlIHRleHRlIGR1IGJvdXRvblxuICAgICAgICB9XG4gICAgfSk7XG59KTtcblxuLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vL1xuXG4vLyBHZXN0aW9uIHRodW1ibmFpbCBhdmVjIEZpbGVMb2FkZXIoKSBwb3VyIGZvcm0gYWRkQm90dGxlIFxuXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiRE9NQ29udGVudExvYWRlZFwiLCBmdW5jdGlvbiAoKSB7XG4gICAgY29uc3QgaW1hZ2VJbnB1dCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiYWRkX2JvdHRsZV9pbWFnZUZpbGVcIik7IC8vIElucHV0IGRlIHR5cGUgZmlsZVxuICAgIGNvbnN0IHByZXZpZXdJbWFnZSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiaW1nX3ByZXZpZXdcIik7IC8vIEwnaW1hZ2UgZCdhcGVyw6d1XG4gICAgY29uc3QgaW1hZ2VTcGFuID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJpbWFnZV9zcGFuXCIpOyAvLyBMZSB0ZXh0ZSBcIkF1Y3VuZSBpbWFnZSB0w6lsw6ljaGFyZ8OpZVwiXG5cbiAgICAvLyBQYXIgZMOpZmF1dCwgb24gYWZmaWNoZSBsZSB0ZXh0ZSBcIkF1Y3VuZSBpbWFnZSB0w6lsw6ljaGFyZ8OpZVwiIGV0IG9uIGNhY2hlIGwnaW1hZ2VcbiAgICBwcmV2aWV3SW1hZ2Uuc3R5bGUuZGlzcGxheSA9IFwibm9uZVwiOyBcbiAgICBpbWFnZVNwYW4uc3R5bGUuZGlzcGxheSA9IFwiYmxvY2tcIjsgXG5cbiAgICAvLyBMb3JzcXVlIGwndXRpbGlzYXRldXIgc8OpbGVjdGlvbm5lIHVuIGZpY2hpZXJcbiAgICBpbWFnZUlucHV0LmFkZEV2ZW50TGlzdGVuZXIoXCJjaGFuZ2VcIiwgZnVuY3Rpb24gKCkge1xuICAgICAgICBjb25zdCBmaWxlID0gdGhpcy5maWxlc1swXTsgLy8gT24gcsOpY3Vww6hyZSBsZSBwcmVtaWVyIGZpY2hpZXIgc8OpbGVjdGlvbm7DqVxuXG4gICAgICAgIC8vIFNpIHVuIGZpY2hpZXIgZXN0IHPDqWxlY3Rpb25uw6lcbiAgICAgICAgaWYgKGZpbGUpIHtcbiAgICAgICAgICAgIGNvbnN0IHJlYWRlciA9IG5ldyBGaWxlUmVhZGVyKCk7IC8vIENyw6llciB1biBsZWN0ZXVyIGRlIGZpY2hpZXJcblxuICAgICAgICAgICAgcmVhZGVyLm9ubG9hZCA9IGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgICAgICAgICAgIC8vIExvcnNxdWUgbGUgZmljaGllciBlc3QgbHUsIG9uIG1ldCBsJ1VSTCBkZSBsJ2ltYWdlIGRhbnMgbCfDqWzDqW1lbnQgPGltZz5cbiAgICAgICAgICAgICAgICBwcmV2aWV3SW1hZ2Uuc3JjID0gZXZlbnQudGFyZ2V0LnJlc3VsdDsgXG4gICAgICAgICAgICAgICAgcHJldmlld0ltYWdlLnN0eWxlLmRpc3BsYXkgPSBcImJsb2NrXCI7IC8vIEFmZmljaGVyIGwnaW1hZ2VcbiAgICAgICAgICAgICAgICBpbWFnZVNwYW4uc3R5bGUuZGlzcGxheSA9IFwibm9uZVwiOyAvLyBDYWNoZXIgbGUgdGV4dGVcbiAgICAgICAgICAgIH07XG5cbiAgICAgICAgICAgIHJlYWRlci5yZWFkQXNEYXRhVVJMKGZpbGUpOyAvLyBMaXJlIGxlIGZpY2hpZXIgZXQgb2J0ZW5pciBsJ1VSTCBkZSBkb25uw6llc1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgLy8gU2kgYXVjdW4gZmljaGllciBuJ2VzdCBzw6lsZWN0aW9ubsOpLCBvbiByw6lpbml0aWFsaXNlXG4gICAgICAgICAgICBwcmV2aWV3SW1hZ2Uuc3JjID0gXCJcIjsgXG4gICAgICAgICAgICBwcmV2aWV3SW1hZ2Uuc3R5bGUuZGlzcGxheSA9IFwibm9uZVwiOyAvLyBDYWNoZXIgbCdpbWFnZVxuICAgICAgICAgICAgaW1hZ2VTcGFuLnN0eWxlLmRpc3BsYXkgPSBcImJsb2NrXCI7IC8vIFLDqWFmZmljaGVyIGxlIHRleHRlXG4gICAgICAgIH1cbiAgICB9KTtcbn0pO1xuXG4vLyBHRVNUSU9OIEJVUkdFUiBNRU5VIFJFU1BPTlNJVkUgXG5jb25zdCBidXJnZXJNZW51ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmJ1cmdlcl9tZW51Jyk7XG5jb25zdCBtZW51ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmJ1cmdlcl9iZycpO1xuY29uc3QgYnVyZ2VySWNvbiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5idXJnZXJfaWNvbicpO1xuXG5idXJnZXJNZW51LmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT4gXG57XG4gICAgbWVudS5jbGFzc0xpc3QudG9nZ2xlKCdhY3RpdmUnKTtcbiAgICBidXJnZXJNZW51LmNsYXNzTGlzdC50b2dnbGUoJ2FjdGl2ZScpO1xuXG4gICAgaWYgKGJ1cmdlckljb24uaW5uZXJIVE1MID09PSBcIjxpIGNsYXNzPSdmYS1zb2xpZCBmYS1iYXJzJz48L2k+XCIpIHtcbiAgICAgICAgYnVyZ2VySWNvbi5pbm5lckhUTUwgPSAnPGkgY2xhc3M9XCJmYS1zb2xpZCBmYS14bWFya1wiPjwvaT4nO1xuICAgIH0gZWxzZSB7XG4gICAgICAgIGJ1cmdlckljb24uaW5uZXJIVE1MID0gJzxpIGNsYXNzPVwiZmEtc29saWQgZmEteG1hcmtcIj48L2k+JztcbiAgICB9XG59KVxuIiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG5leHBvcnQge307Il0sIm5hbWVzIjpbIkNob2ljZXMiLCJkb2N1bWVudCIsImFkZEV2ZW50TGlzdGVuZXIiLCJncmFwZXNTZWxlY3QiLCJnZXRFbGVtZW50QnlJZCIsInJlbW92ZUl0ZW1CdXR0b24iLCJpdGVtU2VsZWN0VGV4dCIsInNlYXJjaEVuYWJsZWQiLCJzaG91bGRTb3J0IiwicmVuZGVyU2VsZWN0ZWRDaG9pY2VzIiwicmF0aW5nQ29udGFpbmVyIiwicXVlcnlTZWxlY3RvciIsImV2ZW50IiwidGFyZ2V0IiwibWF0Y2hlcyIsImNsaWNrZWRTdGFyIiwic3RhcnMiLCJBcnJheSIsImZyb20iLCJxdWVyeVNlbGVjdG9yQWxsIiwiZm9yRWFjaCIsInN0YXIiLCJpbmRleCIsImluZGV4T2YiLCJjbGFzc0xpc3QiLCJhZGQiLCJyZW1vdmUiLCJ2YWx1ZSIsImRlc2NyaXB0aW9uIiwidGV4dEVsZW1lbnQiLCJmdWxsVGV4dCIsImdldEF0dHJpYnV0ZSIsInRleHRDb250ZW50IiwiaW5jbHVkZXMiLCJzdWJzdHJpbmciLCJpbWFnZUlucHV0IiwicHJldmlld0ltYWdlIiwiaW1hZ2VTcGFuIiwic3R5bGUiLCJkaXNwbGF5IiwiZmlsZSIsImZpbGVzIiwicmVhZGVyIiwiRmlsZVJlYWRlciIsIm9ubG9hZCIsInNyYyIsInJlc3VsdCIsInJlYWRBc0RhdGFVUkwiLCJidXJnZXJNZW51IiwibWVudSIsImJ1cmdlckljb24iLCJ0b2dnbGUiLCJpbm5lckhUTUwiXSwic291cmNlUm9vdCI6IiJ9