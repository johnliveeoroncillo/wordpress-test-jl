<?php
// don't call the file directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
add_action(
	'elementor/init',
	function() {
			\Elementor\Plugin::$instance->elements_manager->add_category(
				'car-leader',
				[
					'title' => esc_html__( 'Car Leader', 'car-leader' ),
					'icon'  => 'fa fa-plug',
				],
				1
			);
	}
);
function get_all_post() {
	$options           = array();
	$post_types        = get_post_types();
	$post_type_not__in = array( 'attachment', 'revision', 'nav_menu_item', 'custom_css', 'customize_changeset', 'elementor_library' );
	foreach ( $post_type_not__in as $post_type_not ) {
		unset( $post_types[ $post_type_not ] );
	}
	$post_type = array_values( $post_types );
	$all_posts = get_posts(
		array(
			'post_type' => $post_type,
		)
	);
	if ( ! empty( $all_posts ) && ! is_wp_error( $all_posts ) ) {
		foreach ( $all_posts as $post ) {
			$this->options[ $post->ID ] = strlen( $post->post_title ) > 20 ? substr( $post->post_title, 0, 20 ) . '...' : $post->post_title;
		}
	}
	return $this->options;
}
function getContactFormId() {
	$contact_forms = array();
	$cf7           = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
	if ( $cf7 ) {
		foreach ( $cf7 as $cform ) {
			$contact_forms[ $cform->ID ] = $cform->post_title;
		}
	} else {
		$contact_forms[ esc_html__( 'No contact forms found', 'carleader' ) ] = 0;
	}
	return $contact_forms;
}
if ( ! function_exists( 'get_contact_form_7_posts' ) ) :
	function get_contact_form_7_posts() {
		$args    = array(
			'post_type'      => 'wpcf7_contact_form',
			'posts_per_page' => -1,
		);
		$catlist = [];
		if ( $categories = get_posts( $args ) ) {
			foreach ( $categories as $category ) {
				(int) $catlist[ $category->ID ] = $category->post_title;
			}
		} else {
			(int) $catlist['0'] = esc_html__( 'No contect From 7 form found', 'void' );
		}
		return $catlist;
	}
endif;
if ( ! function_exists( 'get_all_pages' ) ) :
	function get_all_pages() {
		$args    = array(
			'post_type'      => 'page',
			'posts_per_page' => -1,
		);
		$catlist = [];
		if ( $categories = get_posts( $args ) ) {
			foreach ( $categories as $category ) {
				(int) $catlist[ $category->ID ] = $category->post_title;
			}
		} else {
			(int) $catlist['0'] = esc_html__( 'No Pages Found!', 'void' );
		}
		return $catlist;
	}
endif;
add_action(
	'elementor/init',
	function() {
		\Elementor\Plugin::$instance->elements_manager->add_category(
			'CarLeader',
			[
				'title' => esc_html__( 'CarLeader', 'caleader-core' ),
				'icon'  => 'fa fa-plug',
			],
			1
		);
	}
);
function carleader_modify_controls( $controls_registry ) {
	// Get existing icons
	$icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );
	// Append new icons
	$new_icons = array_merge(
		array(
			'icon-f-48' => 'ion 1',
			'icon-f-35' => 'ion 2',
			'icon-e-09' => 'ion 3',
			'icon-e-28' => 'ion 4',
		),
		$icons
	);
	// Then we set a new list of icons as the options of the icon control
	$controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );
}
add_action( 'elementor/controls/controls_registered', 'carleader_modify_controls', 10, 1 );

add_action( 'wp_ajax_load_reviews_by_ajax', 'load_reviews_by_ajax' );
add_action( 'wp_ajax_nopriv_load_reviews_by_ajax', 'load_reviews_by_ajax' );

function load_reviews_by_ajax() {
	check_ajax_referer( 'load_more_posts', 'security' );
	$paged                = $_POST['page'];
	$review_post_per_page = $_POST['review_post_per_page'];
	$args                 = array(
		'post_type'      => 'carleader_review',
		'post_status'    => 'publish',
		'posts_per_page' => $review_post_per_page,
		'paged'          => $paged,
	);
	$review_posts         = new WP_Query( $args );
	if ( $review_posts->have_posts() ) :
		?>
		<?php
		while ( $review_posts->have_posts() ) :
			$review_posts->the_post();
			$post_id = get_the_ID();
			$rating  = get_post_meta( $post_id, 'carleader_review_review_rating', true );
			echo review_posts_ajax_content( $post_id, $rating );
			?>
		<?php endwhile; ?>
		<?php
	endif;

	wp_die();
}

function review_posts_ajax_content( $post_id, $rating ) {
	?>
	<div class="element-item">
		<a href="<?php the_permalink(); ?>" class="tt-item">
			<div class="tt-item-img">
			<?php if ( has_post_thumbnail( $post_id ) ) { ?>
						<?php echo get_the_post_thumbnail( $post_id, array( 290, 205 ) ); ?>
			<?php } ?>
			</div>
			<div class="tt-item-content">
				<div class="tt-title">
					<span><?php echo get_post_meta( $post_id, 'carleader_review_review_name', true ); ?></span>
					<?php echo get_post_meta( $post_id, 'carleader_review_review_car', true ); ?>
				</div>
				<div class="tt-rating">
						<?php
						for ( $i = 1;$i <= 5;$i++ ) {
							if ( $i <= $rating ) {
								echo '<i class="icon-118669"></i>';
							}
						}
						?>
					</div>
				<p>
				<?php echo the_content(); ?>
				</p>
			</div>
		</a>
	</div>

	<?php
}

add_action( 'caleader_sevice_is_singular', 'caleader_sevice_issingular', 10, 6 );

function caleader_sevice_issingular( &$issingular ) {
	if ( is_singular( 'carleader_services' ) ) {

		$issingular = true;
	} else {
		$issingular = false;
	}
}

add_action( 'caleader_core_check_class', 'caleader_core_checkclass', 10, 6 );

function caleader_core_checkclass( &$checkclass ) {
	if ( class_exists( 'CarLeader_Elementor' ) ) {

		$checkclass = true;
	} else {
		$checkclass = false;
	}
}