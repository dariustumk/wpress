<div class="container">
    <header class="content-header">
        <div class="meta">
            <span class="date"><?php the_date(); ?></span>
            <?php
                // parameters in ('1st - before', '2nd - in between', '3rd - after')
                the_tags('<span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>');
            ?>
            <span class="comment-link"><a href="#comment">3 comments</a><?php comments_number(); ?></span>
        </div>
    </header>    

<?php
the_content();
?>

 

<?php 
    comments_template();
?>
</div>