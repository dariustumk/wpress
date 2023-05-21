<?php
get_header();
?>
<div class="archive content-wrapper container">
<header class="entry-header">
            <h1 class="page-title">We need your help!</h1>
            <div class="hr"></div>
        </header>
<div class="row d-flex">
            <?php
            $category_slug = 'fund-raise';
            $category = get_category_by_slug($category_slug);


            $args = array(
                'category__in' => $category->term_id,
                'post_type' => 'post',
                'posts_per_page' => -1,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="col">
                        <div class="img">
                            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="image">
                        </div>
                        <h3>
                            <?php the_title(); ?>
                        </h3>
                        <p>
                            <?php the_excerpt(); ?>
                        </p>
                        <div class="graph">
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
                        <div class="readmore"><a href="<?php the_permalink(); ?>">Read more</a></div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo 'No posts found.';
            endif;
            ?>
        </div>
<?php 
    the_posts_pagination();
?>
</div>
<?php get_footer();?>