<?php
/*
Template Name: Contact Us
*/
?>

<?php get_header();?>

<div class="container">
    <!--Page Title-->
    <h1><?php the_title();?></h1>

    <div class="row">
        <div class="col-lg-6">
            <p>Get in touch</p>
        </div>
        <div class="col-lg-6">
            <!--Content section-->
            <?php get_template_part('inc/section','content');?>
        </div>
    </div>

</div>


<?php get_footer();?>