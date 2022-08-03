<?php get_header();?>

<div class="main-wrapper">
    <div class="page-title theme-bg-light text-center gradient py-5">
        <!--Page Title-->   
        <h1 class="heading"><?php the_title();?></h1>
    </div>
    <article class="content px-3 py-5 p-md-5">
        <div class="container">
            <!--Content Section-->
            <?php get_template_part('inc/section','content');?>
        </div>
    </article>
</div>


<?php get_footer();?>