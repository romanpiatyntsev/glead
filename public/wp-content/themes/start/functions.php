<?php
/**
 * Start functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package start
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.1' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function start_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on start, use a find and replace
		* to change 'start' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'start', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	// add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'start' ),
			'footer-menu-1' => esc_html__( 'Footer One', 'start' ),
			'footer-menu-2' => esc_html__( 'Footer Two', 'start' ),
			'footer-menu-3' => esc_html__( 'Footer Three', 'start' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'start_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	// add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 120,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'start_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function start_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'start_content_width', 640 );
}
add_action( 'after_setup_theme', 'start_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function start_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'start' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'start' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Address Two', 'start' ),
			'id'            => 'footer-address-2',
			'description'   => esc_html__( 'Add widgets here.', 'start' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Address Three', 'start' ),
			'id'            => 'footer-address-3',
			'description'   => esc_html__( 'Add widgets here.', 'start' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Address One', 'start' ),
			'id'            => 'footer-address-1',
			'description'   => esc_html__( 'Add widgets here.', 'start' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'start_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function start_scripts() {
	//wp_enqueue_style( 'start-style', get_stylesheet_uri(), array(), _S_VERSION );
	if ( is_front_page() ) {
		wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/frontpage.css', array(), _S_VERSION );
	} else {
		wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION );
	}

	wp_enqueue_script( 'start-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'start_scripts' );

/**
 * Add preload in-line styles.
 */
function arvo_inline_styles() {
	printf('<style id="arvo-preload-style-css">%s %s</style>', arvo_get_font_face_styles(), arvo_get_preload_styles() );
}

add_action('wp_head', 'arvo_inline_styles', 5);

/**
 * Enqueue editor styles.
 * 
 * @return void
 */
function arvo_editor_styles() {
	wp_add_inline_style( 'wp-block-library', arvo_get_font_face_styles() );
}

add_action( 'admin_init', 'arvo_editor_styles' );

/**
 * Get preload styles.
 *
 * @return string
 */
function arvo_get_preload_styles() {
	return file_get_contents( get_template_directory() . '/assets/css/preload.css' );
}

/**
 * Get font face styles.
 * Called by functions twentytwentytwo_styles() and twentytwentytwo_editor_styles() above.
 *
 * @return string
 */
function arvo_get_font_face_styles() {

	return "
	@font-face{
		font-family: 'Montserrat';
		font-weight: 700;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_theme_file_uri( 'assets/fonts/montserat_700_latin.woff2' ) . "') format('woff2');
	}

	@font-face{
		font-family: 'Roboto';
		font-weight: 300;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_theme_file_uri( 'assets/fonts/roboto_300_latin.woff2' ) . "') format('woff2');
	}
	";
}

/**
 * Preloads the main web font to improve performance.
 *
 * @since Arvo 1.0
 *
 * @return void
 */
function arvo_preload_webfonts() {
	?>
	<link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/montserat_700_latin.woff2' ) ); ?>" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/roboto_300_latin.woff2' ) ); ?>" as="font" type="font/woff2" crossorigin>
	<?php
}

add_action( 'wp_head', 'arvo_preload_webfonts', 1 );

/**
 * Remove Gutenberg Block Library CSS from loading on the frontend
 */
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

/**
 * Remove Default Settings
 */
function remove_global_settings() {
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
	remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'remove_global_settings', 100 );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Header Settings',
	// 	'menu_title'	=> 'Header',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
}


/**
 * Implement the Shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Function, which return custom post title if exist or post title
 *
 * @return string
 * 
 */
function get_custom_title( $post_id = null ) {
	return get_field( 'custom_page_title', $post_id ) ?? get_the_title( $post_id );
}