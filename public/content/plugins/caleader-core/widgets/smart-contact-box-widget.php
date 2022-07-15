<?php
class CarLeaderContactBox extends WP_Widget {












	public $defaults;
	public function __construct() {
		$this->defaults = array(
			'section'                  => 'Sidebar',
			'style'                    => 'Contact Box',
			'title'                    => esc_html__( 'Contact Information', 'caleader-core' ),
			'sub_title'                => 'CaLeader has a strong and committed sales staff with many years of experience satisfying our customers’ needs.',
			'address_title'            => 'Address',
			'address'                  => '3261 ANMOORE ROAD, BROOKLYN, NY 11230',
			'department_address_title' => 'Service Department Address:',
			'department_address'       => '3261 Anmoore Road, Brooklyn, NY 11230',
			'phone_title'              => 'Phone 24/7',
			'phone'                    => '+01 123 456 78',
			'email_title'              => 'E-mail',
			'email'                    => 'INFO@YOUREMAL.COM',
			'hours_title'              => 'Operating Hours',
			'hours'                    => 'Mon-Fri: 8:00 am – 5:00 pm
				<br>Sat-Sun: 11:00 am – 16:00 pm',
			'hours_service'            => 'Mon-Fri: 8:00 am – 5:00 pm
			<br>Sat-Sun: 11:00 am – 16:00 pm',
			'closed'                   => 'Sunday is closed',
			'closed_service'           => 'Sunday is closed',
			'social_title'             => 'Look for us on',
			'googleplus'               => '#',
			'facebook'                 => '#',
			'twitter'                  => '#',
			'instagram'				   => '#',	

		);
		parent::__construct(
			'carleader_contact_box', // Base ID
			esc_html__( 'Car Leader Contact Box', 'caleader-core' ), // Name
			array(
				'description' => esc_html__( 'Side Bar Contact Box.', 'caleader-core' ),
			)
		);
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		?>
<p class="section_selection">
	<label for="<?php echo esc_attr( $this->get_field_id( 'section' ) ); ?>">
		<strong><?php esc_html_e( 'Section', 'caleader-core' ); ?>:</strong><br />
		<select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'section' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'section' ) ); ?>">
			<option <?php selected( $instance['section'], 'Sidebar' ); ?>>
				<?php echo esc_html__( 'Sidebar', 'caleader-core' ); ?> </option>
			<option <?php selected( $instance['section'], 'Footer' ); ?>>
				<?php echo esc_html__( 'Footer', 'caleader-core' ); ?></option>
		</select>
	</label>
</p>
<div class="col-md-5 mb-3 style_selection">
	<br>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><strong><?php esc_html_e( 'Style', 'caleader-core' ); ?>:</strong><br /></label>
	<select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>"
		id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>">
		<option <?php selected( $instance['style'], 'Contact Box' ); ?>>
			<?php echo esc_html__( 'Contact Box', 'caleader-core' ); ?></option>
		<option <?php selected( $instance['style'], 'Car' ); ?>><?php echo esc_html__( 'Car', 'caleader-core' ); ?>
		</option>
		<option <?php selected( $instance['style'], 'Motor' ); ?>><?php echo esc_html__( 'Motor', 'caleader-core' ); ?>
		</option>
		<option <?php selected( $instance['style'], 'Yacht' ); ?>><?php echo esc_html__( 'Yacht', 'caleader-core' ); ?>
		</option>
	</select>
</div>
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
		<strong><?php esc_html_e( 'Title', 'caleader-core' ); ?>:</strong><br />
		<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			value="<?php echo esc_attr( $instance['title'] ); ?>" />
	</label>
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>"><?php esc_html_e( 'Sub Titile', 'caleader-core' ); ?></label>
	<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'sub_title' ) ); ?>"><?php echo wp_kses_post( $instance['sub_title'] ); ?></textarea>
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'address_title' ) ); ?>"><?php esc_html_e( 'Address Title', 'caleader-core' ); ?></label>
	<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'address_title' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'address_title' ) ); ?>"
		value="<?php echo esc_attr( $instance['address_title'] ); ?>" />
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_html_e( 'Address', 'caleader-core' ); ?></label>
	<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>"><?php echo wp_kses_post( $instance['address'] ); ?></textarea>
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'department_address_title' ) ); ?>"><?php esc_html_e( 'Department Address Title', 'caleader-core' ); ?></label>
	<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'department_address_title' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'department_address_title' ) ); ?>"
		value="<?php echo esc_attr( $instance['department_address_title'] ); ?>" />
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'department_address' ) ); ?>"><?php esc_html_e( 'Department Address', 'caleader-core' ); ?></label>
	<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'department_address' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'department_address' ) ); ?>"><?php echo wp_kses_post( $instance['department_address'] ); ?></textarea>
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'phone_title' ) ); ?>"><?php esc_html_e( 'Phone Title', 'caleader-core' ); ?></label>
	<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'phone_title' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'phone_title' ) ); ?>"
		value="<?php echo esc_attr( $instance['phone_title'] ); ?>" />
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_html_e( 'Phone (Put comma separated values if multiple)', 'caleader-core' ); ?></label>
	<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>"><?php echo wp_kses_post( $instance['phone'] ); ?></textarea>
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'email_title' ) ); ?>"><?php esc_html_e( 'Email Title', 'caleader-core' ); ?></label>
	<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'email_title' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'email_title' ) ); ?>"
		value="<?php echo esc_attr( $instance['email_title'] ); ?>" />
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_html_e( 'Email', 'caleader-core' ); ?></label>
	<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>"><?php echo wp_kses_post( $instance['email'] ); ?></textarea>
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'hours_title' ) ); ?>"><?php esc_html_e( 'Hours Sales Title', 'caleader-core' ); ?></label>
	<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'hours_title' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'hours_title' ) ); ?>"
		value="<?php echo esc_attr( $instance['hours_title'] ); ?>" />
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'hours' ) ); ?>"><?php esc_html_e( 'Hours Sales', 'caleader-core' ); ?></label>
	<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'hours' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'hours' ) ); ?>"><?php echo wp_kses_post( $instance['hours'] ); ?></textarea>
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'hours_service' ) ); ?>"><?php esc_html_e( 'Hours Service', 'caleader-core' ); ?></label>
	<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'hours_service' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'hours_service' ) ); ?>"><?php echo wp_kses_post( $instance['hours_service'] ); ?></textarea>
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'closed' ) ); ?>"><?php esc_html_e( 'Closed Message', 'caleader-core' ); ?></label>
	<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'closed' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'closed' ) ); ?>"><?php echo wp_kses_post( $instance['closed'] ); ?></textarea>
</p>
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'closed_service' ) ); ?>"><?php esc_html_e( 'Closed Message for Services', 'caleader-core' ); ?></label>
	<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'closed_service' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'closed_service' ) ); ?>"><?php echo wp_kses_post( $instance['closed_service'] ); ?></textarea>
</p>
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
		<strong><?php esc_html_e( 'Social Title', 'caleader-core' ); ?>:</strong><br />
		<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'social_title' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'social_title' ) ); ?>"
			value="<?php echo esc_attr( $instance['social_title'] ); ?>" />
	</label>
</p>
<!-- facebook-->
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook', 'caleader-core' ); ?></label>
	<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>"
		value="<?php echo esc_attr( $instance['facebook'] ); ?>" />
</p>
<!-- twiiter-->
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter', 'caleader-core' ); ?></label>
	<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>"
		value="<?php echo esc_attr( $instance['twitter'] ); ?>" />
</p>
<!-- googleplus-->
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'googleplus' ) ); ?>"><?php esc_html_e( 'Googleplus', 'caleader-core' ); ?></label>
	<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'googleplus' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'googleplus' ) ); ?>"
		value="<?php echo esc_attr( $instance['googleplus'] ); ?>" />
</p>
<!-- instagram-->
<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram', 'caleader-core' ); ?></label>
	<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>"
		value="<?php echo esc_attr( $instance['instagram'] ); ?>" />
</p>
		<?php
	}
	function widget( $args, $instance ) {
		$footer_subscriber_content = get_theme_mod( 'footer_subscriber_content' );
		extract( $args );
		echo wp_kses_post( $before_widget );

		$phone_array = explode( ',', $instance['phone'] );

		if ( ! isset( $instance['closed_service'] ) ) {
			$instance['closed_service'] = '';
		}

		if ( ! isset( $instance['hours_service'] ) ) {
			$instance['hours_service'] = '';
		}

		if ( $instance['section'] == 'Sidebar' ) {
			if ( ! empty( $instance['title'] ) ) {
				$title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );
			}
			?>
<div class="box-info box-info-indent">
	<h3 class="tt-title"><?php echo wp_kses_post( $title ); ?></h3>
	<p><?php echo $instance['sub_title']; ?></p>
	<div class="tt-item-layout">
			<?php if ( ! empty( $instance['address'] ) ) { ?>
		<div class="tt-item">
			<div class="tt-col">
				<i class="icon-149984"></i>
			</div>
			<div class="tt-col">
				<h6 class="tt-title"><?php echo $instance['address_title']; ?></h6>
				<?php echo $instance['address']; ?>
			</div>
		</div>
		<?php } ?>
			<?php if ( ! empty( $instance['department_address'] ) ) { ?>
		<div class="tt-item">
			<div class="tt-col">
				<i class="icon-car-washing-machine"></i>
			</div>
			<div class="tt-col">
				<h6 class="tt-title"><?php echo $instance['department_address_title']; ?></h6>
				<?php echo $instance['department_address']; ?>
			</div>
		</div>
		<?php } ?>
			<?php if ( ! empty( $instance['phone'] ) ) { ?>
		<div class="tt-item">
			<div class="tt-col">
				<i class="icon-15874"></i>
			</div>
			<div class="tt-col">
				<h6 class="tt-title"><?php echo $instance['phone_title']; ?></h6>
				<?php echo $instance['phone']; ?>
			</div>
		</div>
		<?php } ?>
			<?php if ( ! empty( $instance['email'] ) ) { ?>
		<div class="tt-item">
			<div class="tt-col">
				<i class="icon-mail"></i>
			</div>
			<div class="tt-col">
				<h6 class="tt-title"><?php echo $instance['email_title']; ?></h6>
				<?php echo $instance['email']; ?>
			</div>
		</div>
		<?php } ?>
			<?php if ( $instance['hours'] != '' || isset( $instance['hours_service'] ) ) { ?>
		<div class="tt-item">
			<div class="tt-col">
				<i class="icon-icon"></i>
			</div>
			<div class="tt-col">
				<h6 class="tt-title"><?php echo $instance['hours_title']; ?></h6>
				<div class="row">
					<?php if ( $instance['hours'] != '' || $instance['closed'] != '' ) { ?>
					<div class="col-lg-6">
						<strong><?php echo esc_html__( 'Sales Department', 'caleader-core' ); ?></strong>
						<p>
							<?php echo $instance['hours']; ?>
							<br>
							<?php echo $instance['closed']; ?>
						</p>
					</div>
					<?php } ?>
					<?php

					if ( isset( $instance['hours_service'] ) ) {
						if ( $instance['hours_service'] != '' ) {
							?>
					<div class="col-lg-6">
						<strong><?php echo esc_html__( 'Service Department', 'caleader-core' ); ?></strong>
						<p>
							<?php echo $instance['hours_service']; ?>
							<br>
							<?php if ( $instance['closed_service'] != '' ) { ?>
								<?php echo $instance['closed_service']; ?>
							<?php } else { ?>
								<?php echo $instance['closed']; ?>
							<?php } ?>
						</p>
					</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<ul class="tt-social-icon">
		<!--googleplus-->
			<?php if ( ! empty( $instance['facebook'] ) ) : ?>
		<li>
			<a href="<?php echo esc_url( $instance['facebook'] ); ?>" class="icon-226234"></a>
		</li>
		<?php endif; ?>
			<?php if ( ! empty( $instance['twitter'] ) ) : ?>
		<li>
			<a href="<?php echo esc_url( $instance['twitter'] ); ?>" class="icon-8800"></a>
		</li>
		<?php endif; ?>
			<?php if ( ! empty( $instance['googleplus'] ) ) : ?>
		<li>
			<a href="<?php echo esc_url( $instance['googleplus'] ); ?>" class="icon-733613"></a>
		</li>
		<?php endif; ?>
			<?php if ( ! empty( $instance['instagram'] ) ) : ?>
		<li>
			<a href="<?php echo esc_url( $instance['instagram'] ); ?>" class="icon-instagram"></a>
		</li>
		<?php endif; ?>
	</ul>
</div>
			<?php
		} else {
			if ( $instance['style'] == 'Car' || $instance['style'] == 'Yacht' ) {
				if ( ! empty( $instance['title'] ) ) {
					$title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );

				}
				?>

<div class="tt-row-custom">
	<div class="tt-col">
		<ul class="tt-list-info">
			<li>
				<i class="icon-149984"></i>
				<?php echo $instance['address']; ?>
			</li>
			<li>
				<?php foreach ( $phone_array as $phone ) { ?>
				<a href="tel:<?php echo $phone; ?>">
					<i class="icon-15874"></i>
					<?php echo $phone; ?>
				</a>
				<?php } ?>
			</li>
			<li>
				<a href="mailto:<?php echo $instance['email']; ?>">
					<i class="icon-mail"></i>
					<?php echo $instance['email']; ?>
				</a>
			</li>
		</ul>
	</div>
				<?php if ( $instance['hours'] != '' || $instance['closed'] != '' ) { ?>
	<div class="tt-col">
		<div class="tt-box-info">
			<div class="tt-item">
				<h6 class="tt-ttile"><i
						class="icon-icon"></i><?php echo esc_html__( 'Sales Department', 'caleader-core' ); ?></h6>
				<ul>
					<li><?php echo $instance['hours']; ?></li>
					<li>
						<?php
						if ( isset( $instance['closed'] ) ) {
							echo $instance['closed'];
						}
						?>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php } ?>
				<?php
				if ( isset( $instance['hours_service'] ) ) {
					if ( $instance['hours_service'] != '' ) {
						?>
	<div class="tt-col">
		<div class="tt-box-info">
			<div class="tt-item">
				<h6 class="tt-ttile"><i
						class="icon-icon"></i><?php echo esc_html__( 'Service Department', 'caleader-core' ); ?></h6>
				<ul>
					<li><?php echo $instance['hours_service']; ?></li>
					<li>
						<?php
						if ( $instance['closed_service'] != '' ) {
							 echo $instance['closed_service'];
						} else {
							echo $instance['closed'];
						}
						?>
					</li>
				</ul>
			</div>
		</div>
	</div>
						<?php
					}
				}
				?>
				<?php if ( $instance['style'] == 'Car' || $instance['style'] == 'Motor' ) { ?>
					<?php if ( isset( $footer_subscriber_content ) && $footer_subscriber_content != '' ) { ?>
	<div class="tt-col">
		<div class="tt-box-info">
			<div class="tt-item">
						<?php echo do_shortcode( $footer_subscriber_content ); ?>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php } ?>
</div>
				<?php
			} else {
				if ( ! empty( $instance['title'] ) ) {
					$title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );

				}
				?>
<div class="row row-info">
	<div class="col-md-4">
		<div class="tt-box-info02">
			<div class="tt-item">
				<i class="icon-149984"></i>
				<?php echo $instance['address']; ?>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="tt-box-info02">
				<?php foreach ( $phone_array as $phone ) { ?>
			<div class="tt-item">
				<i class="icon-15874"></i>
					<?php echo $phone; ?>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="col-md-4">
		<div class="tt-box-info02">
			<a href="mailto:<?php echo $instance['email']; ?>" class="tt-item">
				<i class="icon-mail"></i>
				<?php echo $instance['email']; ?>
			</a>
		</div>
	</div>
				<?php if ( $instance['hours'] != '' || $instance['closed'] != '' ) { ?>
	<div class="col-md-4">
		<div class="tt-box-info">
			<div class="tt-item">
				<h6 class="tt-ttile"><i
						class="icon-icon"></i><?php echo esc_html__( 'Sales Department', 'caleader-core' ); ?></h6>
				<ul>
					<li><?php echo $instance['hours']; ?></li>
					<li><?php echo $instance['closed']; ?></li>
				</ul>
			</div>
		</div>
	</div>
	<?php } ?>

				<?php
				if ( isset( $instance['hours_service'] ) ) {
					if ( $instance['hours_service'] != '' ) {
						?>
	<div class="col-md-4">
		<div class="tt-box-info">
			<div class="tt-item">
				<h6 class="tt-ttile"><i
						class="icon-icon"></i><?php echo esc_html__( 'Service Department', 'caleader-core' ); ?></h6>
				<ul>
					<li><?php echo $instance['hours_service']; ?></li>
						<?php if ( $instance['closed_service'] != '' ) { ?>
					<li><?php echo $instance['closed_service']; ?></li>
							<?php
						} else {
							?>
					<li><?php echo $instance['closed']; ?></li>
							<?php
						}
						?>
				</ul>
			</div>
		</div>
	</div>
						<?php
					}
				}
				?>
				<?php if ( isset( $footer_subscriber_content ) && $footer_subscriber_content != '' ) { ?>
	<div class="col-md-4">
		<div class="tt-box-info">
			<div class="tt-item">
					<?php echo do_shortcode( $footer_subscriber_content ); ?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>



				<?php
			}
		}
		?>
		<?php

		echo wp_kses_post( $after_widget );
	}
	function update( $new_instance, $old_instance ) {
		$instance                       = $old_instance;
		$instance['title']              = strip_tags( $new_instance['title'] );
		$instance['sub_title']          = $new_instance['sub_title'];
		$instance['section']            = $new_instance['section'];
		$instance['style']              = $new_instance['style'];
		$instance['phone']              = $new_instance['phone'];
		$instance['address']            = $new_instance['address'];
		$instance['department_address'] = $new_instance['department_address'];
		$instance['hours']              = isset($new_instance['hours'])?$new_instance['hours']:'';
		if ( isset( $new_instance['hours_service'] ) ) {
			$instance['hours_service'] = $new_instance['hours_service'];
		}
		if ( isset( $new_instance['instagram'] ) ) {
			$instance['instagram'] = $new_instance['instagram'];
		}
		$instance['closed'] = $new_instance['closed'];
		if ( isset( $new_instance['closed_service'] ) ) {
			$instance['closed_service'] = $new_instance['closed_service'];
		}
		if ( isset( $new_instance['instagram'] ) ) {
			$instance['instagram'] = $new_instance['instagram'];
		}

		$instance['social_title']             = $new_instance['social_title'];
		$instance['facebook']                 = $new_instance['facebook'];
		$instance['twitter']                  = $new_instance['twitter'];
		$instance['googleplus']               = $new_instance['googleplus'];
		$instance['address_title']            = strip_tags( $new_instance['address_title'] );
		$instance['department_address_title'] = strip_tags( $new_instance['department_address_title'] );
		$instance['phone_title']              = strip_tags( $new_instance['phone_title'] );
		$instance['hours_title']              = strip_tags( $new_instance['hours_title'] );
		$instance['email_title']              = strip_tags( $new_instance['email_title'] );
		$instance['email']                    = strip_tags( $new_instance['email'] );
		return $instance;
	}
}
function carleader_contactbox() {
	register_widget( 'CarLeaderContactBox' );
}
add_action( 'widgets_init', 'carleader_contactbox' );
