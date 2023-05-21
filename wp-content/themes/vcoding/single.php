<?php
/**
 * single page
 */
get_header();
?>
<div class="container">

    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2 class="entry-title">
                    <?php the_title(); ?>
                </h2>
<div class="hr"></div>
                <div class="entry-meta">
                    <span class="entry-comments">Comments:
                        <?php comments_popup_link('0', '1', '%'); ?>
                    </span>
                </div>

                <?php if (has_post_thumbnail()): ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('full', array('style' => 'max-width: 700px;')); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <div class="graph">
                    <div>
                    <div class="st">Donated<span>
                            <?php
                            $raised_funds = get_field('raised_funds');
                            $goal = get_field('goal');
                            $result = number_format(($raised_funds * 100) / $goal, 0, '.', '');
                            echo $result . '%';
                            ?>
                        </span></div>
                    <div class="nd">
                        <div class="progress" role="progressbar" aria-label="Basic example"
                            aria-valuenow="<?php echo $result; ?>" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: <?php echo $result; ?>%"></div>
                        </div>
                    </div>
                    <div class="rd">
                        <span>$
                            <?php echo $raised_funds; ?>
                        </span> Raised of <span>$
                            <?php echo $goal; ?>
                        </span> Goal
                    </div>
                    </div>
                    <div class="btn"><a href="http://localhost/wpress/donate-now/">Donate now</a></div>
                </div>
                

                <!-- <div class="entry-tags">
                    <?php the_tags('Tags: ', ', ', ''); ?>
                </div> -->

                <div class="entry-comments">
                    <?php comments_template(); ?>
                </div>
            </article>
            <?php
        }
    }
    ?>




</div>
<?php get_footer(); ?>