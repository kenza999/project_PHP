/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'); // Sélectionne l'élément du menu
const navToggle = document.getElementById('nav-toggle'); // Sélectionne le bouton de bascule du menu
const navClose = document.getElementById('nav-close'); // Sélectionne le bouton de fermeture du menu

/* Menu show */
navToggle.addEventListener('click', () => { // Ajoute un écouteur d'événements pour le clic sur le bouton de bascule
    navMenu.classList.add('show-menu'); // Ajoute la classe 'show-menu' pour afficher le menu
});


/* Menu hidden */
navClose.addEventListener('click', () => { // Ajoute un écouteur d'événements pour le clic sur le bouton de fermeture
    navMenu.classList.remove('show-menu'); // Supprime la classe 'show-menu' pour masquer le menu
});

/*=============== SEARCH ===============*/
const search = document.getElementById('search'), // Sélectionne l'élément du champ de recherche
      searchBtn = document.getElementById('search-btn'), // Sélectionne l'élément du bouton de recherche
      searchClose = document.getElementById('search-close'); // Sélectionne l'élément du bouton de fermeture de la recherche

/* Search show */
searchBtn.addEventListener('click', () => { // Ajoute un écouteur d'événements pour le clic sur le bouton de recherche
    search.classList.add('show-search'); // Ajoute la classe 'show-search' pour afficher la recherche
});


/* Search hidden */
searchClose.addEventListener('click', () => { // Ajoute un écouteur d'événements pour le clic sur le bouton de fermeture de la recherche
search.classList.remove(-'show-search'); // Supprime la classe 'show-search' pour cacher la recherche
});

/*=============== LOGIN =-==============*/
const login = document.getElementById('login'),
loginBtn = document.getElementById('login-btn'),
      loginClose = document.getElementById('login-close')    /* Login show */
      
/* Login hidden */
loginBtn.addEventListener('click', () => { // Ajoute un écouteur d'évé
    login.classList.add('show-login'); // Ajoute la classe 'show-login' pour aff
});
loginClose.addEventListener('click', () => { // Ajoute un écouteur d'évé
    login.classList.remove('show-login'); // Ajoute la classe 'show-login' pour aff
});
/*=============== REGISTER ===============*/

const register = document.getElementById('register'),
      registerBtn = document.getElementById('register-btn'),
      registerClose = document.getElementById('register-close')    /* Register show */
      /* Register hidden */
registerBtn.addEventListener('click', () => { // Ajoute un écouteur d'évé
    register.classList.add('show-register'); // Ajoute la classe'show-register' pour aff
});

registerClose.addEventListener('click', () => { // Ajoute un écouteur d'évé
    register.classList.remove('show-register'); // Ajoute la classe'show-register' pour aff
});

// the below code fragment can be found in:
