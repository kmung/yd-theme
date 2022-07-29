<div class="container">
    <div class="meta mb-3">
        <!--Print post date-->
        <span class="date"><?php the_date();?></span>
        <!--Print post author-->
        <span>&nbsp;By
        <?php 
            $firstName = get_the_author_meta('first_name');
            $lastName = get_the_author_meta('last_name');
            echo $firstName . ' ' .  $lastName;
        ?>
        </span>
        <br>
        <!--Category Area-->
        <?php
        $categories = get_the_category();
        foreach($categories as $categories): ?>
            <?php echo $categories->name; ?>
        <?php endforeach; ?>
    </div>
    <!--Post Content-->
    <?php the_content(); ?>
    <br>
</div>
<div class="comment">
    <?php comments_template(); ?>
</div>
