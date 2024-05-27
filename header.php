<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="portfolio">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/fa62c117c7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <title><?php wp_title(); ?></title>

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen'></i>
            <span class="logo navLogo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Site Logo" />
                </a>
            </span>

            <div class="menu">
                
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container' => 'ul',
                    'menu_class' => 'nav-links'
                ));
                ?>
            </div>

            <div class="darkLight-searchBox">
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>

                <div class="searchBox">
                   <div class="searchToggle">
                    <i class='bx bx-x cancel'></i>
                    <i class='bx bx-search search'></i>
                   </div>

                    <div class="search-field">
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Ensure the sidebarClose icon is within the sidebar menu for mobile view -->
    <div class="logo-toggle">
        <i class='bx bx-x siderbarClose'></i>
    </div>

 
