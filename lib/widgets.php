<?php
/**
 * Register sidebars and widgets
 */
function roots_widgets_init()
{
    //Nav Widgest
    register_sidebar(array(
        'name' => __('Nav Left', 'roots'),
        'id' => 'nav-left',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget' => '</div></section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Nav Middle', 'roots'),
        'id' => 'nav-middle',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget' => '</div></section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Nav Right', 'roots'),
        'id' => 'nav-right',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget' => '</div></section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    // Sidebars
//    register_sidebar(array(
//        'name' => __('Pre-Primary Nav', 'roots'),
//        'id' => 'pre-sidebar-primary',
//        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
//        'after_widget' => '</div></section>',
//        'before_title' => '<h3>',
//        'after_title' => '</h3>',
//    ));

    register_sidebar(array(
        'name' => __('Primary', 'roots'),
        'id' => 'sidebar-primary',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget' => '</div></section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Pre-Footer Left', 'roots'),
        'id' => 'sidebar-footer-top-left',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget' => '</div></section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    //PRE FOOTER WIDGETS
    register_sidebar(array(
        'name' => __('Pre-Footer Middle', 'roots'),
        'id' => 'sidebar-footer-top-middle',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget' => '</div></section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Pre-Footer Right', 'roots'),
        'id' => 'sidebar-footer-top-right',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget' => '</div></section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    //FOOTER WIDGETS
    register_sidebar(array(
        'name' => __('Footer Middle', 'roots'),
        'id' => 'sidebar-footer-middle',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget' => '</div></section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Right', 'roots'),
        'id' => 'sidebar-footer-right',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget' => '</div></section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Left', 'roots'),
        'id' => 'sidebar-footer-left',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget' => '</div></section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Bottom', 'roots'),
        'id' => 'sidebar-footer-bottom',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget' => '</div></section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    // Widgets
    register_widget('RJFS_FrontPageFeaturedService');
}

add_action('widgets_init', 'roots_widgets_init');

/**
 * Example vCard widget
 */
class RJFS_FrontPageFeaturedService extends WP_Widget
{
    private $fields = array(
        'title' => 'Title',
        'icon_class' => 'Bootstrap Icon Class <em>wrench</em>',
        'icon_code' => 'Font Awesome Icon Class <em>fa-camera-retro</em>',
        'img_src' => 'Image Url <em>(64px X 64px)</em>',
        'excerpt' => 'Excerpt',
        'button_text' => 'Button Text',
        'target_url' => 'Target Url'
    );

    function __construct()
    {
        $widget_ops = array('classname' => 'rjfs_frontpagefeaturedservice', 'description' => __('This will display formated content on the front page', 'roots'));

        $this->WP_Widget('rjfs_frontpagefeaturedservice', __('RJFS - Featured Service', 'roots'), $widget_ops);
        $this->alt_option_name = 'rjfs_frontpagefeaturedservice';

        add_action('save_post', array(&$this, 'flush_widget_cache'));
        add_action('deleted_post', array(&$this, 'flush_widget_cache'));
        add_action('switch_theme', array(&$this, 'flush_widget_cache'));
    }

    function widget($args, $instance)
    {
        $cache = wp_cache_get('rjfs_frontpagefeaturedservice', 'widget');

        if (!is_array($cache)) {
            $cache = array();
        }

        if (!isset($args['widget_id'])) {
            $args['widget_id'] = null;
        }

        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }

        ob_start();
        extract($args, EXTR_SKIP);

        $title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);

        foreach ($this->fields as $name => $label) {
            if (!isset($instance[$name])) {
                $instance[$name] = '';
            }
        }

        ?><a href="<?php echo $instance['target_url']; ?>" class="feature"><?php
        echo $before_widget;

//        if ($title) {
//            echo $before_title, $title, $after_title;
//        }
        ?>

        <?php
        if (!empty($instance['icon_class'])) {
            ?>
            <div class="icon"><span class="glyphicon glyphicon-<? echo $instance['icon_class'] ?>"></span></div><?php
        } else if(!empty($instance['icon_code'])) {
            ?>
            <div class="icon"><i class="fa <?php echo $instance['icon_code'] ?>"></i></div><?php
        } else {
            ?>
            <div class="icon"><img style=" width: 64px; height: 64px;" src="<?php echo $instance['img_src'] ?>"/></div><?php
        }
        ?>
        <h2><?php echo $title ?></h2>
        <p class="excerpt"><?php echo html_entity_decode($instance['excerpt'], ENT_QUOTES); ?></p>
        <?php
        echo $after_widget;
        ?> <span class="label label-primary"><?php echo $instance['button_text']; ?></span></a><?php

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('rjfs_frontpagefeaturedservice', $cache, 'widget');
    }

    function update($new_instance, $old_instance)
    {
        $instance = array_map('strip_tags', $new_instance);

        $this->flush_widget_cache();

        $alloptions = wp_cache_get('alloptions', 'options');

        if (isset($alloptions['rjfs_frontpagefeaturedservice'])) {
            delete_option('rjfs_frontpagefeaturedservice');
        }

        return $instance;
    }

    function flush_widget_cache()
    {
        wp_cache_delete('rjfs_frontpagefeaturedservice', 'widget');
    }

    function form($instance)
    {
        foreach ($this->fields as $name => $label) {
            ${$name} = isset($instance[$name]) ? esc_attr($instance[$name]) : '';
            ?>
            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id($name)); ?>"><?php _e("{$label}:", 'roots'); ?></label>
                <?php if (in_array($name, array("excerpt"))) { ?>
                    <textarea class="widefat" rows="16" cols="20"
                              id="<?php echo esc_attr($this->get_field_id($name)); ?>"
                              name="<?php echo esc_attr($this->get_field_name($name)); ?>"><?php echo ${$name}; ?></textarea>
                <?php } else { ?>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id($name)); ?>"
                           name="<?php echo esc_attr($this->get_field_name($name)); ?>" type="text"
                           value="<?php echo ${$name}; ?>">
                <?php } ?>
            </p>
        <?php
        }
    }
}
