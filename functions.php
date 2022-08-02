<?php
    
    function yd_theme_support() {
        // dynamically add site title
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
        wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/page.css', array('zyd-bootstrap'), $version, 'all');
        wp_enqueue_style('post-style', get_template_directory_uri() . '/assets/css/post.css', array('zyd-bootstrap'), $version, 'all');

        //bootstrap css
        wp_enqueue_style('zyd-bootstrap',  'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous', array(), '5.2', 'all');
    }
    add_action('wp_enqueue_scripts', 'load_stylesheets');

    // enqueueing JavaScripts
    function load_js() {
        // default jquery included by wp
        wp_enqueue_script('jquery');

        // bootstrap js with poppers included
        wp_enqueue_script('bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js', array(), '5.2', true);

        // custom js
        wp_enqueue_script('customjs', get_template_directory_uri() . '/assets/js/main/js', array(), '1.0', true);
    }
    add_action('wp_enqueue_scripts', 'load_js');

    //dynamically add menu
    function yd_menu() {
        $locations = array(
            // naming menu locations
            'primary' => "Primary Navigation",
            'mobile' => 'Mobile Navigation',
            'footer' => 'Footer Navigation'
        );
        register_nav_menus($locations);
    }
    // wp hook to add the menu to wordpress
    add_action('init', 'yd_menu');


/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft(){
    global $wpdb;
    if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
      wp_die('No post to duplicate has been supplied!');
    }
    /*
     * Nonce verification
     */
    if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
      return;
    /*
     * get the original post id
     */
    $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
    /*
     * and all the original post data then
     */
    $post = get_post( $post_id );
    /*
     * if you don't want current user to be the new post author,
     * then change next couple of lines to this: $new_post_author = $post->post_author;
     */
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;
    /*
     * if post data exists, create the post duplicate
     */
    if (isset( $post ) && $post != null) {
      /*
       * new post data array
       */
      $args = array(
        'comment_status' => $post->comment_status,
        'ping_status'    => $post->ping_status,
        'post_author'    => $new_post_author,
        'post_content'   => $post->post_content,
        'post_excerpt'   => $post->post_excerpt,
        'post_name'      => $post->post_name,
        'post_parent'    => $post->post_parent,
        'post_password'  => $post->post_password,
        'post_status'    => 'draft',
        'post_title'     => $post->post_title,
        'post_type'      => $post->post_type,
        'to_ping'        => $post->to_ping,
        'menu_order'     => $post->menu_order
      );
      /*
       * insert the post by wp_insert_post() function
       */
      $new_post_id = wp_insert_post( $args );
      /*
       * get all current post terms ad set them to the new post draft
       */
      $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
      foreach ($taxonomies as $taxonomy) {
        $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
        wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
      }
      /*
       * duplicate all post meta just in two SQL queries
       */
      $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
      if (count($post_meta_infos)!=0) {
        $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
        foreach ($post_meta_infos as $meta_info) {
          $meta_key = $meta_info->meta_key;
          if( $meta_key == '_wp_old_slug' ) continue;
          $meta_value = addslashes($meta_info->meta_value);
          $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
        }
        $sql_query.= implode(" UNION ALL ", $sql_query_sel);
        $wpdb->query($sql_query);
      }
      /*
       * finally, redirect to the edit post screen for the new draft
       */
      wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
      exit;
    } else {
      wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
  }
  add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
  /*
   * Add the duplicate link to action list for post_row_actions
   */
  function rd_duplicate_post_link( $actions, $post ) {
    if (current_user_can('edit_posts')) {
      $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
    }
    return $actions;
  }
  /*
  * Duplicate feature for pages and posts
  */
  add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );
  add_filter( 'page_row_actions', 'rd_duplicate_post_link', 10, 2 );

