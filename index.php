    <?php get_header(); ?>
    <main>
<!-- About -->
<section id="about-section" class="center-section">
    <div class="about-container">
        <h1>Bonjour, je suis <span class="about__name">Développeur WordPress.</span></h1>
        <img class="about__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/hero.jpg" alt="Photo de développeur" />
        <p class="about__desc">
            Spécialisé dans la création et la gestion de sites web performants et sécurisés. Voici ce que je propose :<br><br>

            - Installation et configuration : Mise en place de WordPress sur votre serveur avec des paramètres optimisés.<br>
            - Développement de thèmes : Conception et personnalisation de thèmes pour une apparence unique et adaptée à votre marque.<br>
            - Création de plugins : Développement de plugins sur mesure pour ajouter des fonctionnalités spécifiques à vos besoins.<br>
            - Sécurité : Mise en œuvre des meilleures pratiques de sécurité pour protéger votre site contre les menaces.<br>
            - Maintenance : Mise à jour régulière de WordPress, des thèmes et des plugins pour garantir un fonctionnement fluide et sécurisé.<br>
            - Optimisation des performances : Amélioration des performances du site pour un chargement rapide et une expérience utilisateur optimale.<br><br>

            Mon objectif est de vous fournir des solutions web sur mesure, alliant esthétique et efficacité.
        </p>
    </div>
</section>
<section id="bio-section" class="bio-center-section">
    <div class="bio-container">
        <h1>A propos de <span class="bio__name">moi</span></h1>
        <p class="bio__desc">
        Je m'appelle Patrice Banon, j'ai 42 ans, je suis originaire de l'ile de la réunion ou j'ai fait une formation initial en transport et logistique. <br>
        Après quelques années dans ce secteur  je suis venue en métropole pour une formation en informatique à l'université de rouen. <br>
        C'était une formation en micro informatique et réseau, avec quelques heures de cours sur le html et css. <br>
        Ce qui m'avais bien plus. J'ai ensuite travaillé chez un revendeur informatique ou j'ai essentiellement fait de la maintenance. <br>
        Maintenant je m'oriente vers cette formation de développeur wordpress et j'espère travaillé rapidement dans ce domaine.<br>
        </p>
    </div>
</section>
    </main>  
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
