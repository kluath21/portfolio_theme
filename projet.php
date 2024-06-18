<?php 
/*
Template Name: Projets
*/
get_header(); ?>

<?php
// Query pour récupérer tous les projets
$args = array(
    'post_type' => 'photo',
    'posts_per_page' => -1
);
$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <section class="section_projets" style="margin-top: 50px;">
        <h2>Mes Projets</h2>
        <div class="projets_container">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
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
                    <!-- Récupérer le titre du projet -->
                    <h1><?php the_title(); ?></h1>
                    <div class='single_description_date'>
                        <!-- Afficher la date de publication -->
                        <p><?php echo get_the_date(); ?></p> 
                    </div>
                    <div class="projet_description">
                        <div class="single_categorie_photo">
                            <h2>Langages : </h2>
                            <?php
                            // Afficher les catégories de langages
                            $terms = get_the_terms(get_the_ID(), 'categorie-photo');
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    echo '<span>' . esc_html($term->name) . '</span> ';
                                }
                            }
                            ?>
                        </div>
                        <!-- <div class="single_description_github link">
                            <h2>Lien vers le repo de Github :</h2>
                            <?php
                            // Afficher le lien GitHub
                            $github_link = get_field('github_link');
                            if ($github_link) {
                                echo '<a href="' . esc_url($github_link) . '" target="_blank">' . esc_html($github_link) . '</a>';
                            } else {
                                echo '<p>Aucun lien GitHub disponible</p>';
                            }
                            ?>
                        </div> -->
                        <div class="single_description_objectif">
                            <h2>Objectif : </h2>
                             <!-- Récupérer le contenu de l'objectif -->
                            <?php the_field('objectif'); ?>
                        </div>
                        <div class="projet_cta">
                            <a href="<?php the_permalink(); ?>" class="cta-button">Lire la suite</a>
                        </div>                        
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>

