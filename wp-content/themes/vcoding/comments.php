<div class="comments">
    <div class="comments-header">
        <h2 class="title">
            <?php 
                if(! have_comments()) {
                   echo "Leave a comment";
                }
                else {
                    echo get_comments_number(). " Comments";
                }
            ?>
        </h2>
    </div>
    <div class="comments-inner">
        <?php 
            wp_list_comments(
                array(
                    'avatar_size' => 120,
                    'style' => 'div'
                )
            );
        ?>
    </div>
<hr>
<?php 
    if(comments_open()) {
        comment_form (
            array(
                'class_form' => '',
                'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
                'title_reply_after' => '</h2>'
            )
        );
    }
?>
</div>