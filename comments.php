<div class="comments-wrapper">
    <div class="comments" id="comments">
        <!--Comments header-->
        <div class="comments-header">
            <!--Comments Title-->
            <h2 class="comments-reply-title">
                <?php 
                    if (!have_comments()) {
                        echo "Leave us a comment";
                    } else {
                        get_comments_count() . " Comments";
                    }
                ?>
            </h2>
        </div>
        <div class="comments-inner">
            <?php
                wp_lists_comments(
                    array(
                    'avatar_size' => 120,
                    'style' => 'div',
                    )    
                );
            ?>
        </div>
    </div>
</div>