<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <section class="section_single_projet" style="margin-top: 50px;">
        <h2 class="detail_title">Détail d'un Projet</h2>
        <div class="single_projet_container">
            <?php while (have_posts()) : the_post(); ?>
                <div class="container_center">
                    <?php 
                    // Récupérer l'ID de l'image depuis les métadonnées du post
                    $image_id = get_post_meta(get_the_ID(), 'image', true);
                    $image_url = wp_get_attachment_image_url($image_id, 'desktop-home');
                    if ($image_id) {
                        echo '<img src="' . esc_url($image_url) . '" class="photo-image">';
                    }
                    ?>
                </div>
                <hr class="separation-line">
                <div class="container_info">
                    <h1><?php the_title(); ?></h1>
                    <div class='single_description_date'>
                        <p><?php the_date(); ?></p> <!-- Afficher la date de publication -->
                    </div>
                    <div class="projet_description">
                        <div class="single_categorie_photo">
                            <h2>Langages : </h2>
                            <?php the_terms(get_the_ID(), 'categorie-photo'); ?>
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

                <!-- New Cards Section -->
                <div class="new-cards-section">
                    <!-- Maquette Card -->
                    <div class="card maquette-card">
                        <h2 class="maquette_title">Photo de la maquette</h2>
                        <?php                      
                        $image_id = get_post_meta(get_the_ID(), 'maquette_image', true);
                        $image_url = wp_get_attachment_image_url($image_id, 'desktop-home');
                        if ($image_id) {
                            echo '<img src="' . esc_url($image_url) . '" class="photo-image">'; 
                    
                        } else {
                            echo '<p>Aucun aperçu disponible</p>';
                        }
                        ?>
                        
                        <h2 class="lien_title">Liens de la maquette en PDF</h2>
                        <?php
                            $maquette_pdf = get_field('maquette_pdf');
                            if ($maquette_pdf) {
                                echo '<a href="' . esc_url($maquette_pdf) . '" target="_blank">Maquette de ' . esc_html(get_the_title()) . '</a>';
                            } else {
                                echo '<p>Aucun lien maquette disponible</p>';
                            }
                            ?>                         
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
