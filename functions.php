<?php
function enqueue_custom_styles_and_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('main-style', get_stylesheet_uri()) . '/style.css';
    
    // Enqueue header CSS
    wp_enqueue_style('header-css', get_template_directory_uri() . '/assets/css/header.css');
    // Enqueue footer CSS
    wp_enqueue_style('footer-css', get_template_directory_uri() . '/assets/css/footer.css'); 
    // Enqueue modal CSS
    wp_enqueue_style('modal-css', get_template_directory_uri() . '/assets/css/modal.css');  
    // Enqueue compétences CSS 
    wp_enqueue_style('competences-css', get_template_directory_uri() . '/assets/css/competences.css');
    // Enqueue single CSS
    wp_enqueue_style('single-css', get_template_directory_uri() . '/assets/css/single.css');
    // Enqueue projet CSS
    wp_enqueue_style('projet-css', get_template_directory_uri() . '/assets/css/projet.css');
    
    // Enqueue Boxicons CSS
    wp_enqueue_style('boxicons', 'https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css');
    
    // Enqueue custom Script
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/header.js', array(), null, true);
    // Enqueue modal 
    wp_enqueue_script('modal-script', get_template_directory_uri() . '/assets/js/modal.js', array(), null, true);    
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');

// add_action('wp', 'var_dump_current_post_taxonomies_and_meta');
// function var_dump_current_post_taxonomies_and_meta() {
//         global $post;
//     if (is_single() || is_page() ) {
//         var_dump($post);
//         //obtenir les meta données du post
//         $post_meta = get_post_meta($post->ID);
//         var_dump($post_meta);
//         //obtenir les taxonomies du post
//         $taxonomies = get_post_taxonomies($post->ID);
//         $taxonomy_terms = array();
//         foreach ($taxonomies as $taxonomy) {
//             $terms = get_the_terms($post->ID, $taxonomy);
//             if ($terms) {
//                 $taxonomy_terms[$taxonomy] = $terms;              
//     }
// }
// //afficher les termes de la taxonomie
// var_dump($taxonomy_terms);
// }
// }

function register_my_menus() {
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu'),
            'footer-menu' => __('Footer Menu')
        )
    );
}
add_action('init', 'register_my_menus');
?>