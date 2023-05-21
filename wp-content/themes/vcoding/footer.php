</div>
<footer class="footer">

    <div class="container">
        <div class="row d-flex">
            <div class="col">
                <img src="<?= get_template_directory_uri() . "/assets/images/logo-onblack.png" ?>" alt="NGOO">
                <?php
                $page_id = 1997;
                $page = get_post($page_id);
                if ($page) {
                    echo "<p>" . $page->post_excerpt . "</p>";
                }
                ?>
            </div>
            <div class="col">
                <h4>Who we are</h4>
                <div class="hr"></div>
                <div class="menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'menu' => 'primary',
                            'container' => '',
                            'theme_location' => 'primary',
                            'items_wrap' => '<ul id="" class="">%3$s</ul>'
                        )
                    );
                    ?>
                </div>
            </div>
            <div class="col cnt">
                <h4>Where we work</h4>
                <div class="hr"></div>
                <?php
                $page_id = 1711;
                $page = get_post($page_id);
                if ($page) {
                    echo "" . $page->post_excerpt . "";
                }
                ?>
            </div>
            <div class="col">
                <h4>Follow us</h4>
                <div class="hr"></div>
                <p><?php echo get_field('social_label', 'option') ?></p>
                <div class="soc d-flex">
                    <a href="<?php echo get_field('facebook_url', 'option') ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="<?php echo get_field('twitter_url', 'option') ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    <a href="<?php echo get_field('instagram_url', 'option') ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="<?php echo get_field('youtube_url', 'option') ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>

    </div>
    <div class="copyright">
        <div class="container">
            <?php
            function displayYears()
            {
                $currentYear = date('Y');
                $startYear = 2015;
                if ($startYear < $currentYear) {
                    return "© {$startYear}-{$currentYear}";
                } else {
                    return "© {$currentYear}";
                }
            }
            ?>
            <p><?php echo displayYears(); ?> NGOO Charity & Non-profit. All rights reserved</p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>