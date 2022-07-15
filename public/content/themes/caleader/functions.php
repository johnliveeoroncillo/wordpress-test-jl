<?php
/**
 * Caleader functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package caleader
 */
if ( ! defined( 'CALEADER_THEME_URI' ) ) {
	define( 'CALEADER_THEME_URI', get_template_directory_uri() );
}

define( 'CALEADER_THEME_DIR', get_template_directory() );
define( 'CALEADER_CSS_URL', get_template_directory_uri() . '/assets/css' );
define( 'CALEADER_CSS_DIR', CALEADER_THEME_DIR . '/assets/css' );
define( 'CALEADER_CSS_URL_DEFAULT', get_template_directory_uri() );
define( 'CALEADER_JS_URL', get_template_directory_uri() . '/assets/js' );
define( 'CALEADER_IMG_URL', CALEADER_THEME_URI . '/assets/images/' );
define( 'CALEADER_FREAMWORK_DIRECTORY', CALEADER_THEME_DIR . '/framework/' );
define( 'CALEADER_INC_DIRECTORY', CALEADER_THEME_DIR . '/inc/' );

$caleader_theme_varsion = wp_get_theme()->get( 'Version' );
if ( has_filter( 'caleader_version' ) ) {
	$caleader_theme_varsion = apply_filters( 'caleader_version', $caleader_theme_varsion );
}
define( 'VERSION', $caleader_theme_varsion );

require get_template_directory() . '/icon.php';

require_once CALEADER_FREAMWORK_DIRECTORY . 'plugin-list.php';
require_once CALEADER_FREAMWORK_DIRECTORY . 'class-tgm-plugin-activation.php';
require_once CALEADER_FREAMWORK_DIRECTORY . 'config.tgm.php';
require_once CALEADER_FREAMWORK_DIRECTORY . '/dashboard/class-dashboard.php';

require get_template_directory() . '/framework/customizer.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/*
 * Load Menu Walker
 * Load Aqua Resizer
 */
require_once CALEADER_FREAMWORK_DIRECTORY . 'nav_menu_walker.php';

require get_template_directory() . '/hooks/functions.php';

require_once CALEADER_CSS_DIR . '/style-8.php';

require_once CALEADER_CSS_DIR . '/custom-color.php';

if ( ! function_exists( 'caleader_setup' ) ) {

	function caleader_setup() {
		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Pool Services, use a find and replace
		* to change 'caleader' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'caleader', get_template_directory() . '/languages' );

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
				'primary'      => esc_html__( 'Primary', 'caleader' ),
				'footer-menu'  => esc_html__( 'Footer Menu', 'caleader' ),
				'account-menu' => esc_html__( 'Account Menu', 'caleader' ),
			)
		);

		/*
		* Enable support for Post Formats.
		*/
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'gallery',
				'audio',
				'video',
				'link',
				'quote',
			)
		);

		add_theme_support(
			'custom-logo',
			array(
				'flex-width'      => true,
				'width'           => 260,
				'flex-height'     => true,
				'height'          => 100,
				'header-selector' => '.site-title a',
				'header-text'     => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
			)
		);

		$defaults = array(
			'post'       => '500',
			'page'       => '500',
			'attachment' => '650',
			'artist'     => '300',
			'movie'      => '400',
		);

		add_theme_support( 'content-width', $defaults );

		if ( ! isset( $content_width ) ) {
			$content_width = 900;
		}

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Add custom thumb size
		add_image_size( 'caleader-services-full', 830, 503, true );
		add_image_size( 'caleader-services-thumbnail', 571, 533, true );
		add_image_size( 'caleader-blog-post-home-image', 370, 286, true );
		add_image_size( 'caleader-blog-post-featured-image', 270, 177, true );
	}
}

add_action( 'after_setup_theme', 'caleader_setup' );

if ( ! function_exists( 'caleader_options' ) ) {

	function caleader_options( $option ) {
		return get_theme_mod( $option, caleader_default( $option ) );
	}
}

if ( ! function_exists( 'caleader_default' ) ) {

	function caleader_default( $option ) {
		$default = array(
			'header_address'     => esc_html__( '3261 Anmoore Road, Brooklyn, NY 11230', 'caleader' ),
			'site_color'         => 'red',
			'header_style'       => '1',
			'header_transparent' => 0,
		);
		if ( ! empty( $default[ $option ] ) ) {
			return $default[ $option ];
		}
	}
}

if ( ! function_exists( 'caleader_footer' ) ) {

	function caleader_footer( $layout ) {
		return get_theme_mod( $layout, caleader_default_layout( $layout ) );
	}
}

if ( ! function_exists( 'caleader_default_layout' ) ) {

	function caleader_default_layout( $layout ) {
		$default_footer = array(
			'footer'      => esc_html__( 'layout1', 'caleader' ),
			'copyright'   => esc_html__( 'Copyright 2019 Car Leader', 'caleader' ),
			'privacy'     => esc_html__( 'PRIVACY POLICY', 'caleader' ),
			'footer_map'  => esc_html__( 'on', 'caleader' ),
			'zoom'        => esc_html__( '14', 'caleader' ),
			'marker_name' => esc_html__( 'caleader', 'caleader' ),
			'lattitude'   => esc_html__( '59.3', 'caleader' ),
			'longi'       => esc_html__( '18.0941403', 'caleader' ),
		);
		if ( ! empty( $default_footer[ $layout ] ) ) {
			return $default_footer[ $layout ];
		}
	}
}
/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'caleader_scripts', 10000 );

function caleader_scripts() {
	wp_enqueue_style( 'caleader-style', get_stylesheet_uri(), null, VERSION );

	wp_enqueue_style( 'caleader-wp-default-norm', CALEADER_CSS_URL . '/wp-default-norm.css', '', null );
	/*
	===============================================================
	* JS Files
	* --------------------------------------------------------------- */
	wp_enqueue_script( 'bootstrap', CALEADER_THEME_URI . '/external/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'jquery-elevatezoom', CALEADER_THEME_URI . '/external/elevatezoom/jquery.elevatezoom.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'slick', CALEADER_THEME_URI . '/external/slick/slick.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'panelmenu', CALEADER_THEME_URI . '/external/panelmenu/panelmenu.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'isotope-pkgd', CALEADER_THEME_URI . '/external/isotope/isotope.pkgd.min.js', array( 'jquery', 'imagesloaded' ), '', true );
	wp_enqueue_script( 'jquery-countto', CALEADER_THEME_URI . '/external/countdown/jquery.countto.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'query-sumoselect', CALEADER_THEME_URI . '/external/SumoSelect/jquery.sumoselect.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'sticky-sidebar', CALEADER_THEME_URI . '/external/sticky/theia-sticky-sidebar.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'nouislider', CALEADER_THEME_URI . '/external/noUiSlider/nouislider.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'jquery-magnific-popup', CALEADER_THEME_URI . '/external/magnific-popup/jquery.magnific-popup.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'perfect-scrollbar', CALEADER_THEME_URI . '/external/perfect-scrollbar/perfect-scrollbar.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'caleader-main', CALEADER_JS_URL . '/main.js', array( 'jquery', 'isotope-pkgd' ), time(), true );

	wp_localize_script(
		'caleader-main',
		'google_map_object',
		array(
			'ajax_url'     => esc_url( admin_url( 'admin-ajax.php' ) ),
			'lattitude'    => caleader_footer( 'lattitude' ),
			'longitude'    => caleader_footer( 'longi' ),
			'marker_name'  => caleader_footer( 'marker_name' ),
			'zoom'         => caleader_footer( 'zoom' ),
			'loader_img'   => CALEADER_IMG_URL . 'ajax-loader.gif',
			'marker_image' => caleader_footer( 'marker_image' ),
			'redirect_url' => esc_url( home_url() . '/compare' ),
		)
	);

	wp_enqueue_script( 'jquery-form', CALEADER_THEME_URI . '/external/form/jquery.form.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'jquery-validate', CALEADER_THEME_URI . '/external/form/jquery.validate.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'jquery-form-init', CALEADER_THEME_URI . '/external/form/jquery.form-init.js', array( 'jquery' ), '', true );
	$site_color = caleader_options( 'site_color' );
	
	
	$caleader_custom_colors = caleader_get_custom_colors();
	wp_add_inline_style( 'caleader-style', $caleader_custom_colors );

	switch ( $site_color ) {
		case 'one':
			wp_enqueue_style( 'caleader-yellow', CALEADER_CSS_URL . '/style-1.css', '', null );
			break;
		case 'two':
			wp_enqueue_style( 'caleader-orange', CALEADER_CSS_URL . '/style-2.css', '', null );
			break;
		case 'three':
			wp_enqueue_style( 'caleader-sky', CALEADER_CSS_URL . '/style-3.css', '', null );
			break;
		case 'four':
			wp_enqueue_style( 'caleader-green', CALEADER_CSS_URL . '/style-4.css', '', null );
			break;
		case 'five':
			wp_enqueue_style( 'caleader-cycen', CALEADER_CSS_URL . '/style-5.css', '', null );
			break;
		case 'six':
			wp_enqueue_style( 'caleader-red', CALEADER_CSS_URL . '/style-7.css', '', null );
			break;
		case 'seven':
			$caleader_custom_inline_style = '';
			$caleader_custom_inline_style = caleader_get_custom_styles();
			wp_add_inline_style( 'caleader-style', $caleader_custom_inline_style );
			break;
		default:
	}
	wp_enqueue_style( 'caleader-shop', CALEADER_CSS_URL . '/shop.css', '', null );
	wp_enqueue_style( 'sumoSelect', CALEADER_THEME_URI . '/external/SumoSelect/sumoselect.css', '', null );
	// wp_enqueue_style( 'caleader-style-6', CALEADER_CSS_URL . '/style-6.css', '', null );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$header_bread_image = caleader_options( 'breadcrumb_image' );

	if ( ! empty( $header_bread_image ) ) {
		$header_image_url = wp_get_attachment_url( $header_bread_image );
		$text             = '.tt-subpages-wrapper {
			background-image:url(' . esc_url( $header_bread_image ) . ');
	   }';
		wp_add_inline_style( 'caleader-style', $text );

	}

	$footer_back_image = caleader_footer( 'footer_back_image' );
	if ( isset( $footer_back_image ) || $footer_back_image != '' ) {
		$text = '.foot_back_image {
			background-image:url(' . esc_url( $footer_back_image ) . ');
	   	}';

		wp_add_inline_style( 'caleader-style', $text );
	}

}


function caleader_admin_style() {
	wp_enqueue_style( 'caleader-assets-admin', get_template_directory_uri() . '/assets/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'caleader_admin_style' );


if ( ! function_exists( 'caleader_product_remove_from_mini_cart' ) ) {

	function caleader_product_remove_from_mini_cart() {
		$cart         = WC()->instance()->cart;
		$id           = $_POST['product_id'];
		$cart_id      = $cart->generate_cart_id( $id );
		$cart_item_id = $cart->find_product_in_cart( $cart_id );
		$array        = array();

		if ( isset( $_POST['product_id'] ) && $_POST['product_id'] == '' ) {
			$cart_item_id = $cart->find_product_in_cart( $_POST['cart_item_key'] );
		} else {
			$cart_id      = $cart->generate_cart_id( $id );
			$cart_item_id = $cart->find_product_in_cart( $cart_id );
		}
		if ( $cart_item_id ) {
			$cart->set_quantity( $cart_item_id, 0 );
			WC_AJAX::get_refreshed_fragments();

		} else {
			$array['error'] = true;
			echo json_encode( $array );
		}
		wp_die();
	}
}

add_action( 'wp_ajax_product_remove_from_mini_cart', 'caleader_product_remove_from_mini_cart' );
add_action( 'wp_ajax_nopriv_product_remove_from_mini_cart', 'caleader_product_remove_from_mini_cart' );


if ( ! function_exists( 'caleader_car_data_by_price' ) ) {

	function caleader_car_data_by_price() {
		$price_min        = $_POST['price_min'];
		$price_max        = $_POST['price_max'];
		$price_arr['min'] = $price_min;
		$price_arr['max'] = $price_max;
		echo json_encode( $price_arr );
		wp_die();
	}
}

add_action( 'wp_ajax_car_data_by_price', 'caleader_car_data_by_price' );
add_action( 'wp_ajax_nopriv_car_data_by_price', 'caleader_car_data_by_price' );


// caleader_comments
function caleader_comments( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
<<?php echo esc_html( $tag ); ?>
    <?php comment_class( empty( $args['has_children'] ) ? 'tt-comments-level-1' : 'parent tt-comments-level-1' ); ?>
    id="comment-<?php comment_ID(); ?>">
    <?php if ( $comment->comment_type != 'trackback' && $comment->comment_type != 'pingback' ) { ?>
    <div class="tt-avatar-area">
        <div class="tt-avatar">
            <?php print get_avatar( $comment, 70, null, null, array( 'class' => array() ) ); ?>
        </div>
        <?php } ?>
        <div class="tt-content">
            <div class="tt-comments-title">
                <span class="username"><?php esc_html_e( 'Admin', 'caleader' ); ?>,</span> <span
                    class="time"><?php comment_time( get_option( 'date_format' ) ); ?></span>
            </div>
            <?php comment_text(); ?>
            <?php
			comment_reply_link(
				array_merge(
					$args,
					array(
						'reply_text' => esc_html__( 'reply ', 'caleader' ),
						'depth'      => $depth,
						'max_depth'  => $args['max_depth'],
					)
				)
			);
			?>
        </div>
        <?php if ( $comment->comment_type != 'trackback' && $comment->comment_type != 'pingback' ) { ?>
    </div>
    <?php } ?>
    <?php
}


if ( ! function_exists( 'caleader_comment_nav' ) ) {
	function caleader_comment_nav() {
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'caleader' ); ?></h2>
			<div class="nav-links">
				<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'caleader' ) ) ) :
					sprintf( __( '<div class="nav-previous">%s</div>', 'caleader' ), $prev_link );
				endif;
				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'caleader' ) ) ) :
					sprintf( __( '<div class="nav-next">%s</div>', 'caleader' ), $prev_link );
				endif;
				?>
			</div>
		</nav>
    <?php
		endif;
	}
}

add_filter( 'nav_menu_css_class', 'caleader_nav_class', 10, 2 );

if ( ! function_exists( 'caleader_nav_class' ) ) {

	function caleader_nav_class( $classes, $item ) {
		if ( in_array( 'current-menu-item', $classes ) ) {
			$classes[] = 'is-active ';
		}
		return $classes;
	}
}


function caleader_body_classes( $classes ) {
	$menu_deafult = caleader_options( 'menu_deafult' );
	if ( $menu_deafult == 0 ) :
		$classes[] = 'caleader-base';
	else :
		$classes[] = '';
	endif;
	return $classes;
}

add_filter( 'body_class', 'caleader_body_classes' );



add_action( 'widgets_init', 'caleader_widgets_init' );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( ! function_exists( 'caleader_widgets_init' ) ) {

	function caleader_widgets_init() {

		register_sidebar(
			array(
				'name'          => esc_html__( 'Blog Sidebar', 'caleader' ),
				'id'            => 'blog_sideber',
				'description'   => esc_html__( 'Blog sidebar area', 'caleader' ),
				'before_widget' => '<div class="%2$s widget tt-block02-aside" id="%1$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="tt-block02-title">',
				'after_title'   => '</h4>',
			)
		);

		$check_function = false;

		if ( has_action( 'caleader_listings_check_option' ) ) {
			do_action_ref_array( 'caleader_listings_check_option', array( &$check_function ) );

		}

		if ( $check_function ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Caleader Listings', 'caleader' ),
					'id'            => 'caleader_list_widget',
					'description'   => esc_html__( 'Widgets in this area will be shown on all listings pages.', 'caleader' ),
					'before_widget' => '<div class="tt-wrapper-aside"><div class="tt-aside-box">',
					'after_widget'  => '</div></div>',
					'before_title'  => '<h3 class="tt-aside-title">',
					'after_title'   => '</h3>',
				)
			);
			register_sidebar(
				array(
					'name'          => esc_html__( 'Listing Details Sidebar', 'caleader' ),
					'id'            => 'caleader_listing_details',
					'description'   => esc_html__( 'Widget to Listing Details', 'caleader' ),
					'before_widget' => '',
					'after_widget'  => '',
					'before_title'  => '',
					'after_title'   => '',
				)
			);

		}

		$check_class = false;

		if ( has_action( 'caleader_core_check_class' ) ) {
			do_action_ref_array( 'caleader_core_check_class', array( &$check_class ) );

		}

		if ( $check_class ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Service Page Sidebar', 'caleader' ),
					'id'            => 'service_page_sideber',
					'description'   => esc_html__( 'Sidebar for service page', 'caleader' ),
					'before_widget' => '',
					'after_widget'  => '',
					'before_title'  => '',
					'after_title'   => '',
				)
			);
		}

		if ( class_exists( 'woocommerce' ) ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Woo Shop Sidebar', 'caleader' ),
					'id'            => 'woo_shop_sideber',
					'description'   => esc_html__( 'Shop sidebar area', 'caleader' ),
					'before_widget' => '<div class="%2$s tt-aside-box widget" id="%1$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h3 class="tt-aside-title">',
					'after_title'   => '</h3>',
				)
			);
		}
		$footer_bottom_widget = caleader_footer( 'footer_bottom_widget' );
		if ( $footer_bottom_widget == '1' ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Footer Sidebar One', 'caleader' ),
					'id'            => 'footer_sideber_1',
					'description'   => esc_html__( 'Footer Sidebar One', 'caleader' ),
					'before_widget' => '<div class="%2$s side-block widget" id="%1$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4 class="title-aside">',
					'after_title'   => '</h4>',
				)
			);
		}

		$toplang = caleader_options( 'language_widget' );

		if ( class_exists( 'Kirki' ) && $toplang ) {

			register_sidebar(
				array(
					'name'          => esc_html__( 'Top Language Sidebar', 'caleader' ),
					'id'            => 'top_lang_sidebar',
					'description'   => esc_html__( 'Top Language Sidebar', 'caleader' ),
					'before_widget' => '',
					'after_widget'  => '',
					'before_title'  => '',
					'after_title'   => '',
				)
			);
		}

		$layout = caleader_footer( 'footer_style' );

		if ( $layout == 'layout2' ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Moto Footer Logo', 'caleader' ),
					'id'            => 'moto_footer_logo',
					'description'   => esc_html__( 'Moto Footer Logo', 'caleader' ),
					'before_widget' => '<div class="%2$s side-block widget tt-logo-description" id="%1$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4 class="title-aside">',
					'after_title'   => '</h4>',
				)
			);

		}

	}
}


add_filter( 'loop_shop_columns', 'caleader_loop_columns' );

if ( ! function_exists( 'caleader_loop_columns' ) ) {

	function caleader_loop_columns() {
		if ( is_product() ) {
			return 4;
		} else {
			return 3;
		}
	}
}

function caleader_add_to_cart_fragment( $fragments ) {
	ob_start();
	$count = WC()->cart->cart_contents_count;
	?>
    <div class="cart-count-wrap">
        <a class="btn-toggle tt-dropdown-toggle is-popup cart-count"
            href="<?php echo esc_js( 'javascript:void(0)' ); ?>"
            title="<?php esc_attr_e( 'View your shopping cart', 'caleader' ); ?>">
            <?php if ( $count > 0 ) { ?>
            <i class="icon-cart"></i>
            <span class="badge cart-contents-count"><?php echo esc_html( $count ); ?></span>
            <?php } else { ?>
            <i class="icon-cart"></i>
            <?php } ?>
        </a>
    </div>
    <?php
	$fragments['.cart-count-wrap'] = ob_get_clean();
	$output                        = ob_get_clean();
	return $fragments;
}


add_filter( 'woocommerce_add_to_cart_fragments', 'caleader_add_to_cart_fragment' );

function caleader_add_to_cart_fragment_details( $fragments ) {
	ob_start();
	?>
    <div class="tt-dropdown-menu mini-cart-head">
        <h6 class="tt-dropdown-title">
            <a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" class="tt-btn-close icon-close"></a>
            <?php echo esc_html__( 'Products in Cart', 'caleader' ); ?>
        </h6>
        <?php get_template_part( 'woocommerce/cart/mini', 'cart' ); ?>
    </div>
    <?php
	$fragments['div.mini-cart-head'] = ob_get_clean();
	$output                          = ob_get_clean();
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'caleader_add_to_cart_fragment_details' );



if ( ! function_exists( 'caleader_loop_shop_per_page' ) ) {

	function caleader_loop_shop_per_page( $cols ) {
		$cols = 9;
		return $cols;
	}
}

add_filter( 'loop_shop_per_page', 'caleader_loop_shop_per_page', 20 );


if ( ! function_exists( 'caleader_woo_remove_wc_breadcrumbs' ) ) {

	function caleader_woo_remove_wc_breadcrumbs() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
}

add_action( 'init', 'caleader_woo_remove_wc_breadcrumbs' );



if ( ! function_exists( 'caleader_related_products_args' ) ) {

	function caleader_related_products_args( $args ) {
		$args['posts_per_page'] = 6;
		$args['columns']        = 4;
		return $args;
	}
}
add_filter( 'woocommerce_output_related_products_args', 'caleader_related_products_args' );



if ( ! function_exists( 'caleader_product_class' ) ) {

	function caleader_product_class( $classname, $product_type, $post_type, $product_id ) {

		$caleader_listing_post_type = '';

		if ( has_action( 'caleader_listings_get_post_type' ) ) {
			do_action_ref_array( 'caleader_listings_get_post_type', array( &$caleader_listing_post_type ) );

		}

		if ( $caleader_listing_post_type == get_post_type( $product_id ) ) {
			$classname = 'caleader_WC_Product_Device';
		}
		return $classname;
	}
}

add_filter( 'woocommerce_product_class', 'caleader_product_class', 10, 4 );

require_once CALEADER_FREAMWORK_DIRECTORY . '/priceclass.php';

add_filter( 'woocommerce_add_cart_item', 'caleader_add_cart_item', 10, 2 );

if ( ! function_exists( 'caleader_add_cart_item' ) ) {

	function caleader_add_cart_item( $cart_item, $cart_id ) {
		$post_type                  = get_post_type( $cart_item['data']->get_id() );
		$caleader_listing_post_type = '';

		if ( has_action( 'caleader_listings_get_post_type' ) ) {
			do_action_ref_array( 'caleader_listings_get_post_type', array( &$caleader_listing_post_type ) );

		}
		if ( in_array( $post_type, array( $caleader_listing_post_type ) ) ) {
			$cart_item['data']->set_props(
				array(
					'product_id'     => $cart_item['product_id'],
					'check_in_date'  => $cart_item['check_in_date'],
					'check_out_date' => $cart_item['check_out_date'],
					'woo_cart_id'    => $cart_id,
				)
			);
		}
		return $cart_item;
	}
}



add_action( 'wp_ajax_product_add_to_cart', 'caleader_product_add_to_cart' );
add_action( 'wp_ajax_nopriv_product_add_to_cart', 'caleader_product_add_to_cart' );

if ( ! function_exists( 'caleader_product_add_to_cart' ) ) {

	function caleader_product_add_to_cart() {
		global $woocommerce;
		if ( ! $woocommerce || ! $woocommerce->cart ) {
			return $_POST['product_id'];
		}
		WC()->session->set( 'custom_price' . $_POST['product_id'], ( $_POST['price'] ) );
		$cart_items     = $woocommerce->cart->get_cart();
		$woo_cart_param = array(
			'product_id'     => sanitize_text_field( $_POST['product_id'] ),
			'check_in_date'  => '',
			'check_out_date' => '',
			'quantity'       => sanitize_text_field( $_POST['quantity'] ),
			'service_list'   => sanitize_text_field( trim( $_POST['service'], ',' ) ),
		);
		$woo_cart_id    = $woocommerce->cart->generate_cart_id( $woo_cart_param['product_id'], null, array(), $woo_cart_param );
		if ( array_key_exists( $woo_cart_id, $cart_items ) ) {
			$woocommerce->cart->set_quantity( $woo_cart_id, $_POST['quantity'] );
		} else {
			$woocommerce->cart->add_to_cart( $woo_cart_param['product_id'], $woo_cart_param['quantity'], null, array(), $woo_cart_param );
		}

		$woocommerce->cart->calculate_totals();
		// Save cart to session
		$woocommerce->cart->set_session();
		// Maybe set cart cookies
		$woocommerce->cart->maybe_set_cart_cookies();
		echo esc_html( 'success' );
		wp_die();
	}
}

add_action( 'woocommerce_add_order_item_meta', 'caleader_add_product_custom_field_to_order_item_meta', 9, 3 );

if ( ! function_exists( 'caleader_add_product_custom_field_to_order_item_meta' ) ) {

	function caleader_add_product_custom_field_to_order_item_meta( $item_id, $item_values, $item_key ) {
		if ( ! empty( $item_values['service_list'] ) ) {
			wc_update_order_item_meta( $item_id, 'ServiceList', sanitize_text_field( $item_values['service_list'] ) );
		}
	}
}

if ( ! function_exists( 'caleader_register_my_session' ) ) {

	function caleader_register_my_session() {
		if ( ! session_id() ) {
			session_start();
		}
	}
}

add_action( 'init', 'caleader_register_my_session' );

if ( ! function_exists( 'caleader_breadcrumb_custom' ) ) {

	function caleader_breadcrumb_custom() {
		$title_section = caleader_options( 'title_section' );
		$breadcrumbs   = caleader_options( 'breadcrumbs' );

		if ( ! isset( $title_section ) ) {
			$title_section = true;
		}

		if ( $title_section ) {
			?>
    <div class="tt-subpages-wrapper">
        <?php if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) { ?>
        <h1 class="tt-title"><?php woocommerce_page_title(); ?></h1>
        <?php } elseif ( is_post_type_archive() ) { ?>
        <h1 class="tt-title"><?php post_type_archive_title(); ?></h1>
        <?php } else { ?>
        <h1 class="tt-title">
            <?php
				if ( is_404() ) {
					echo esc_html__( 'Error Page', 'caleader' );
				} elseif ( is_search() ) {
					if ( have_posts() ) {
						printf( __( 'Search Results for: %s', 'caleader' ), '<span>' . get_search_query() . '</span>' );
					} else {
						echo esc_html__( 'Nothing Found', 'caleader' );
					}
				} else {
					the_title();
				}
				?>
        </h1>
        <?php } ?>
        <?php if ( $breadcrumbs ) { ?>
        <div class="tt-breadcrumb">
            <ul>
                <?php
				if ( function_exists( 'bcn_display' ) ) {
					bcn_display();
				}
				?>
            </ul>
        </div>
        <?php } ?>
    </div>
    <?php
		}

	}
}


function caleader_add_default_google_font() {
	wp_enqueue_style( 'caleader-default-google-fonts', caleader_default_google_font(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'caleader_add_default_google_font' );

function caleader_default_google_font() {
	$protocol   = is_ssl() ? 'https:' : 'http:';
	$query_args = array(
		'family' => 'Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i%7CRoboto:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i%7CMontserrat:400,400i,500,500i,600,600i%7COpen Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i',
	);
	$font_url   = add_query_arg( $query_args, $protocol . '//fonts.googleapis.com/css' );
	return esc_url_raw( $font_url );
}


add_action( 'wp_enqueue_scripts', 'caleader_map_enqueue_func' );

function caleader_map_enqueue_func() {
	$footer_map_type = caleader_options( 'footer_map_type' );
	if ( $footer_map_type == 'map' ) {
		wp_enqueue_script( 'caleader-googleapis', caleader_map_enqueue(), array( 'jquery' ), '', true );
	}
}

function caleader_map_enqueue() {
	$google_api = caleader_options( 'google_api' );
	$protocol   = is_ssl() ? 'https:' : 'http:';
	$query_args = array(
		'sensor' => 'false',
	);
	$map_url    = add_query_arg( $query_args, $protocol . '//maps.googleapis.com/maps/api/js?key=' . $google_api );
	return esc_url_raw( $map_url );
}


if ( ! function_exists( 'caleader_post_class' ) ) {

	function caleader_post_class( $classes ) {
		$classes[] = 'tt-post';
		return $classes;
	}
}
add_filter( 'post_class', 'caleader_post_class' );


/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param  string $string
 * @return string
 */
function caleader_kses_basic( $string = '' ) {
	return wp_kses( $string, caleader_get_allowed_html_tags( 'basic' ) );
}


/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param  string $string
 * @return string
 */
function caleader_kses_intermediate( $string = '' ) {
	return wp_kses( $string, caleader_get_allowed_html_tags( 'intermediate' ) );
}

function caleader_get_allowed_html_tags( $level = 'basic' ) {
	$allowed_html = array(
		'b'      => array(),
		'i'      => array(),
		'u'      => array(),
		'em'     => array(),
		'br'     => array(),
		'del'    => array(),
		'abbr'   => array(
			'title' => array(),
		),
		'span'   => array(
			'class' => array(),
		),
		'div'    => array(
			'class' => array(),
		),
		'strong' => array(),
	);

	if ( $level === 'intermediate' ) {
		$allowed_html['a'] = array(
			'href'  => array(),
			'title' => array(),
			'class' => array(),
			'id'    => array(),
		);
	}

	return $allowed_html;
}



function caleader_kses_allowed_html( $tags, $context ) {
	switch ( $context ) {
		case 'social':
			$tags = array(
				'a'      => array( 'href' => array() ),
				'p'      => array(),
				'em'     => array(),
				'strong' => array(),
			);
			return $tags;
		case 'author_avatar':
			$tags = array(
				'img' => array(
					'class'  => array(),
					'height' => array(),
					'width'  => array(),
					'src'    => array(),
					'alt'    => array(),
				),
			);
			return $tags;
		default:
			return $tags;
	}
}

add_filter( 'wp_kses_allowed_html', 'caleader_kses_allowed_html', 10, 2 );

function caleader_quantity_input_max_callback( $max, $product ) {
	$max = 1000;
	return $max;
}
add_filter( 'woocommerce_quantity_input_max', 'caleader_quantity_input_max_callback', 10, 2 );

function caleader_get_elementor_saved_templates() {
	$template_lists = get_posts(
		array(
			'post_type'      => 'elementor_library',
			'posts_per_page' => -1,
		)
	);
	$templates      = array();
	if ( ! empty( $template_lists ) ) {
		foreach ( $template_lists as $template_list ) {
			$templates[ $template_list->ID ] = $template_list->post_title;
		}
	}
	return $templates;
}


function get_post_type_lists() {

	$args = array(
		'public' => true,
	);

	$output = 'names';

	$post_types = get_post_types( $args, $output );

	$post_types_arr = array();
	foreach ( $post_types as $key => $value ) {
		$value                  = str_replace( '-', ' ', $value );
		$value                  = str_replace( '_', ' ', $value );
		$value                  = ucwords( $value );
		$post_types_arr[ $key ] = $value;
	}

	return $post_types_arr;
}


do_action( 'caleader_theme_init' );