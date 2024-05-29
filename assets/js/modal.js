document.addEventListener('DOMContentLoaded', function() {
    const contactButton = document.querySelector('.open-contact-modal');
    const overlay = document.getElementById('contact-popup');
    const popup = overlay.querySelector('.popup');

    const toggleModal = () => {
        const isOpen = overlay.classList.contains('open');
        overlay.classList.toggle('animate-zoom-out', isOpen);
        overlay.classList.toggle('animate-zoom-in', !isOpen);
        overlay.classList.toggle('open');
        // Mettre à jour aria-hidden pour l'accessibilité
        overlay.setAttribute('aria-hidden', String(!isOpen));
        // Gestion du focus pour l'accessibilité
        if (!isOpen) {
            popup.setAttribute('tabindex', '-1');
            popup.focus();
        } else {
            popup.removeAttribute('tabindex');
        }
    };

    contactButton.addEventListener('click', function(event) {
        event.preventDefault();
        toggleModal();
    });

    // Ajouter l'écouteur d'événements pour fermer la modal lorsqu'on clique en dehors de celle-ci
    overlay.addEventListener('click', (event) => {
        if (event.target === overlay) {
            toggleModal();
        }
    });

    // Ajouter l'écouteur pour les touches du clavier
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && overlay.classList.contains('open')) {
            toggleModal();
        }
    });
});
