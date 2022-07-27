<?php
    
    function yd_theme_support() {
        // dynamically add page title
        add_theme_support('title-tag');

        // dynamically add logo
        // outputting is done in header.php
        add_theme_support('custom-logo');

        // add thumbnail/featured image capability
        add_theme_support('post-thumbnails');
    }
    add_action('after_setup_theme', 'yd_theme_support');
    

    // enqueueing stylesheets
    function load_stylesheets() {
        //custom css
        // version is a variable that holds the version of the stylesheet, updated in style.css
        $version = wp_get_theme()->get('Version');
        wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css', array('zyd-bootstrap'), $version, 'all');

        //bootstrap css
        wp_enqueue_style('zyd-bootstrap',  'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous', array(), '5.2', 'all');
    }
    add_action('wp_enqueue_scripts', 'load_stylesheets');

    // enqueueing JavaScripts
    function load_js() {
        // default jquery included by wp
        wp_enqueue_script('jquery');

        // bootstrap js with poppers included
        wp_enqueue_script('bootstrapjs', ' 	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js', array(), '5.2', true);

        // custom js
        wp_enqueue_script('customjs', get_template_directory_uri() . '/assets/js/main/js', array(), '1.0', true);
    }
    add_action('wp_enqueue_scripts', 'load_js');

    //dynamically add menu
    function yd_menu() {
        $locations = array(
            // naming menu locations
            'primary' => "Primary Navigation",
            'footer' => 'Footer Navigation'
        );
        register_nav_menus($locations);
    }
    // wp hook to add the menu to wordpress
    add_action('init', 'yd_menu');

