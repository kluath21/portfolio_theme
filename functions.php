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
    
    
    // Enqueue Boxicons CSS
    wp_enqueue_style('boxicons', 'https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css');
    
    // Enqueue custom JavaScript
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/header.js', array(), null, true);
    // Enqueue modal JavaScript
    wp_enqueue_script('modal-script', get_template_directory_uri() . '/assets/js/modal.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');

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