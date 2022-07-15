<?php
/**
 * Adds Carleader calculator widget
 */
class CarleadercalculatorCustom_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress
	 */
	function __construct() {
		parent::__construct(
			'carleadercalculatorcustom_widget', // Base ID
			esc_html__( 'Carsada Calculator', 'caleader-core' ), // Name
			array( 'description' => esc_html__( 'To Calculate Payment Details', 'caleader-core' ) ) // Args
		);

		add_shortcode('carsada_single_apply_for_loan', function($args) {
			return CARSADA_URL . '/apply-a-loan/'. get_query_var('carleader-listing');        
        });
	}
	/**
	 * Widget Fields
	 */
	private $widget_fields = array(
		// array(
		// 	'label'   => 'Vehicle Price Title',
		// 	'id'      => 'vehicle_price',
		// 	'default' => 'Vehicle price ($)',
		// 	'type'    => 'text',
		// ),
		array(
			'label'   => 'Interest Rate Title',
			'id'      => 'interest_rate',
			'default' => 'Interest Rate (%)',
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
			'default' => 'Down Payment (%)',
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
			'default' => '15',
			'type'    => 'number',
		),
		// array(
		// 	'label'   => 'Apply for loan shortcode',
		// 	'id'      => 'cta_shortcode',	
		// 	'default' => '[shortcode]',					
		// 	'type'    => 'text',
		// ),
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
		<style>
			.SumoSelect {
				width: 100% !important;
			}
			.CaptionCont.SelectBox label:after {
				position: absolute;
			}
			.SumoSelect > .CaptionCont > label > i {
				display: none !important;
			}
			.CaptionCont.SelectBox {
				padding-left: 16px !important;
				padding-right: 16px !important;
			}
			.optWrapper li label {
				text-align: center;
				padding-left: 0 !important;
			}
			.SumoSelect > .optWrapper > .options {
				max-height: 164px !important;
			}
		</style>
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
									<div class="form-group tt-skinSelect-01">
										<label><?php echo $instance['interest_rate']; ?></label>		
										
										<?php
											$interest_array = array();
											$interest = CARSADA_INTEREST;
											if (!empty($interest)) {
												$interests = explode(',', $interest);
												if (!empty($interests)) $interest_array = $interests;
											}
										;?>
										<select class="tt-select tt-skin-01 SumoUnder interest_rate" tabindex="-1">	
											<?php
													if (!empty($interest_array)) { 
														foreach($interest_array as $value) { ;?>
															<!-- LOAD FROM SETTINGS -->
															<option value="<?=trim($value);?>" <?= $instance['interest'] == trim($value) ? 'selected' : '' ?>><?=trim($value);?></option>
											<?php 		}
													}
													else { ;?>
														<!--LOAD DEFAULT -->
														<option value="1" <?= $instance['interest'] == 1? 'selected' : '' ?>>1</option>
														<option value="2" <?= $instance['interest'] == 2? 'selected' : '' ?>>2</option>
														<option value="3" <?= $instance['interest'] == 3? 'selected' : '' ?>>3</option>
														<option value="4" <?= $instance['interest'] == 4? 'selected' : '' ?>>4</option>
														<option value="5" <?= $instance['interest'] == 5? 'selected' : '' ?>>5</option>
														<option value="6" <?= $instance['interest'] == 6? 'selected' : '' ?>>6</option>
														<option value="7" <?= $instance['interest'] == 7? 'selected' : '' ?>>7</option>
														<option value="8" <?= $instance['interest'] == 8? 'selected' : '' ?>>8</option>
														<option value="9" <?= $instance['interest'] == 9? 'selected' : '' ?>>9</option>
														<option value="10" <?= $instance['interest'] == 10? 'selected' : '' ?>>10</option>
														<option value="11" <?= $instance['interest'] == 11? 'selected' : '' ?>>11</option>
														<option value="12" <?= $instance['interest'] == 12? 'selected' : '' ?>>12</option>
											<?php 	} ;?>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group tt-skinSelect-01">
										<label>Period (Year)</label>	
										
										<?php
											$period_array = array();
											$period = CARSADA_PERIOD;
											if (!empty($period)) {
												$periods = explode(',', $period);
												if (!empty($periods)) $period_array = $periods;
											}
										;?>

										<select class="tt-select tt-skin-01 SumoUnder period" tabindex="-1">	
										<?php
												if (!empty($period_array)) { 
													foreach($period_array as $value) { ;?>
														<!-- LOAD FROM SETTINGS -->
														<option value="<?=trim($value);?>" <?= $instance['per'] == trim($value) ? 'selected' : '' ?>><?=trim($value);?></option>
										<?php 		}
												}
												else { ;?>
													<!--LOAD DEFAULT -->										
													<option value="6" <?= $instance['per'] == 1? 'selected' : '' ?>>1</option>
													<option value="12" <?= $instance['per'] == 2? 'selected' : '' ?>>2</option>
													<option value="18" <?= $instance['per'] == 3? 'selected' : '' ?>>3</option>
													<option value="24" <?= $instance['per'] == 4? 'selected' : '' ?>>4</option>
													<option value="30" <?= $instance['per'] == 5? 'selected' : '' ?>>5</option>
										<?php 	} ;?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group tt-skinSelect-01">
								<label><?php echo str_replace('PHP', '%', $instance['dawn_payment']); ?></label>

								<?php
									$downpayment_array = array();
									$downpayment = CARSADA_DOWNPAYMENT;
									if (!empty($downpayment)) {
										$downpayments = explode(',', $downpayment);
										if (!empty($downpayments)) $downpayment_array = $downpayments;
									}
								;?>

								<select class="tt-select tt-skin-01 SumoUnder down_payment_percentage" tabindex="-1">	
								<?php
										if (!empty($downpayment_array)) { 
											foreach($downpayment_array as $value) { ;?>
												<!-- LOAD FROM SETTINGS -->
												<option value="<?=trim($value);?>" <?= $instance['down'] == trim($value) ? 'selected' : '' ?>><?=trim($value);?></option>
								<?php 		}
										}
										else { ;?>
											<!--LOAD DEFAULT -->										
											<option value="15" <?= $instance['down'] == 15? 'selected' : '' ?>>15</option>
											<option value="20" <?= $instance['down'] == 20? 'selected' : '' ?>>20</option>
											<option value="30" <?= $instance['down'] == 30? 'selected' : '' ?>>30</option>
											<option value="40" <?= $instance['down'] == 40? 'selected' : '' ?>>40</option>
											<option value="50" <?= $instance['down'] == 50? 'selected' : '' ?>>50</option>
											<option value="60" <?= $instance['down'] == 60? 'selected' : '' ?>>60</option>
											<option value="70" <?= $instance['down'] == 70? 'selected' : '' ?>>70</option>
								<?php 	} ;?>
								</select>

								<input type="hidden" placeholder="PHP" class="form-control down_payment" value="">
							</div>
						</div>
						
						<!-- <a  href="javascript:void(0)"  class="btn btn-fullwidth btn_calculate"><?php echo esc_html__( 'Calculate', 'caleader-core' ); ?></a> -->
						<a  href="javascript:void(0)"  class="btn btn-fullwidth btn-warning btn-lg btn_calculate-modified"><?php echo esc_html__( 'Calculate', 'caleader-core' ); ?></a>
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
		/**
		 * DP IN PERCENTAGE
		 */
		$down_payment_percentage  = 15;
		$down_payment  = $vehicle_price * ($down_payment_percentage/100);

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
					<a onclick="apply_loan_redirect('<?php echo do_shortcode('[carsada_single_apply_for_loan]'); ?>')" class="btn btn-fullwidth text-white btn-warning btn-lg mt-1 btn-apply-a-loan-hook cursor-pointer">Apply for Loan</a>
				</div>
			</form>
		</div>

		<script defer>
			function apply_loan_redirect(url) {
				var down_payment_percentage = parseFloat(jQuery(".down_payment_percentage").val());
				var interest_rate = parseFloat(jQuery(".interest_rate").val());
				var period = parseFloat(jQuery(".period").val());

				window.location.href = url + '?terms=' + period + '&dp=' + down_payment_percentage;
			}

			jQuery(".btn_calculate-modified").on('click', function(event) {

				var vehicle_price = parseFloat(jQuery(".vehicle_price").val());
				/**
				 * DOWNPAYMENT IN PERCENTAGE
				 */
				var down_payment_percentage = parseFloat(jQuery(".down_payment_percentage").val());
				var down_payment = vehicle_price * (down_payment_percentage/100);

				var interest_rate = parseFloat(jQuery(".interest_rate").val());
				// interest_rate = interest_rate / 100;

				var period = parseFloat(jQuery(".period").val() * 12);
				

				var monthly = 0;
				var interest = 0;
				var total = 0;

				interest = ( ( vehicle_price - down_payment ) * interest_rate * period ) / 100;
				total =  parseFloat(interest) + parseFloat(vehicle_price);
				monthly = total / period;

				interest = parseFloat(interest).toFixed(2);
				total = parseFloat(total).toFixed(2);
				monthly = parseFloat(monthly).toFixed(2);
				
				// console.log(vehicle_price);
				// console.log(down_payment_percentage);
				// console.log(down_payment);
				// console.log(period);

				// console.log(monthly);
				// console.log(interest);
				// console.log(total);

				if (ajax_object.currency_pos == 'before') {
					jQuery(".monthly").text(ajax_object.currency + (monthly));
					jQuery(".interest").text(ajax_object.currency + interest);
					jQuery(".total").text(ajax_object.currency + total);
				} else if (ajax_object.currency_pos == 'after') {
					jQuery(".monthly").text(ajax_object.currency + (monthly));
					jQuery(".interest").text(interest + ajax_object.currency);
					jQuery(".total").text(total + ajax_object.currency);
				} else if (ajax_object.currency_pos == 'after_space') {
					jQuery(".monthly").text(ajax_object.currency + (monthly));
					jQuery(".interest").text(interest + " " + ajax_object.currency);
					jQuery(".total").text(total + " " + ajax_object.currency);
				} else if (ajax_object.currency_pos == 'before_space') {
					jQuery(".monthly").text(ajax_object.currency + (monthly));
					jQuery(".interest").text(ajax_object.currency + " " + interest);
					jQuery(".total").text(ajax_object.currency + " " + total);
				}

				jQuery('.wrapper-data-output').addClass('calculator-result-show');
			});
		</script>
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
function register_carleadercalculatorcustom_widget() {
	register_widget( 'Carleadercalculatorcustom_Widget' );
}
add_action( 'widgets_init', 'register_carleadercalculatorcustom_widget' );
