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
            get_template_part('template-parts/content','article');
        }
    }  
?>
</article>

<?php get_footer();?>