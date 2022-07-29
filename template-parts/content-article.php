<div class="container">
    <div class="meta mb-3">
        <!--Print post date-->
        <span class="date"><?php the_date();?></span>
        <br>
        <!--Print post author-->
        <span>By
        <?php 
            $firstName = get_the_author_meta('first_name');
            $lastName = get_the_author_meta('last_name');
            echo $firstName . ' ' .  $lastName;
        ?>
        </span>
    </div>
    <!--Post Content-->
    <?php the_content(); ?>
    <br>
</div>
