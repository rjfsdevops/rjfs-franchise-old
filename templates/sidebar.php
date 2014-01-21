<?php

dynamic_sidebar('pre-sidebar-primary');

if (has_nav_menu('secondary_navigation')) {
    ?>
    <section class="widget">
        <div class="widget-inner"><h3>Services</h3>
            <?php
            wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-pills nav-stacked'));
            ?>
        </div>
    </section>

<?php
}
?>

<?php dynamic_sidebar('sidebar-primary'); ?>
