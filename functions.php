<?php

// THIS WILL ALLOW ADDING CUSTOM CSS TO THE style.css FILE and JS code to /js/zn_script_child.js

add_action( 'wp_enqueue_scripts', 'kl_child_scripts',11 );
function kl_child_scripts() {

	wp_deregister_style( 'kallyas-styles' );
    wp_enqueue_style( 'kallyas-styles', get_template_directory_uri().'/style.css', '' , ZN_FW_VERSION );
    wp_enqueue_style( 'kallyas-child', get_stylesheet_uri(), array('kallyas-styles') , ZN_FW_VERSION );

	/**
	 **** Uncomment this line if you want to add custom javascript file
	 */
	// wp_enqueue_script( 'zn_script_child', get_stylesheet_directory_uri() .'/js/zn_script_child.js' , '' , ZN_FW_VERSION , true );

}

/* ======================================================== */

/**
 * Load child theme's textdomain.
 */
add_action( 'after_setup_theme', 'kallyasChildLoadTextDomain' );
function kallyasChildLoadTextDomain(){
   load_child_theme_textdomain( 'zn_framework', get_stylesheet_directory().'/languages' );
}

add_action('wp_enqueue_scripts', 'sfintel_book_preview_enqueue_script');

function sfintel_book_preview_enqueue_script() {
	$get_current_id =get_the_ID();
	if($get_current_id=='234'){
	$sfintel_book_preview_nonce = wp_create_nonce('sfintel_book_preview-ajax-nonce');
            $sfintel_book_preview_object = array('ajax_url' => admin_url('admin-ajax.php'), 'ajax_nonce' => $sfintel_book_preview_nonce);
            wp_enqueue_script('sfintel_book_preview_script', get_template_directory_uri() . '/js/custom-book-preview.js', array('jquery'), '', false);
            wp_localize_script('sfintel_book_preview_script', 'sfintel_book_preview_js_params', $sfintel_book_preview_object);

           wp_enqueue_script('sfintel_book_preview_script_turnjs', get_stylesheet_directory_uri() . '/samples/lib/turn.min.js', '', false); 
           wp_enqueue_script('sfintel_book_preview_script_job-js', get_stylesheet_directory_uri(). '/samples/steve-jobs/js/steve-jobs.js','', false);  
            wp_enqueue_style('sfintel_book_preview_stevejobs-css', get_stylesheet_directory_uri(). '/samples/steve-jobs/css/steve-jobs.css', ZN_FW_VERSION);
            wp_enqueue_script('sfintel_book_preview_script_turnhtml4-js', get_stylesheet_directory_uri(). '/samples/lib/turn.html4.min.js', '', false);  
             wp_enqueue_script('sfintel_book_preview_script_modernizer-js', get_stylesheet_directory_uri(). '/samples/extras/modernizr.2.5.3.min.js', array('jquery'), '', false);
             wp_enqueue_script('sfintel_book_preview_script_hash-js', get_stylesheet_directory_uri(). '/samples/lib/hash.js', '', false);
             wp_enqueue_script('sfintel_book_preview_script_mousewheel-js', get_stylesheet_directory_uri(). '/samples/extras/jquery.mousewheel.min.js', array('jquery'), '', false); 
             wp_enqueue_script('sfintel_book_preview_script_extras-js', get_stylesheet_directory_uri(). '/samples/extras/jquery-ui-1.8.20.custom.min.js', array('jquery'), '', false); 
            wp_enqueue_style('sfintel_book_preview_jqueryhtml4-css', get_stylesheet_directory_uri(). '/samples/steve-jobs/css/jquery.ui.html4.css', ZN_FW_VERSION);

           
            wp_enqueue_style('sfintel_book_preview_stevesjobshtml4-css', get_stylesheet_directory_uri(). '/samples/steve-jobs/css/steve-jobs-html4.css', ZN_FW_VERSION);
            wp_enqueue_style('sfintel_book_preview_jquery-css', get_stylesheet_directory_uri(). '/samples/steve-jobs/css/jquery.ui.css', ZN_FW_VERSION);
}
           
}

// add_action('wp_ajax_sfintel_book_preview_pull_data_contents','sfintel_book_preview_pull_data_contents');

function sfintel_book_preview_pull_data_contents(){
//   //include( 'samples/steve-jobs/index.html' );
//  die();
}

  add_action('wp_footer', 'sfintel_book_preview_js_default_footer_content');

  function sfintel_book_preview_js_default_footer_content(){

  	require_once('samples/steve-jobs/index.html');
  }

/* ======================================================== */

/**
 * Example code loading JS in Header. Uncomment to use.
 */

/* ====== REMOVE COMMENT

add_action('wp_head', 'KallyasChild_loadHeadScript' );
function KallyasChild_loadHeadScript(){

	echo '
	<script type="text/javascript">

	// Your JS code here

	</script>';

}
 ====== REMOVE COMMENT */

/* ======================================================== */

/**
 * Example code loading JS in footer. Uncomment to use.
 */

/* ====== REMOVE COMMENT

add_action('wp_footer', 'KallyasChild_loadFooterScript' );
function KallyasChild_loadFooterScript(){

	echo '
	<script type="text/javascript">

	// Your JS code here

	</script>';

}
 ====== REMOVE COMMENT */

/* ======================================================== */
