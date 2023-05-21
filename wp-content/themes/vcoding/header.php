<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no" />
    <link href="<?= get_template_directory_uri() . "/assets/images/favicon.ico" ?>" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="topbar">
            <div class="wrapper">
            <div class="container logo">
                <div class="logo">
                    <?php if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }
                    ?>
                    <!-- site name start -->
                    <!-- <a href="/" class="site-title"><?php echo get_bloginfo('name'); ?></a> -->
                    <!-- site name end -->
                </div>
            </div>
            <!-- menu START -->
            <div class="menu navigation">
                <div class="container">
                    <input class="hamburger-button" type="checkbox" id="hamburger-button" />
                    <label for="hamburger-button">
                        <div></div>
                    </label>
                    <div class="menu">
                        <nav>
                            <?php
                            wp_nav_menu(
                                array(
                                    'menu' => 'primary',
                                    'container' => '',
                                    'theme_lovation' => 'primary',
                                    'items_wrap' => '<ul id="" class="">%3$s</ul>'
                                )
                            );
                            ?>
                        </nav>
                    </div>
                </div></div>
            </div>
        </div>
        <!-- menu END -->
     </header>
    <div class="content-wrapper">