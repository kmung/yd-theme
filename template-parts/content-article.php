<div class="container">
    <div class="meta mb-3">
        <span class="date"><?php the_date();?></span>
        <br>
        <span>By</span>
        <?php 
            $firstName = get_the_author_meta('first_name');
            $lastName = get_the_author_meta('last_name');
            echo $firstName . ' ' .  $lastName;
        ?>
    </div>
    <?php the_content(); ?>
    <br>
</div>
