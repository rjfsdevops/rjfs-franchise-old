<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name()
{

    // This gets the theme name from the stylesheet
    $themename = wp_get_theme();
    $themename = preg_replace("/\W/", "_", strtolower($themename));

    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = $themename;
    update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options()
{
    $options = array();

    $options[] = array(
        'name' => __('RJFS Theme Settings', 'options_framework_theme'),
        'type' => 'heading'
    );

    //logo
    $options[] = array(
        'name' => __('Custom Site Logo', 'options_framework_theme'),
        'desc' => __('If you have a logo that has been approved by Ram Jack HQ you can upload it here.  The logo must have a default height of 100px.  It will be resized dynamically depending on the screen size your customers are view the site with.', 'options_framework_theme'),
        'id' => 'custom_logo',
        'std' => get_template_directory_uri() . '/assets/img/ramjack-logo.png',
        'type' => 'upload');

    //background
    $options[] = array(
        'name' => __('Custom Header Background', 'options_framework_theme'),
        'desc' => __('Background for the header area.', 'options_framework_theme'),
        'id' => 'custom_background',
        'std' => get_template_directory_uri() . '/assets/img/dark_dotted2.png',
        'type' => 'upload');

    //phone number
    $options[] = array(
        'name' => __('Phone Number', 'options_framework_theme'),
        'desc' => __('This phone number will be used at the top of each page.', 'options_framework_theme'),
        'id' => 'phone_number',
        'std' => '888.332.9909',
        'class' => 'mini',
        'type' => 'text');

    //social icons
    $options[] = array(
        'name' => __('Facebook Profile', 'options_framework_theme'),
        'desc' => __('The full url to your facebook profile. If you don\'t have an account leave this field empty or point to HQ\'s page! <em>https://www.facebook.com/theramjack</em>', 'options_framework_theme'),
        'id' => 'facebook',
        'std' => 'https://www.facebook.com/theramjack',
        'type' => 'text');

    $options[] = array(
        'name' => __('Instagram Profile', 'options_framework_theme'),
        'desc' => __('The full url to your instagram profile. If you don\'t have an account leave this field empty.', 'options_framework_theme'),
        'id' => 'instagram',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Google Plus Profile', 'options_framework_theme'),
        'desc' => __('The full url to your google+ profile. If you don\'t have an account leave this field empty or point to HQ\'s page! <em>https://plus.google.com/105752707430779993299/about</em>', 'options_framework_theme'),
        'id' => 'google-plus',
        'std' => 'https://plus.google.com/105752707430779993299/about',
        'type' => 'text');

    $options[] = array(
        'name' => __('Twitter Profile', 'options_framework_theme'),
        'desc' => __('The full url to your twitter profile. If you don\'t have an account leave this field empty or point to HQ\'s page! <em>https://twitter.com/theramjack</em>', 'options_framework_theme'),
        'id' => 'twitter',
        'std' => 'https://twitter.com/theramjack',
        'type' => 'text');

    $options[] = array(
        'name' => __('YouTube Profile', 'options_framework_theme'),
        'desc' => __('The full url to your youtube profile. If you don\'t have an account leave this field empty or point to HQ\'s page! <em>https://www.youtube.com/ramjacktv</em>', 'options_framework_theme'),
        'id' => 'youtube',
        'std' => 'https://www.youtube.com/ramjacktv',
        'type' => 'text');


    $options[] = array(
        'name' => __('Pinterest Profile', 'options_framework_theme'),
        'desc' => __('The full url to your pinterest profile. If you don\'t have an account leave this field empty or point to HQ\'s page! <em>http://www.pinterest.com/ramjack</em>', 'options_framework_theme'),
        'id' => 'pinterest',
        'std' => 'http://www.pinterest.com/ramjack',
        'type' => 'text');

    //parallax section image
    $options[] = array(
        'name' => __('Parallax Divider', 'options_framework_theme'),
        'desc' => __('This is used to break up the content and the footer area', 'options_framework_theme'),
        'id' => 'parallax',
        'std' => '',
        'type' => 'upload');

    $options[] = array(
        'name' => __('SEO Settings', 'options_framework_theme'),
        'type' => 'heading' );

    /**
     * For $settings options see:
     * http://codex.wordpress.org/Function_Reference/wp_editor
     *
     * 'media_buttons' are not supported as there is no post to attach items to
     * 'textarea_name' is set by the 'id' you choose
     */

    $wp_editor_settings = array(
        'wpautop' => true, // Default
        'textarea_rows' => 5,
        'tinymce' => array('plugins' => 'wordpress')
    );

    $options[] = array(
        'name' => __('Header Caption', 'options_framework_theme'),
        'desc' => 'You can enter a SEO friendly description of your company.',
        'id' => 'header_caption',
        'std' => '<b>Ram Jack</b><br/><small>Foundation Repair Services For [ENTER COMPNAY NAME] and surrounding areas</small>',
        'type' => 'editor',
        'settings' => $wp_editor_settings);

    return $options;
}