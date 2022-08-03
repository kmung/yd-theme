<?php get_header();?>

<!--Page Title loads from header.php-->

<article class="content">
    <!--Content Section-->
    <?php 
    // dynamically add the contents of posts
    if ( have_posts() ) {
        while( have_posts() ){
            the_post();
            get_template_part('template-parts/content','article');
        }
    }  
?>
</article>

<?php get_footer();?>