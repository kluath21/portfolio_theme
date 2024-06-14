<?php
// Ensure this file is being called from WordPress
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<footer>
    <div class="footer-container">
        <div class="footer-social">
            <a href="https://www.linkedin.com/in/patrice-b-105698313" target="_blank"><i class='bx bxl-linkedin'></i></a>
            <a href="https://discord.com/invite/xwXZ5Jkm" target="_blank"><i class='bx bxl-discord'></i></a>
            <a href="https://x.com/@klathu2021" target="_blank"><i class='bx bxl-twitter'></i></a>
            <a href="https://github.com/kluath21" target="_blank"><i class='bx bxl-github'></i></a>
        </div>
        <div class="footer-links">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container' => false,
                'menu_class' => 'footer-nav',
                'fallback_cb' => false
            ));
            ?>
        </div>
        <div class="footer-copyright">
            banonp &copy; <?php echo date('Y'); ?>
        </div>
    </div>
    <?php get_template_part( 'template/modal' ); ?>
    <?php wp_footer(); ?>
</footer>
</body>
</html>

