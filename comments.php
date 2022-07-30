<?php
/*
 * if post is protected by a password and visitor has not entered password
 * return early without loading comments
 */
if ( post_password_required()) {
    return;
}
?>

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
                wp_list_comments(
                    array(
                    'avatar_size' => 80,
                    'style' => 'div',
                    'short_ping' => true
                    )    
                );
            ?>
        </div>
    </div>
</div>