<?php
/*
* Template Name: Contact Us
*/
?>

<?php get_header();?>

<div class="main-wrapper">
    <article class="about-section py-5">
        <div class="container">
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
    </article>
</div>

<?php get_footer();?>