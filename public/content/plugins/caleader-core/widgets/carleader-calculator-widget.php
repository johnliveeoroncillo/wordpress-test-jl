<?php
/**
 * Adds Carleader calculator widget
 */
class Carleadercalculator_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress
	 */
	function __construct() {
		parent::__construct(
			'carleadercalculator_widget', // Base ID
			esc_html__( 'Carleader Calculator', 'caleader-core' ), // Name
			array( 'description' => esc_html__( 'To Calculate Payment Details', 'caleader-core' ) ) // Args
		);
	}
	/**
	 * Widget Fields
	 */
	private $widget_fields = array(
		array(
			'label'   => 'Vehicle Price Title',
			'id'      => 'vehicle_price',
			'default' => 'Vehicle price ($)',
			'type'    => 'text',
		),
		array(
			'label'   => 'Interest Rate Title',
			'id'      => 'interest_rate',
			'default' => 'Interest rate (%)',
			'type'    => 'text',
		),
		array(
			'label'   => 'Period Title',
			'id'      => 'period',
			'default' => 'Period (month)',
			'type'    => 'text',
		),
		array(
			'label'   => 'Dawn Payment Tilte',
			'id'      => 'dawn_payment',
			'default' => 'Down Payment ($)',
			'type'    => 'text',
		),
		array(
			'label' => 'Price',
			'id'    => 'price',
			'type'  => 'number',
		),
		array(
			'label'   => 'Interest',
			'id'      => 'interest',
			'default' => '3',
			'type'    => 'number',
		),
		array(
			'label'   => 'Per',
			'id'      => 'per',
			'default' => '24',
			'type'    => 'number',
		),
		array(
			'label'   => 'Down',
			'id'      => 'down',
			'default' => '20000',
			'type'    => 'number',
		),
		array(
			'label'   => 'Show Result Dropdown Auto',
			'id'      => 'result_show',
			'default' => 'off',
			'type'    => 'checkbox',
		),
	);
	/**
	 * Front-end display of widget
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		$price = carleader_listings_meta( 'price' );
		if ( empty( $instance['price'] ) ) {
			$price = carleader_listings_meta( 'price' );
		} else {
			$price = $instance['price'];
		}
		// Output generated fields

		?>
		<div class="tt-aside-calculator">
			<form class="tt-form-default">
				<div class="tt-wrapper-top">
					<h6 class="tt-calculator-title">
						<span class="icon-calculator"></span>
		 <?php
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			} else {
				echo esc_html__( 'Financing Calculator', 'caleader-core' );
			}
			?>
					</h6>
					<div class="tt-calculator-content">
						<div class="tt-form-aside">
							<div class="form-group">
								<label><?php echo $instance['vehicle_price']; ?></label>
								<input type="number" class="form-control vehicle_price" value="<?php echo $price; ?>">
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label><?php echo $instance['interest_rate']; ?></label>
										<input type="number" class="form-control interest_rate" value="<?php echo $instance['interest']; ?>">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label><?php echo $instance['period']; ?></label>
										<input type="number" class="form-control period" value="<?php echo $instance['per']; ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label><?php echo $instance['dawn_payment']; ?></label>
								<input type="number" class="form-control down_payment" value="<?php echo $instance['down']; ?>">
							</div>
						</div>
						
						<a  href="javascript:void(0)"  class="btn btn-fullwidth btn_calculate"><?php echo esc_html__( 'Calculate', 'caleader-core' ); ?></a>
					</div>
				</div>
				<div class="tt-wrapper-bottom wrapper-data-output 
		<?php
		if ( $instance['result_show'] == 'on' ) {
			echo esc_attr( 'calculator-result-show' );
		}
		$vehicle_price = $price;
		$interest_rate = $instance['interest'];
		$period        = $instance['per'];
		$down_payment  = $instance['down'];
		$interest      = ( ( $vehicle_price - $down_payment ) * $interest_rate * $period ) / 100;
		$total         = (int) $interest + (int) $vehicle_price;
		$monthly       = $total / $period;
		?>
				">
					<ul class="tt-data-output">
						<li><?php echo esc_html__( 'Monthly Payment:', 'caleader-core' ); ?> <span class="monthly"><?php echo carleader_listings_price( round( $monthly, 2 ) ); ?></span></li>
						<li><?php echo esc_html__( 'Total Interest Payment:', 'caleader-core' ); ?> <span class="interest"><?php echo carleader_listings_price( round( $interest, 2 ) ); ?></span></li>
						<li><?php echo esc_html__( 'Total Amount to Pay:', 'caleader-core' ); ?> <span class="total"><?php echo carleader_listings_price( round( $total, 2 ) ); ?></span></li>
					</ul>
				</div>
			</form>
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
			if ( ! empty( $widget_field['default'] ) ) {
				$widget_value = ! empty( $instance[ $widget_field['id'] ] ) ? $instance[ $widget_field['id'] ] : esc_html__( $widget_field['default'], 'caleader-core' );
			}
			switch ( $widget_field['type'] ) {
				case 'checkbox':
					$output .= '<p>';
					$output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_attr( $widget_field['label'] ) . ':</label> ';
					$output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field['id'] ) ) . '" type="' . $widget_field['type'] . '"' . checked( $widget_value, 'on' ) . '>';
					$output .= '</p>';
					break;
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
		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				case 'checkbox':
					$instance[ $widget_field['id'] ] = $new_instance[ $widget_field['id']  ];
					break;
				default:
					$instance[ $widget_field['id'] ] = ( ! empty( $new_instance[ $widget_field['id'] ] ) ) ? strip_tags( $new_instance[ $widget_field['id'] ] ) : '';
			}
		}
		return $instance;
	}
} // class Carleadercalculator_Widget
// register Carleader calculator widget
function register_carleadercalculator_widget() {
	register_widget( 'Carleadercalculator_Widget' );
}
add_action( 'widgets_init', 'register_carleadercalculator_widget' );
