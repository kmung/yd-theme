<?php get_header();?>

<!--Page Title-->   
<h1><?php the_title();?></h1>

<article class="content">
    <!--Content Section-->
    <?php 
    // dynamically add the contents of posts
    if ( have_posts() ) {
        while( have_posts() ){
            the_post();
            get_template_part('template-parts/content','archive');
        }
    }  
    ?>
    <!--Pagination-->
    <?php 
    global $wp_query;

    $big = 999999999;

    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#$',
        'current' => mac(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
        ) );
    ?>
</article>

<?php get_footer();?>