<?php
/**
* volcano 2022 Theme Functions And Definitions
*/

// Name define
define('THEME_URI',  get_stylesheet_directory_uri());
define('THEME_DIR', get_stylesheet_directory());
define('DF_IMAGE', THEME_URI. '/assets/images');

// Includes file function
include THEME_DIR . '/includes/admin-function.php';

function volcano_setup () {
    // Setup text-domain
	load_child_theme_textdomain( 'volcano', THEME_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'volcano_setup' );

// Setup enqueue scripts function
function volcano() {
    $date = date('l jS \of F Y h:i:s A');

    // Add Library CSS
    wp_dequeue_style('style', THEME_URI .'/style.css');
    wp_enqueue_style('bootstrap', THEME_URI. '/assets/css/lib/bootstrap/bootstrap.min.css');
    wp_enqueue_style('slick', THEME_URI. '/assets/css/lib/slick/slick.css');
    wp_enqueue_style('animation', THEME_URI. '/assets/css/lib/animation/animation.min.css');
    wp_enqueue_style('wow-animation', THEME_URI. '/assets/css/lib/animation/animate.min.css');
    wp_enqueue_style('aos-animation', THEME_URI. '/assets/css/lib/animation/aos.css');
    wp_enqueue_style('font-awesome6', THEME_URI. '/assets/fonts/font-awesome/css/font-awesome.min.css');

    // Add Library JS
    wp_enqueue_script('jquery', THEME_URI. '/assets/js/lib/jquery.min.js', '','' , false);
    wp_enqueue_script('slick-animation', THEME_URI. '/assets/js/lib/slick-animation.min.js', '','' , false);
    wp_enqueue_script('slick', THEME_URI. '/assets/js/lib/slick.min.js', '','' , false);
    wp_enqueue_script('bootstrap-js', THEME_URI. '/assets/js/lib/bootstrap.min.js', '','' , false);
	wp_enqueue_script( 'Wow-animation', THEME_URI. '/assets/js/lib/WOW.js', '','' , true);
	wp_enqueue_script( 'aos-animation', THEME_URI. '/assets/js/lib/aos.js', '','' , true);

    // Add Main CSS
    wp_enqueue_style('main-style', THEME_URI.'/assets/css/main.css?'.$date);
    wp_enqueue_style('custom-style', THEME_URI.'/assets/css/custom.css?'.$date);

    // Add Main JS
    wp_enqueue_script('main-script', THEME_URI. '/assets/js/main.js?'.$date, '','' , false);
    wp_enqueue_script('work-page-script', THEME_URI. '/assets/js/features/filter-work-page.js?'.$date, '','' , false);
    wp_enqueue_script('service-page-script', THEME_URI. '/assets/js/features/service-popup.js?'.$date, '','' , false);
    wp_enqueue_script('project-development-script', THEME_URI. '/assets/js/features/project-development.js?'.$date, '','' , false);
}

add_action('wp_enqueue_scripts', 'volcano');

// add arrow for sub menu
add_filter( 'walker_nav_menu_start_el', 'add_arrow',10,4);
function add_arrow( $output, $item, $depth, $args ) {
    if('primary' == $args->theme_location && $depth === 0 ){
        if (in_array("menu-item-has-children", $item->classes)) {
            $output .='<span class="sub-menu-arrow"></span>';
        }
    }
    return $output;
}

// Register widget
function volcano_widgets_language() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Switcher area', 'volcano' ),
			'id'            => 'widget-switcher-area',
			'description'   => esc_html__( 'Add widgets here to appear in your site header.', 'volcano' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		)
	);
}
add_action( 'widgets_init', 'volcano_widgets_language' );

function volcano_widgets_social() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer social area', 'volcano' ),
			'id'            => 'widget-social-area',
			'description'   => esc_html__( 'Add widgets here to appear in your site social Footer.', 'volcano' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		)
	);
}
add_action( 'widgets_init', 'volcano_widgets_social' );

function volcano_widgets_instagram() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer instagram area', 'volcano' ),
			'id'            => 'widget-instagram-area',
			'description'   => esc_html__( 'Add widgets here to appear in your site instagram Footer.', 'volcano' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
}
add_action( 'widgets_init', 'volcano_widgets_instagram' );

function volcano_widgets_logoFooter() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer logo area', 'volcano' ),
			'id'            => 'widget-logo-footer-area',
			'description'   => esc_html__( 'Add widgets here to appear logo in your site Footer.', 'volcano' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		)
	);
}
add_action( 'widgets_init', 'volcano_widgets_logoFooter' );

// Hide WordPress Admin Bar
show_admin_bar(false);
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'remove_admin_bar');

// Add custom color for All WYSIWYG editors
function customColorWysiwyg($init) {
	$custom_colours = '
		"E50019", "Color main volcano",
		"D43F3", "Color primary volcano",
		"FAEDE5", "Color main light volcano",
		"FFFBF8", "Color primary light volcano",
		"FABF5E", "jaune maximum",
		"40A6D6", "bleu caroline",
		"F79E85", "Corail tangerine",
		"FF664D", "Rouge tomato",
		"000000", "Noir",
		"993300", "Burnt orange",
		"333300", "Dark olive",
		"003300", "Dark green",
		"003366", "Dark azure",
		"000080", "Navy Blue",
		"333399", "Indigo",
		"333333", "Very dark gray",
		"800000", "Maroon",
		"FF6600", "Orange",
		"808000", "Olive",
		"008000", "Green",
		"008080", "Teal",
		"0000FF", "Blue",
		"666699", "Grayish blue",
		"808080", "Gray",
		"FF0000", "Red",
		"FF9900", "Amber",
		"99CC00", "Yellow green",
		"339966", "Sea green",
		"33CCCC", "Turquoise",
		"3366FF", "Royal blue",
		"800080", "Purple",
		"999999", "Medium gray",
		"FF00FF", "Magenta",
		"FFCC00", "Gold",
		"FFFF00", "Yellow",
		"00FF00", "Lime",
		"00FFFF", "Aqua",
		"00CCFF", "Sky blue",
		"993366", "Red violet",
		"FFFFFF", "White",
		"FF99CC", "Pink",
		"FFCC99", "Peach",
		"FFFF99", "Light yellow",
		"CCFFCC", "Pale green",
		"CCFFFF", "Pale cyan",
		"99CCFF", "Light sky blue",
		"CC99FF", "Plum",
	';

	// build colour grid default+custom colors
	$init['textcolor_map'] = '[' . $custom_colours . ']';

	// change the number of rows in the grid if the number of colors changes
	$init['textcolor_rows'] = 8;

	return $init;
}

add_filter('tiny_mce_before_init', 'customColorWysiwyg');

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );
