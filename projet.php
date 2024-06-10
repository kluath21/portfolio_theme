<?php 
/*
Template Name: Projets
*/
get_header(); ?>

<?php
// Query to fetch projects
$args = array(
    'post_type' => 'photo',
    'posts_per_page' => -1
);
$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <section class="section_projets" style="margin-top: 50px;">
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
                    <h1><?php the_title(); ?></h1>
                    <div class='single_description_date'>
                        <p><?php echo get_the_date(); ?></p> <!-- Afficher la date de publication -->
                    </div>
                    <div class="projet_description">
                        <div class="single_categorie_photo">
                            <h2>Langages : </h2>
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'categorie-photo');
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    echo '<span>' . esc_html($term->name) . '</span> ';
                                }
                            }
                            ?>
                        </div>
                        <div class="single_description_categorie">
                            <h2>Lien du repo Github : </h2>
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'description-photo');
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    echo '<span>' . esc_html($term->name) . '</span> ';
                                }
                            }
                            ?>
                        </div>
                        <div class="single_description_objectif">
                            <h2>Objectif : </h2>
                            <?php the_field('objectif'); ?>
                        </div>
                        <div class="single_description_tache">
                            <h2>Tâche à réaliser :</h2>
                            <?php the_field('tache_a_realiser'); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>
