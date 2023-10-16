<?php
/**
 * easyjazzradio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package easyjazzradio
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function easyjazzradio_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on easyjazzradio, use a find and replace
		* to change 'easyjazzradio' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'easyjazzradio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
			'menu-1' => esc_html__( 'Primary', 'easyjazzradio' ),
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
			'easyjazzradio_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'easyjazzradio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function easyjazzradio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'easyjazzradio_content_width', 640 );
}
add_action( 'after_setup_theme', 'easyjazzradio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function easyjazzradio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'easyjazzradio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'easyjazzradio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'easyjazzradio_widgets_init' );

function easyjazzradio_analytics(){ ?>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-KF3RKGD2FG"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  		gtag('js', new Date());
		gtag('config', 'G-KF3RKGD2FG');
	</script>
<? }
add_action('wp_head','easyjazzradio_analytics', 20);


/**
 * Enqueue scripts and styles.
 */
function easyjazzradio_scripts() {

	wp_enqueue_style( 'easyjazzradio-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'tailwindcss', get_template_directory_uri() . '/assets/css/tailwind.css', array(), '1.6.8' );
	wp_style_add_data( 'easyjazzradio-style', 'rtl', 'replace' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Lora:wght@400;600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet" rel="stylesheet', array(), null);

	if ( is_front_page() ) {
		wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), _S_VERSION );
        wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), _S_VERSION, true );
		wp_enqueue_script( 'slick-custom', get_template_directory_uri() . '/assets/js/slick.js', array(), _S_VERSION, true );
    }

	if( is_singular('station') ) {
		wp_enqueue_style( 'cheeta-player-base', 'https://cheetah.streemlion.com:1940/media/static/css/player/base.css', array(), _S_VERSION );
		wp_enqueue_style( 'cheeta-jquery-ui', 'https://cheetah.streemlion.com:1940/media/static/css/ui/jquery.ui.slider.css', array(), _S_VERSION );
		wp_enqueue_style( 'cheeta-status-widget', 'https://cheetah.streemlion.com:1940/media/static/css/current_track_widget/status_widget.css', array(), _S_VERSION );
        wp_enqueue_script( 'cheeta-jquery-player', 'https://cheetah.streemlion.com:1940/media/static/js/jplayer/jquery.jplayer.min.js', array('jquery'), _S_VERSION, true );
		wp_enqueue_script( 'cheeta-jquery-ui', 'https://cheetah.streemlion.com:1940/media/static/js/jplayer/jquery-ui-1.10.2.custom.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'cheeta-modernizr', 'https://cheetah.streemlion.com:1940/media/static/js/jplayer/modernizr.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'cheeta-jplayer', 'https://cheetah.streemlion.com:1940/media/static/js/jplayer/rt_pl.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'cheeta-status-widget', 'https://cheetah.streemlion.com:1940/media/static/js/current_track_widget/status_widget.js', array(), _S_VERSION, true );
	}

	// wp_enqueue_script( 'easyjazzradio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'easyjazzradio_scripts' );

function gg_gfonts_prefetch() {
	echo '<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>';
	echo '<link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin>';
}
add_action( 'wp_head', 'gg_gfonts_prefetch' );

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

