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

<?php
function create_custom_post_type() {
    register_post_type('photo',
        array(
            'labels'      => array(
                'name'          => __('Photos'),
                'singular_name' => __('Photo'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => true, // Activer l'éditeur de blocs si nécessaire
        )
    );
}
add_action('init', 'create_custom_post_type');



function add_github_link_metabox() {
    add_meta_box(
        'github_link',
        'Lien du repo Github',
        'display_github_link_metabox',
        'photos', // Le type de post auquel la metabox sera ajoutée
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_github_link_metabox');

function display_github_link_metabox($post) {
    // Utilisez nonce pour la sécurité
    wp_nonce_field(basename(__FILE__), 'github_link_nonce');
    $github_link = get_post_meta($post->ID(), '_github_link', true);
    ?>
    <p>
        <label for="github_link">URL du repo Github :</label>
        <input type="text" name="github_link" id="github_link" value="<?php echo esc_attr($github_link); ?>" size="30" />
    </p>
    <?php
}

function save_github_link_metabox($post_id) {
    // Vérifiez le nonce pour la sécurité
    if (!isset($_POST['github_link_nonce']) || !wp_verify_nonce($_POST['github_link_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    // Vérifiez les permissions de l'utilisateur
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    // Enregistrez ou supprimez le lien Github
    $new_github_link = (isset($_POST['github_link']) ? sanitize_text_field($_POST['github_link']) : '');
    update_post_meta($post_id, '_github_link', $new_github_link);
}
add_action('save_post', 'save_github_link_metabox');
