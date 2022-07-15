<?php
/**
 * Adds MiniContact widget
 */
class Minicontact_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress
	 */
	function __construct() {
		parent::__construct(
			'minicontact_widget', // Base ID
			esc_html__( 'MiniContact', 'caleader-core' ) // Name
		);
	}
	/**
	 * Widget Fields
	 */
	private $widget_fields = array(
		array(
			'label'   => 'Adsress Title',
			'id'      => 'adrs_title',
			'default' => 'Address',
			'type'    => 'text',
		),
		array(
			'label'   => 'Address',
			'id'      => 'addrs',
			'default' => '3261 Anmoore Road,
			Brooklyn, NY 11230',
			'type'    => 'text',
		),
		array(
			'label'   => 'Phone Title',
			'id'      => 'phone_ttl',
			'default' => 'Phone',
			'type'    => 'text',
		),
		array(
			'label'   => 'Phone',
			'id'      => 'phone',
			'default' => '+01 123 456 78',
			'type'    => 'text',
		),
		array(
			'label'   => 'Time Title',
			'id'      => 'time_ttl',
			'default' => 'Working Time',
			'type'    => 'text',
		),
		array(
			'label'   => 'Time',
			'id'      => 'time',
			'default' => 'Mon-Sat: 8:00am - 5:00pm
			Sunday is closed',
			'type'    => 'text',
		),
	);
	/**
	 * Front-end display of widget
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		?>
		<div class="tt-block-aside">
			<div class="tt-aside-content">
				<div class="box-aside-info">
					<h3 class="tt-title"><?php echo $instance['title']; ?></h3>
					<ul>
						<li>
							<i class="icon-149984"></i>
							<strong><?php echo $instance['adrs_title']; ?>:</strong>
							<?php echo wp_specialchars_decode( $instance['addrs'] ); ?>
						</li>
						<li>
							<i class="icon-15874"></i>
							<strong><?php echo $instance['phone_ttl']; ?>:</strong>
							<?php echo $instance['phone']; ?>
						</li>
						<li>
							<i class="icon-icon"></i>
							<strong><?php echo $instance['time_ttl']; ?>:</strong>
							<?php echo wp_specialchars_decode( $instance['time'] ); ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<?php

		echo $args['after_widget'];
	}
	/**
	 * Back-end widget fields
	 */
	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$widget_value = ! empty( $instance[ $widget_field['id'] ] ) ? $instance[ $widget_field['id'] ] : esc_html( $widget_field['default']);
			switch ( $widget_field['type'] ) {
				default:
					$output .= '<p>';
					$output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_attr( $widget_field['label']) . ':</label> ';
					$output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field['id'] ) ) . '" type="' . $widget_field['type'] . '" value="' . esc_attr( $widget_value ) . '">';
					$output .= '</p>';
			}
		}
		echo $output;
	}
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'caleader-core' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}
	/**
	 * Sanitize widget form values as they are saved
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				case 'checkbox':
					$instance[ $widget_field['id'] ] = $_POST[ $this->get_field_id( $widget_field['id'] ) ];
					break;
				default:
					$instance[ $widget_field['id'] ] = ( ! empty( $new_instance[ $widget_field['id'] ] ) ) ? $new_instance[ $widget_field['id'] ] : '';
			}
		}
		return $instance;
	}
} // class Minicontact_Widget
new Minicontact_Widget();
// register MiniContact widget
function register_minicontact_widget() {
	register_widget( 'Minicontact_Widget' );
}
add_action( 'widgets_init', 'register_minicontact_widget' );