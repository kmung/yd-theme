<?php

    function yd_title() {
        // dynamically add page title
        add_theme_support('title-tag');
    }

    add_action('after_setup_theme', 'yd_title');
    

    function load_stylesheets() {
        //custom css
        $version = wp_get_theme()->get('Version');
        wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css', array('zyd-bootstrap'), $version, 'all');

        //bootstrap css
        wp_enqueue_style('zyd-bootstrap',  get_template_directory_uri() . '/css/bootstrap.min.css', array(), '', 'all');
    }

    add_action('wp_enqueue_scripts', 'load_stylesheets');

    function load_js() {
        wp_enqueue_script('jquery');

        wp_register_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true);
        wp_enqueue_script('bootstrapjs');
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

    add_action('init', 'yd_menu');