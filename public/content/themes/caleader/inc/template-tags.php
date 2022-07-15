<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package caleader
 */

if ( ! function_exists( 'caleader_posted_author' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function caleader_posted_author() {
		$byline = sprintf(
			'<span class="tt-icon icon-user1"></span>' . esc_html__( 'Written by ', 'caleader' ) . '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		echo '   ' . $byline . '';

	}
}

if ( ! function_exists( 'caleader_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function caleader_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html( '%s' ),
			'<div class="tt-time">' . $time_string . '</div>'
		);

		echo caleader_kses_basic( $posted_on ); // WPCS: XSS OK.

	}
}

if ( ! function_exists( 'caleader_footer_logo' ) ) {
	function caleader_footer_logo() {
		$footer_logo = caleader_options( 'footer_logo' );
		if ( $footer_logo != '' ) {
			?>
			<a class='tt-logo' href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php echo esc_attr__( 'image', 'caleader' ); ?> "></a>
			<?php
		} else {
			if ( has_custom_logo() ) {
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
				?>
				<a class='tt-logo' href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo esc_attr__( 'image', 'caleader' ); ?> "></a>
				<?php
			} else {
				?>
			<a class='tt-logo' href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class='tt-logo-dark svg-img' src="<?php echo CALEADER_IMG_URL . 'logo.svg'; ?>" alt="<?php echo esc_attr__( 'image', 'caleader' ); ?> "></a>
				<?php
			}
		}
	}
}
if ( ! function_exists( 'caleader_footer_menu' ) ) {
	function caleader_footer_menu( $layout = null ) {
		?>
		<?php if ( has_nav_menu( 'footer-menu' ) ) { ?>
		<nav>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer-menu',
					'menu_class'     => 'nav navbar-nav',
					'container'      => 'ul',
				)
			);
			?>
		</nav>
		<?php } ?>
		<?php
	}
}
if ( ! function_exists( 'caleader_primary_menu' ) ) {
	function caleader_primary_menu( $layout = null ) {
		?>
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_class'     => 'nav navbar-nav',
					'container'      => 'ul',
					'walker'         => new Walker_Caleader_Menu(), // use our custom walker
				)
			);

		} else {
			wp_nav_menu(
				array(
					'menu_class' => 'nav navbar-nav',
					'container'  => 'ul',
					'walker'     => new Walker_Caleader_Menu(), // use our custom walker
				)
			);
		}
	}
}

if ( ! function_exists( 'caleader_top_header_class' ) ) {

	function caleader_top_header_class() {
		$top_header_class = '';
		if ( is_front_page() && ! is_home() && ( $header_transparent == '1' ) ) {
			$top_header_class = 'tt-on-top';
		}
		return $top_header_class;
	}
}
if ( ! function_exists( 'caleader_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function caleader_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', ' ' );
			if ( $tags_list ) {
				printf( '<span class="tagcloud">' . esc_html__( '%1$s', 'caleader' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'caleader' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}

	}
endif;
