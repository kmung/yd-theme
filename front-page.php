<?php get_header();?>

<div class="container">
    <!--Page Title-->
    <h1><?php the_title();?></h1>
    <!--Content Section-->
    <?php get_template_part('inc/section','content');?>

</div>


<?php get_footer();?>