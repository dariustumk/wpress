<div class="container">
    <div class="col">
        <div class="img">
            parameter 'thumbnail' is 
            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="image">
        </div>
        <h3><?php the_title();?></h3>
        <div class="date"><?php the_date(); ?> <span class="comment"><a href="#"><?php comments_number(); ?></a></span></div>
        <p><?php the_excerpt(); ?></p>
        <div class="readmore"><a href="<?php the_permalink(); ?>">Read more</a></div>
    </div>
</div>