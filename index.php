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

<!-- Projets -->
<section id="projects-section" class="projects-center-section">
    <div class="projects-container">
        <h1 class="projet_accueil">Mes Projets</h1>
        <div class="projects-grid">
            <?php
            // Query to fetch two latest projects
            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => 2
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="single_projet">
                        <?php 
                        // Récupérer l'ID de l'image depuis les métadonnées du post
                        $image_id = get_post_meta(get_the_ID(), 'image', true);
                        $image_url = wp_get_attachment_image_url($image_id, 'desktop-home');
                        if ($image_id) {
                            echo '<a href="' . get_permalink() . '"><img src="' . esc_url($image_url) . '" class="photo-image"></a>';
                        }
                        ?>
                        <hr class="separation-line">
                        <h2><?php the_title(); ?></h2>
                        <div class='single_description_date'>
                            <p><?php echo get_the_date(); ?></p>
                        </div>
                        <div class="projet_description">
                            <div class="single_categorie_photo">
                                <h3>Langages : </h3>
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'categorie-photo');
                                if ($terms && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<span>' . esc_html($term->name) . '</span> ';
                                    }
                                }
                                ?>
                            </div>
                            <div class="single_description_github link">
                            <h2>Lien vers le repo de Github :</h2>
                            <?php
                            $github_link = get_field('github_link');
                            if ($github_link) {
                                echo '<a href="' . esc_url($github_link) . '" target="_blank">' . esc_html($github_link) . '</a>';
                            } else {
                                echo '<p>Aucun lien GitHub disponible</p>';
                            }
                            ?>
                        </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
        <div class="projects-cta">
            <a href="<?php echo get_permalink(get_page_by_path('projets')); ?>" class="cta-button">Voir tous les projets</a>
        </div>
    </div>
</section>

<!-- Bio -->
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

