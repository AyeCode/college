<?php
/*
 * Main Navigation
 */
?>
<nav id="college-main-navigation">
    <?php
    $college_menu_args = array(
        'theme_location' => 'main',
        'container' => false,
        'menu_id' => false,
        'menu_class' => 'responsive-menu',
        'echo' => true);
    wp_nav_menu($college_menu_args);
    ?>
</nav>

