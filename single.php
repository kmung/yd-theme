<?php get_header();?>

<!--Page Title-->   
<h1><?php the_title();?></h1>

<article class="content">
    <!--Content Section-->
    <?php get_template_part('inc/section','content');?>
</article>

<?php get_footer();?>