<?php
get_header();

while (have_posts()) :
    the_post();
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        <div class="hr"></div>

        <div class="entry-content">
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>

            <?php the_content(); ?>
        </div>
        </div>
    </article>

    <?php
endwhile;

get_footer();
