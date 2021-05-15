<?php

define('THEME_DIRECTORY', get_template_directory());

/*
Disable the theme editor
- stop clients from breaking their website
 */
define('DISALLOW_FILE_EDIT', true);

load_theme_textdomain( 'crs' );
/*
Thumbnails
- this theme supports thumbnails
 */
add_theme_support('post-thumbnails');
add_image_size('full', 3000, 3000, true);
add_image_size('portrait', 588, 787, true);
add_image_size('card', 380, 240, true);
add_image_size('card_wide', 685, 360, true);
add_image_size('menu_item', 435, 250, true);
add_image_size('header_carousel', 960, 800, true);
add_image_size('wide_image', 1500, 780, true);
add_image_size('wide_double', 750, 550, true);
add_image_size('trio', 1270, 700, true);
add_image_size('side_double', 600, 370, true);

/*
Scripts & Styles
- include the scripts and stylesheets
 */
add_action('wp_enqueue_scripts', function() {
    if (wp_script_is('jquery', 'registered')) {
        wp_deregister_script('jquery');

    }

    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.3.1', false);
    //wp_enqueue_script('vendor', get_template_directory_uri() . '/dist/scripts/vendor.min.js', array(), '1.0.0', true);
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/public/scripts/app.js', array(), '1.0.0', true);


    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/public/styles/style.css', false, '1.0.0', 'all');
    wp_enqueue_style('tailwind', get_stylesheet_directory_uri() . '/public/styles/tailwind.css', false, '1.0.0', 'all');

    wp_localize_script('custom', 'theme_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'), // WordPress AJAX
        'stylesheet_dir' => get_stylesheet_directory_uri(),
    ));
});

add_action('admin_enqueue_scripts', function() {
    wp_enqueue_style('admin-styles', get_stylesheet_directory_uri() . '/style-admin.css');
});


function myguten_enqueue() {
    wp_enqueue_script(
        'gutenberg-script',
        get_stylesheet_directory_uri() . '/public/scripts/gutenberg.js'
    );
}
add_action( 'enqueue_block_editor_assets', 'myguten_enqueue' );

/*
Menus
- enable WordPress Menus
 */
if (function_exists('register_nav_menus')) {
    register_nav_menus(['primary' => __('Primary Nav'), 'secondary' => __('Secondary Nav'), 'footer' => __('Footer Nav')]);
}

/*
 * Add Excerpts to pages
 */
add_post_type_support( 'page', 'excerpt' );

/**
 * Yoast breadcrumbs
 */
add_theme_support('yoast-seo-breadcrumbs');



/*
AFC Options
- register the ACF theme options
 */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

}

add_theme_support( 'editor-styles');
add_editor_style( 'style-editor.css' );



add_filter('mce_buttons_2', function ($buttons) {
    array_unshift($buttons, 'styleselect');

    return $buttons;
});

add_filter('tiny_mce_before_init', function ($styles) {

    $formats = [
        [
            'title'   => 'Button',
            'selector'  => 'a',
            'classes' => 'btn',
            'wrapper' => false,
        ],
        [
            'title'   => 'Button Fill',
            'selector'  => 'a',
            'classes' => 'btn fill',
            'wrapper' => false,
        ],
        [
            'title' => 'Font Weights',
            'items' => [
                [
                    'title' => 'Thin',
                    'inline' => 'span',
                    'classes' => 'font-thin',
                ],
                [
                    'title' => 'Extra Light',
                    'inline' => 'span',
                    'classes' => 'font-extralight',
                ],
                [
                    'title' => 'Light',
                    'inline' => 'span',
                    'classes' => 'font-light',
                ],
                [
                    'title' => 'Normal',
                    'inline' => 'span',
                    'classes' => 'font-normal',
                ],
                [
                    'title' => 'Medium',
                    'inline' => 'span',
                    'classes' => 'font-medium',
                ],
                [
                    'title' => 'Semibold',
                    'inline' => 'span',
                    'classes' => 'font-semibold',
                ],
                [
                    'title' => 'Bold',
                    'inline' => 'span',
                    'classes' => 'font-bold',
                ],
                [
                    'title' => 'Extra Bold',
                    'inline' => 'span',
                    'classes' => 'font-extrabold',
                ],
                [
                    'title' => 'Black',
                    'inline' => 'span',
                    'classes' => 'font-black',
                ],
            ],
        ],
    ];

    $styles['style_formats'] = json_encode($formats);

    return $styles;
});

function wdm_add_mce_button() {

    if(!is_admin()) {
        return;
    }

    // check user permissions
    if ( !current_user_can( 'edit_posts' ) &&  !current_user_can( 'edit_pages' ) ) {
        return;
    }
    // check if WYSIWYG is enabled
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', 'wdm_add_tinymce_plugin' );
        add_filter( 'mce_buttons', 'wdm_register_mce_button' );
    }
}
add_action('admin_head', 'wdm_add_mce_button');

// register new button in the editor
function wdm_register_mce_button( $buttons ) {
    array_push( $buttons, 'wdm_mce_button' );
    return $buttons;
}


// declare a script for the new button
// the script will insert the shortcode on the click event
function wdm_add_tinymce_plugin( $plugin_array ) {
    $plugin_array['wdm_mce_button'] = get_stylesheet_directory_uri() .'/assets/scripts/admin/mce-buttons.js';
    return $plugin_array;
}

function crs_get_tablepress_table_id( $post_id ) {
    $tables = get_option( 'tablepress_tables' );
    $tables = json_decode( $tables, true );
    if ( empty( $tables['table_post'] ) ) {
        return false;
    }
    $posts = array_flip( $tables['table_post'] );
    return isset( $posts[$post_id] ) ? $posts[$post_id] : false;
}

function crs_get_offers( $key ) {

    $offers_sections = get_field( 'offers_sections', 'options' );

    if ( $offers_sections ) {
        foreach ( $offers_sections as $offers_section ) {
            if ( $offers_section['id'] === $key ) {
                return $offers_section['offers'];
            }
        } 
    }
}

