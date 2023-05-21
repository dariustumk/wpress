<?php
// adds dynamic title tag support
function vcoding_theme_support() {
add_theme_support('title-tag'); // title tag with wp
add_theme_support('custom-logo'); // logo with wp
add_theme_support('post-thumbnails'); // enable featured images in posts
}
add_action('after_setup_theme', 'vcoding_theme_support');

// menu location
function vcoding_menus(){
    $locations = array(
        'primary' => "Desktop Primary top menu",
        'footer' => "footer menu items"
    );
    register_nav_menus($locations);
}
add_action('init', 'vcoding_menus');

// adding style links to head
function vcoding_register_styles() {
    $version = wp_get_theme()->get('Version'); // gets version of theme from wp style.css
    wp_enqueue_style('vcoding-style', get_template_directory_uri() . "/assets/css/template.css", array('vcoding-bootstrap'), $version, 'all');
    wp_enqueue_style('vcoding-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css", array(), '5.2.1', 'all');
    wp_enqueue_style('vcoding-carousel', "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css", array(), '', 'all');
    wp_enqueue_style('vcoding-carouselmin', "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css", array(), '', 'all');
}
add_action('wp_enqueue_scripts', 'vcoding_register_styles');

// adding scripts links to footer
function vcoding_register_scripts() {  
    wp_enqueue_script('vcoding-fontawesome', "https://kit.fontawesome.com/036a914ee7.js", array(), '6.4.0', true);
    wp_enqueue_script('vcoding-bootscript', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js", array(), '5.0.2', true);
    wp_enqueue_script('vcoding-jquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js", array(), '', true);
    wp_enqueue_script('vcoding-carousel', "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js", array(), '', true);
    wp_enqueue_script('vcoding-scripts', get_template_directory_uri() . "/assets/js/scripts.js", array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'vcoding_register_scripts');

// enable page excerpts
function enable_page_excerpts() {
  add_post_type_support('page', 'excerpt');
}
add_action('init', 'enable_page_excerpts');


// social icons template area (widget)
// function vcoding_widget_areas() {
//     register_sidebar(
//         array(
//             'before_title' => '',
//             'after_title' => '',
//             'before_widget' => '<ul>',
//             'after_widget' => '</ul>',
//             'name' => 'social area',
//             'id' => 'social-1',
//             'description' => 'social area buttons'
//         ));
// }
// add_action('widgets_init', 'vcoding_widget_areas');

// slideshow post type
function slideshow_post_type() {
    $labels = array(
      'name' => __('Slideshows'),
      'singular_name' => __('Slideshow')
    );
    $args = array(
      'labels' => $labels,
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-images-alt2',
      'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('slideshow', $args);
  }
  add_action('init', 'slideshow_post_type');

// The "Welcome" block post type  
function welcome_post_type() {
    $labels = array(
      'name' => __('Welcome posts'),
      'singular_name' => __('welcome')
    );
    $args = array(
      'labels' => $labels,
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('welcome', $args);
  }
  add_action('init', 'welcome_post_type');

  // option pages
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array('page_title' => 'Welcome Optional',
    'parent_slug'   => 'edit.php?post_type=welcome'
));
}
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array('page_title' => 'Help block',
));
}
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array('page_title' => 'Statistics block'
));
}
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array('page_title' => 'Social block'
));
}

// gallery post type
// Register Custom Post Type
function create_gallery_post_type() {
    $labels = array(
        'name'               => 'Galleries',
        'singular_name'      => 'Gallery',
        'menu_name'          => 'Gallery',
        'name_admin_bar'     => 'Gallery',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Gallery',
        'new_item'           => 'New Gallery',
        'edit_item'          => 'Edit Gallery',
        'view_item'          => 'View Gallery',
        'all_items'          => 'All Galleries',
        'search_items'       => 'Search Galleries',
        'parent_item_colon'  => 'Parent Galleries:',
        'not_found'          => 'No galleries found.',
        'not_found_in_trash' => 'No galleries found in Trash.'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'gallery' ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'thumbnail' )
    );

    register_post_type( 'gallery', $args );
}
add_action( 'init', 'create_gallery_post_type' );

// The "FAQ" block post type 
function faq_post_type() {
  $labels = array(
    'name' => __('FAQ posts'),
    'singular_name' => __('faq')
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail')
  );
  register_post_type('faq', $args);
}
add_action('init', 'faq_post_type');

// Partners block post type 
function partners_post_type() {
  $labels = array(
    'name' => __('Partner banners'),
    'singular_name' => __('partners')
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'thumbnail', 'custom-fields')
  );
  register_post_type('partners', $args);
}
add_action('init', 'partners_post_type');

?>