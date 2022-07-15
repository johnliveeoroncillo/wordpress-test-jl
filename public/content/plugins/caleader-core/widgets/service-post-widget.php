<?php
/**
 * Adds Service Post widget
 */
class Servicepost_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress
	 */
	function __construct() {
		parent::__construct(
			'servicepost_widget', // Base ID
			esc_html__( 'Service Post', 'caleader-core' ) // Name
		);
	}
	/**
	 * Widget Fields
	 */
	private $widget_fields = array(
		array(
			'label'   => 'Posts Per Page',
			'id'      => 'postppage',
			'default' => ' ',
			'type'    => 'number',
		),
		array(
			'label'   => 'OrderBy',
			'id'      => 'ordrby',
			'default' => ' ',
			'type'    => 'text',
		),
		array(
			'label'   => 'Order',
			'id'      => 'ordr',
			'default' => ' ',
			'type'    => 'text',
		),
	);
	/**
	 * Front-end display of widget
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		// Output widget title
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		 global $wp;
		 $current_url = home_url( $wp->request );
		$args         = array(
			'post_type'      => 'carleader_services',
			'posts_per_page' => $instance['postppage'],
			'orderby'        => $instance['ordrby'],
			'order'          => $instance['ordr'],
		);

			$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			?>
			<div class="tt-block-aside">
				<div class="tt-aside-content">
					<ul class="tt-sub-menu">
			<?php
			while ( $loop->have_posts() ) :
				$loop->the_post();
				$icon      = get_post_meta( get_the_ID(), 'framework_service_icon', true );
				$permalink = get_the_permalink();
				$permalink = substr_replace( $permalink, '', -1 )
				?>
				<li class="
				<?php
				if ( $current_url == $permalink ) {
					echo 'active';}
				?>
				"><a href="<?php the_permalink(); ?>"><i class="<?php echo $icon; ?>"></i> <?php the_title(); ?></a></li>
				<?php
				endwhile;
			?>
					</ul>
				</div>
			</div>
			<?php
		}
			wp_reset_postdata();
	}
	/*
	* Back-end widget fields
	*/
	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$widget_value = ! empty( $instance[ $widget_field['id'] ] ) ? $instance[ $widget_field['id'] ] : esc_html( $widget_field['default'] );
			switch ( $widget_field['type'] ) {
				default:
					$output .= '<p>';
					$output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_attr( $widget_field['label'] ) . ':</label> ';
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
					$instance[ $widget_field['id'] ] = ( ! empty( $new_instance[ $widget_field['id'] ] ) ) ? strip_tags( $new_instance[ $widget_field['id'] ] ) : '';
			}
		}
		return $instance;
	}
} // class Servicepost_Widget
new Servicepost_Widget();
// register Service Post widget
function register_servicepost_widget() {
	register_widget( 'Servicepost_Widget' );
}
add_action( 'widgets_init', 'register_servicepost_widget' );
