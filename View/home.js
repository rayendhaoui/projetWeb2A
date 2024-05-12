document.addEventListener('DOMContentLoaded', function() {
    const headerhome = document.querySelector(".headerhome"); // Sélectionnez l'élément header avec la classe .headerhome
    let prevScrollPos = window.scrollY;

    window.onscroll = function() {
        let currentScrollPos = window.scrollY;
        prevScrollPos > currentScrollPos
            ? headerhome.classList.remove("scroll")
            : headerhome.classList.add("scroll");
        prevScrollPos = currentScrollPos;
    };

    const signinButton = document.getElementById('signinButton');

    // Ajoutez un gestionnaire d'événements au bouton de connexion
    signinButton.addEventListener('click', function(event) {
        // Empêchez le comportement par défaut du bouton (par exemple, soumettre un formulaire)
        event.preventDefault();
        
        // Redirigez vers signin.html
        window.location.href = 'con.html';
    });

    const signupButton = document.getElementById('signupButton');

    // Ajoutez un gestionnaire d'événements au bouton d'inscription
    signupButton.addEventListener('click', function(event) {
        // Empêchez le comportement par défaut du bouton (par exemple, soumettre un formulaire)
        event.preventDefault();
        
        // Redirigez vers signup.html
        window.location.href = 'Untitled-1.html';
    });
     // Ajoutez un gestionnaire d'événements au bouton d'inscription
     getstaredbutton.addEventListener('click', function(event) {
        // Empêchez le comportement par défaut du bouton (par exemple, soumettre un formulaire)
        event.preventDefault();
        
        // Redirigez vers signup.html
        window.location.href = 'societe.html';
    });
});

// Deuxième bloc d'écouteurs DOMContentLoaded pour le clic sur le logo
document.addEventListener('DOMContentLoaded', function() {
    const logo = document.querySelector('.logo-web'); // Sélectionnez l'image du logo
    
    // Ajoutez un gestionnaire d'événements au clic sur l'image du logo
    logo.addEventListener('click', function(event) {
        // Redirigez la page vers home.html pour actualiser la page
        window.location.href = 'home.html';
    });


document.addEventListener('DOMContentLoaded', function() {
    const searchBar = document.getElementById('searchBar');
    const inputField = searchBar.querySelector('.text-wrapper-8');

    // Ajoutez un gestionnaire d'événements au clic sur la zone de recherche
    searchBar.addEventListener('click', function(event) {
        inputField.value = ''; // Effacez le contenu de la zone de recherche
    });
});
    
});
