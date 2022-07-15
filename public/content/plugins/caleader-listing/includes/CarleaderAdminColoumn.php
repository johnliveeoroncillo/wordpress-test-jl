<?php 
class CarleaderAdminColumns {
	public $filter_fields = [
		'status'    => 'statuses',
		'seller'    => 'sellers',
		'condition' => 'conditions',
	];
	public function __construct() {
		add_filter( 'manage_carleader-listing_posts_columns', [ $this, 'columns' ] );
		add_action( 'manage_carleader-listing_posts_custom_column', [ $this, 'show' ], 10, 2 );
		// sorting
		add_filter( 'manage_edit-carleader-listing_sortable_columns', [ $this, 'sortable_columns' ] );
		add_filter( 'request', [ $this, 'orderby_status' ] );
		add_filter( 'request', [ $this, 'orderby_seller' ] );
		add_filter( 'request', [ $this, 'orderby_price' ] );
		// filtering
		add_action( 'restrict_manage_posts', [ $this, 'output_filters' ] );
		add_action( 'parse_query', [ $this, 'filter' ] );
	}
	public function columns( $columns ) {
		$columns['vehicle']   = esc_html__( 'Vehicle', 'caleader-listing' );
		$columns['price']     = esc_html__( 'Price', 'caleader-listing' );
		$columns['condition'] = esc_html__( 'Condition', 'caleader-listing' );
		$columns['address']   = esc_html__( 'Address', 'caleader-listing' );
		$columns['enquiries'] = esc_html__( 'Enquiries', 'caleader-listing' );
		return $columns;
	}
	public function show( $column_name, $post_id ) {
		
		if ( $column_name == 'condition' ) {
			$condition = carleader_listings_meta( 'condition', $post_id );
			if ( ! $condition ) {
				return;
			}
			echo esc_html( $condition );
		}
		if ( $column_name == 'vehicle' ) {
			echo carleader_listings_title() . '<br>';
			if ( has_term( '', 'body-type' ) ) {
				?>
				<i class="carleader-icon-trunk"></i> <?= get_the_term_list( get_the_ID(), 'body-type', '', ', ' ); ?>
				<?php
			}
			if ( has_term( '', 'make-brand' ) ) {
				?>
				<i class="carleader-icon-trunk"></i> <?= get_the_term_list( get_the_ID(), 'make-brand', '', ', ' ); ?>
				<?php
			}
		}
		if ( $column_name == 'price' ) {
			$price = carleader_listings_meta( 'price', $post_id );
			echo carleader_listings_price( $price );
		}
		if ( $column_name == 'address' ) {
			$address = carleader_listings_meta( 'displayed_address', $post_id );
			if ( ! $address ) {
				return;
			}
			echo esc_html( $address );
		}
		if ( $column_name == 'enquiries' ) {
			$enquiries = carleader_listings_meta( 'enquiries', $post_id );
			$count     = ! empty( $enquiries ) ? count( $enquiries ) : 0;
			if ( $count > 0 ) {
				echo '<a href="' . esc_url( admin_url( 'edit.php?post_type=contact-posting' ) ) . '"><span>' . esc_html( $count ) . '</a></span>';
			} else {
				echo '—';
			}
		}
	}
	public function sortable_columns( $columns ) {
		$columns['status']    = 'status';
		$columns['condition'] = 'condition';
		$columns['seller']    = 'seller';
		$columns['price']     = 'price';
		return $columns;
	}
	public function orderby_status( $vars ) {
		if ( isset( $vars['orderby'] ) && 'status' == $vars['orderby'] ) {
			$vars = array_merge( $vars, [
				'meta_key' => '_carleader_listing_status',
				'orderby'  => 'meta_value',
			] );
		}
		return $vars;
	}
	public function orderby_condition( $vars ) {
		if ( isset( $vars['orderby'] ) && 'condition' == $vars['orderby'] ) {
			$vars = array_merge( $vars, [
				'meta_key' => '_carleader_listing_condition',
				'orderby'  => 'meta_value',
			] );
		}
		return $vars;
	}
	public function orderby_seller( $vars ) {
		if ( isset( $vars['orderby'] ) && 'seller' == $vars['orderby'] ) {
			$vars = array_merge( $vars, [
				'meta_key' => '_carleader_listing_seller',
				'orderby'  => 'meta_value',
			] );
		}
		return $vars;
	}
	public function orderby_price( $vars ) {
		if ( isset( $vars['orderby'] ) && 'price' == $vars['orderby'] ) {
			$vars = array_merge( $vars, [
				'meta_key' => '_carleader_listing_price',
				'orderby'  => 'meta_value',
			] );
		}
		return $vars;
	}
	public function output_filters() {
		global $pagenow;
		$type = get_post_type() ? get_post_type() : 'carleader-listing';
		if ( isset( $_GET['post_type'] ) ) {
			$type = sanitize_text_field( $_GET['post_type'] );
		}
		if ( 'carleader-listing' !== $type || ! is_admin() || $pagenow !== 'edit.php' ) {
			return;
		}
		$fields = $this->build_fields();
		if ( ! $fields ) {
			return;
		}
		foreach ( $fields as $field => $values ) {
			asort( $values ); // sort our values
			$values = array_unique( $values ); // make them unique
			$values = array_filter( $values ); // remove empties
			$selected = isset( $_GET[ $field ] ) ? $_GET[ $field ] : '';
			?>
			<select name='<?= esc_attr( $field ); ?>' id='<?= esc_attr( $field ); ?>' class='postform'>
				<option value=''><?php printf( esc_html__( 'All %s', 'caeleader-listings' ), $field ) ?></option>
				<?php foreach ( $values as $val => $text ) : ?>
					<?php $text = $field == 'sellers' ? get_the_author_meta( 'display_name', $val ) : $text; ?>
					<option value="<?= esc_attr( $val ) ?>" <?php selected( $selected, $val ); ?>><?= esc_html( $text ) ?></option>
		<?php endforeach; ?>
			</select>
			<?php
			reset( $values );
		}
	}
	/**
	 * Build the dropdown field values for the filtering
	 *
	 */
	private function build_fields() {
		$fields = '';
		// The Query args
		$args = [
			'post_type'      => 'carleader-listing',
			'posts_per_page' => '-1',
			'post_status'    => 'publish',
		];
		$query = query_posts( $args );
		if ( $query ) {
			$fields = [];
			foreach ( $query as $listing ) {
				foreach ( $this->filter_fields as $field => $text ) {
					$val                     = carleader_listings_meta( $field, $listing->ID );
					$fields[ $text ][ $val ] = $val;
				}
			}
		}
		wp_reset_query();
		return $fields;
	}
	public function filter( $query ) {
		global $pagenow;
		$type = get_post_type() ? get_post_type() : 'carleader-listing';
		if ( isset( $_GET['post_type'] ) ) {
			$type = sanitize_text_field( $_GET['post_type'] );
		}
		if ( 'carleader-listing' !== $type || ! is_admin() || $pagenow !== 'edit.php' ) {
			return;
		}
		foreach ( $this->filter_fields as $field => $text ) {
			if ( isset( $_GET[ $text ] ) && $_GET[ $text ] != '' ) {
				$query->query_vars['meta_key']   = '_carleader_listing_' . $field;
				$query->query_vars['meta_value'] = sanitize_text_field( $_GET[ $text ] );
			}
		}
	}
}
new CarleaderAdminColumns();