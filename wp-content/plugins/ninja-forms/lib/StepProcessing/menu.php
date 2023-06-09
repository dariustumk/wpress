<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Register our step processing admin page.
 *
 * @since 2.7.6
 * @return void
 */
function nf_register_step_processing_page() {
    // Register our admin page
    $admin_page = add_submenu_page( 'options.php', esc_html__( 'Ninja Forms Processing', 'ninja-forms' ), esc_html__( 'Processing', 'ninja-forms' ), apply_filters( 'ninja_forms_admin_menu_capabilities', 'manage_options' ), 'nf-processing', 'nf_output_step_processing_page' );

    add_action( 'admin_print_styles-' . $admin_page, 'nf_step_processing_css' );
    add_action( 'admin_print_styles-' . $admin_page, 'nf_step_processing_js' );
}

add_action( 'admin_menu', 'nf_register_step_processing_page' );

/**
 * Enqueue our step processing CSS.
 *
 * @since 2.7.6
 * @return void
 */
function nf_step_processing_css() {
    wp_enqueue_style( 'jquery-smoothness', Ninja_Forms::$url .'lib/Legacy/jquery-smoothness.css');
}

/**
 * Enqueue our step processing JS.
 *
 * @since 2.7.6
 * @return void
 */
function nf_step_processing_js() {
    wp_enqueue_script( 'nf-processing',
        Ninja_Forms::$url . 'lib/Legacy/step-processing.js',
        array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable', 'jquery-ui-datepicker', 'jquery-ui-draggable', 'jquery-ui-droppable', 'jquery-ui-progressbar' ) );

    $step_labels = apply_filters( 'nf_step_processing_labels', array(
        'Lacing Our Tabis',
        'Cleaning The Dojo',
        'Doing Splits',
        'Buffing Bo Staff',
        'Intimidating Gaze',
        'Sparring',
        'Packing Smoke Bombs',
        'Polishing Shuriken',
        'Throwing Sais',
        'Calling Our Mom',
        'Practicing Katas',
        'Swinging Nunchucks',
        'Sharpening Swords',
        'Ironing Ninja Gi',
        'Eating Breakfast',
        'Cutting Stuff',
        'Doing Dishes',
        'Climbing Walls'
    ) );


    wp_localize_script( 'nf-processing', 'nf_processing', array( 'step_labels' => $step_labels ) );
}

/**
 * Output our step processing admin page.
 *
 * @since 2.7.6
 * @return void
 */
function nf_output_step_processing_page() {
    $page_title = nfExtractPageTitle( $_REQUEST['title'] ) ;
    ?>
    <style>
        .ui-progressbar {
            position: relative;
            width: 800px;
            max-width: 100%;
            height: 20px;

        }

        .progress-label {
            line-height: 12px;
            position: absolute;
            left: 40%;
            top: 4px;
            font-weight: bold;
            text-shadow: 1px 1px 0 #fff;

        }

        .ui-progressbar-value {
            /*background-size: 100% auto;*/
            background-color: #FFF;
            background-repeat: repeat;
            background-image: url(<?php echo NF_PLUGIN_URL . 'assets/img/pbar-ani.gif'; ?>);
        }

    </style>
    <script type="text/javascript">

        <?php
        if ( isset ( $_REQUEST['action'] ) && ! empty ( $_REQUEST['action'] ) ) {
        $action = esc_html__( 'Loading...', 'ninja-forms' );
        ?>
        var nfProcessingAction = 'nf_<?php echo esc_html( $_REQUEST['action'] ); ?>';
        <?php
        } else {
        $action = esc_html__( 'No Action Specified...', 'ninja-forms' );
        ?>
        var nfProcessingAction = 'none';
        <?php
        }

        $tmp_array = array();
        $url_params = parse_url( esc_url_raw( add_query_arg( array() ) ) );
        $query = $url_params['query'];
        $query = parse_str( $query, $tmp_array );
        unset ( $tmp_array['action'] );
        unset ( $tmp_array['page'] );
        ?>

        var nfProcessingArgs = <?php echo json_encode( $tmp_array ); ?>

    </script>

    <?php

    ?>

    <div class="wrap">
        <h2><?php echo $page_title ?></h2>
        <div id="nf-upgrade-status">
            <p><?php esc_html_e( 'The process has started, please be patient. This could take several minutes. You will be automatically redirected when the process is finished.', 'ninja-forms' ); ?></p>
            <div id="progressbar">
                <div class="progress-label">
                    <?php echo $action; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- DISPLAY ERRORS -->
    <div id="nf-upgrade-errors" class="hidden nf-upgrade-errors">

        <h3 class="nf-upgrade-errors-header">Error Log</h3>

        <ul class="nf-upgrade-errors-list"></ul>

    </div>

    <?php
}

/**
 * Extract page title from given input
 *
 * @param string $title
 * @return string
 */
function nfExtractPageTitle($title){
    $return = isset ( $title ) ?  esc_html ( urldecode($title ) ) : esc_html__( 'Ninja Forms - Processing', 'ninja-forms' );

    return $return;
}