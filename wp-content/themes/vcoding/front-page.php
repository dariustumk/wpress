<?php

/**
 * Template Name: Homepage
 */
get_header();
?>

<?php
// Display slideshows on frontpage
$args = array(
    'post_type' => 'slideshow',
    'posts_per_page' => -1
);
$slideshows = new WP_Query($args);
if ($slideshows->have_posts()):
    ?>
    <div class="hero">
        <div class="carousel" data-carousel>
            <button class="carousel-button prev" data-carousel-button="prev"><i class="fa-solid fa-angle-left"></i></button>
            <button class="carousel-button next" data-carousel-button="next"><i
                    class="fa-solid fa-angle-right"></i></button>
            <ul data-slides>
                <?php
                while ($slideshows->have_posts()):
                    $slideshows->the_post();
                    ?>
                    <li class="slide" data-active>
                        <?php the_post_thumbnail(); ?>
                                                    <div class="info-block"><div class="container">
                                                                                        <div class="main">
                                    <?php the_title(); ?>
                                </div>
                                <div class="sub">
                                    <?php the_content(); ?>
                                </div>
                                <!-- <div class="btn"><a href="#">Donate now</a></div> -->
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="contacts">
    <div class="info">
                  <div class="container d-flex">
                        <div class="adr txt d-flex">
                                    <i class="fa-solid fa-map"></i>
                                    <div class="name">
                                        <p class="ttl">Find us at:</p><p>Gediminas Avenue 9A<br/>Vilnius 28292. Lithuania</p>
                                    </div>
                                </a>
                            </div>
                            <div class="email txt d-flex">
                                <a href="mailto:info@ngoocharity.com">
                                    <i class="fa-regular fa-envelope"></i>
                                    <div class="name">
                                        <p class="ttl">Mail us:</p><a href="mailto:info@ngoocharity.com">info@ngoocharity.com</a>
                                    </div>
                                </a>
                            </div>
                            <div class="call txt d-flex">
                                <a href="call:+6271001234">
                                    <i class="fa-solid fa-mobile-screen"></i>
                                    <div class="name">
                                        <p class="ttl">Call Us:</p><a href="call:0037065561234">(00 370) 655-61234</a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div></div>
        </div>
    <?php endif;
wp_reset_postdata();
?>

                    </div>
</div>


<!-- Welcome START -->
<div class="cause">
    <?php
    // field values from the options page
    $header_title = get_field('block_title', 'options');
    $header_description = get_field('description', 'options');
    ?>
    <div class="header">
        <h1>
            <?php echo $header_title; ?>
        </h1>
        <div class="hr"></div>
        <p>
            <?php echo $header_description; ?>
        </p>
    </div>
    <div class="container">
        <div class="blocks">
            <div class="row d-flex">
                <?php
                $args = array(
                    'post_type' => 'welcome',
                    // Replace 'custom_post' with your custom post type slug
                    'posts_per_page' => -1,
                );
                $cause = new WP_Query($args);
                if ($cause->have_posts()):
                    while ($cause->have_posts()):
                        $cause->the_post();
                        ?>
                        <div class="col">
                            <div class="head d-flex">
                                <div class="count">
                                    <?php the_field('count'); ?>
                                </div>
                                <div class="title">
                                    <i class="<?php the_field('fontawesome'); ?>"></i>
                                    <p class="sub">
                                        <?php the_field('sub_title'); ?>
                                    </p>
                                    <h2>
                                        <?php the_title(); ?>
                                    </h2>
                                </div>
                            </div>
                            <div class="text">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif;
                wp_reset_postdata();
                ?>
</div>
<!-- Welcome END -->
<!-- Urgent cause START -->
<div class="urgent">
    <?php
    $urgent_post_id = 1913; // Replace 123 with the ID of the specific post you want to display
    $urgent_post = get_post($urgent_post_id); // Retrieve the post by its ID
    if ($urgent_post) {
        $frontpage_title = get_field('frontpage_title', $urgent_post->ID);
        $frontpage_subtitle = get_field('frontpage_subtitle', $urgent_post->ID);
        $raised_funds = get_field('raised_funds', $urgent_post->ID);
        $goal = get_field('goal', $urgent_post->ID);
        $permalink = get_permalink($urgent_post->ID);
        ?>
        <div class="row d-flex">
            <div class="col">
                <div class="content">
                    <h1>
                        <?php echo $frontpage_title; ?>
                    </h1>
                    <div class="hr"></div>
                    <h2>
                        <?php echo $frontpage_subtitle; ?>
                    </h2>
                    <p>
                        <?php echo $urgent_post->post_excerpt; ?>
                    </p>
                    <div class="graph">
                        <div class="st">Donated<span>
                                <script>
                                    var result = (<?php echo $raised_funds; ?> * 100) / <?php echo $goal; ?>;
                                    document.write(result + '%');
                                </script>
                            </span></div>
                        <div class="nd">
                            <script>
                                document.write('<div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="' + result + '" aria-valuemin="0" aria-valuemax="100">');
                                document.write('<div class="progress-bar" style="width: ' + result + '%"></div>');
                                document.write('</div>');
                            </script>
                        </div>
                        <div class="rd">
                            <span>$
                                <?php echo $raised_funds; ?>
                            </span> Raised of <span>$
                                <?php echo $goal; ?>
                            </span> Goal
                        </div>
                    </div>
                    <div class="btn"><a href="<?php echo $permalink; ?>">Donate now</a></div>
                </div>
            </div>
            <div class="col">
                <div class="gallery">
                    <div class="owl-carousel">
                        <?php
                        $gallery_args = array(
                            'post_type' => 'gallery',
                            'posts_per_page' => -1,
                        );
                        $gallery_query = new WP_Query($gallery_args);

                        if ($gallery_query->have_posts()):
                            while ($gallery_query->have_posts()):
                                $gallery_query->the_post();
                                $gallery_images = get_field('gallery_field');

                                if ($gallery_images):
                                    foreach ($gallery_images as $image):
                                        ?>
                                        <div class="item">
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                        </div>
                                        <?php
                                    endforeach;
                                endif;
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!-- Urgent cause END -->
<!-- We Need Help START -->
<div class="help">
    <div class="container">
        <?php
        // field values from the options page
        $header_title1 = get_field('block_title1', 'options');
        $header_description1 = get_field('description1', 'options');
        ?>
        <h1>
            <?php echo $header_title1; ?>
        </h1>
        <div class="hr"></div>
        <!-- <p>
            <?php echo $header_description1; ?>
        </p> -->
        <div class="row d-flex">
            <?php
            $category_slug = 'fund-raise';
            $category = get_category_by_slug($category_slug);


            $args = array(
                'category__in' => $category->term_id,
                'post_type' => 'post',
                'posts_per_page' => 3,
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
                        <!-- <div class="date">
                            <?php the_date(); ?> <span class="comment"><a href="#">
                                    <?php comments_number(); ?>
                                </a></span>
                        </div> -->
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
        <div class="btn"><a href="<?= home_url() . "/blog/" ?>">More projects</a></div>
    </div>
</div>
<!-- We Need Help END -->
<!-- Why choose us START -->
<div class="why">
    <div class="container">
        <div class="row">
        <div class="col left">
    <?php
    $page_id = 1977; // Replace 1957 with the actual page ID you want to display
    $page = get_post($page_id);
    if ($page && $page->post_type === 'page'):
        setup_postdata($page);
        ?>
        <h1>
            <?php the_field('frontpage_title_why', $page_id); ?>
        </h1>
        <div class="hr"></div>

        <p>
            <?php echo get_the_excerpt($page_id); ?>
        </p>
        <p class="utube">
            <?php the_field('youtube', $page_id); ?>
        </p>
        <div class="btn"><a href="<?php echo get_permalink($page_id); ?>">Read more</a></div>
</div>

<?php wp_reset_postdata();
    endif;
    ?>

<div class="col right">
    <div class="accordion" id="accordionExample">
        <?php
        $args = array(
            'post_type' => 'faq',
            'posts_per_page' => 7,
        );

        $faq_posts = get_posts($args);

        $accordion_counter = 1;

        foreach ($faq_posts as $post) : setup_postdata($post);
        ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $accordion_counter; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse<?php echo $accordion_counter; ?>" aria-expanded="false"
                        aria-controls="collapse<?php echo $accordion_counter; ?>">
                        <span><?php the_title(); ?></span>
                    </button>
                </h2>
                <div id="collapse<?php echo $accordion_counter; ?>" class="accordion-collapse collapse"
                    aria-labelledby="heading<?php echo $accordion_counter; ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        <?php
        $accordion_counter++;
        endforeach;
        wp_reset_postdata();
        ?>
    </div>
</div>
</div>
</div>
</div>
<!-- Why choose us END -->
<!-- Statistics START -->
<div class="stats">
    <div class="container">
        <div class="row">
            <div class="col d-flex compl">
                <i class="fa-solid fa-flag-checkered"></i>
                <div class="inf">
                    <div class="count"><?php echo get_field('completed_projects', 'option'); ?></div>
                    <p>Completed projects</p>
                </div>
            </div>
            <div class="col d-flex group">
                <i class="fa-solid fa-people-group"></i>
                <div class="inf">
                    <div class="count"><?php echo get_field('our_team', 'option'); ?></div>
                    <p>Our Team</p>
                </div>
            </div>
            <div class="col d-flex awards">
                <i class="fa-solid fa-trophy"></i>
                <div class="inf">
                    <div class="count"><?php echo get_field('awards', 'option'); ?></div>
                    <p>Awards</p>
                </div>
            </div>
            <div class="col d-flex volunt">
                <i class="fa-solid fa-user-tie"></i>
                <div class="inf">
                    <div class="count"><?php echo get_field('volunteer', 'option'); ?></div>
                    <p>Volunteer</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Statistics END -->
<!-- Partners START -->
<div class="partners">
    <div class="container">
        <h1>Our <span>Partners</span></h1>
        <div class="hr"></div>
        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <div class="logos d-flex">
            <?php
            $args = array(
                'post_type' => 'partners',
                'posts_per_page' => -1,
            );
            $partners_query = new WP_Query($args);

            if ($partners_query->have_posts()) :
                while ($partners_query->have_posts()) :
                    $partners_query->the_post();
                    $partner_link = get_field('url_to_partners_page');
            ?>
                    <div class="logo">
                        <?php if (!empty($partner_link)) : ?>
                            <a href="<?php echo esc_url($partner_link); ?>">
                        <?php endif; ?>
                        <?php the_post_thumbnail(); ?>
                        <?php if (!empty($partner_link)) : ?>
                            </a>
                        <?php endif; ?>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo 'No partners found.';
            endif;
            ?>
        </div>
    </div>
</div>

<!-- Partners END -->
<div class="cta">
    <div class="container d-flex">
        <?php
        $page_id = 1997;
        $page = get_post($page_id);
        if ($page) :
        ?>
            <div class="text"><?php echo get_the_excerpt($page_id); ?></div>
            <div class="buttn"><a href="<?php echo get_permalink($page_id); ?>">Donate now</a></div>
        <?php endif; ?>
    </div>
</div>













<div class="content-wrapper">

    <?php
    if (have_posts()) {
        the_post();
        the_content();
    }
    ?>

</div>
<?php get_footer(); ?>