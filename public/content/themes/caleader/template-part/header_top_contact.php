<?php
$header_address     = caleader_options( 'header_address' );
$header_layout      = caleader_options( 'header_style' );
$header_phone       = caleader_options( 'header_address_phone' );
$header_time        = caleader_options( 'header_address_time' );
$header_phone_title = caleader_options( 'header_phone_title' );
$header_mail        = caleader_options( 'header_address_email' );
$header_address_wapp        = caleader_options( 'header_address_wapp' );

if ( $header_layout == '1' || $header_layout == '3' ) {
	?>
<ul class="tt-box-info">
	<?php if ( isset( $header_address ) & $header_address != '' ) { ?>
	<li>
		<i class="icon-149984"></i><?php echo caleader_kses_basic($header_address); ?>
	</li>
	<?php } ?>
	<?php if ( isset( $header_phone ) & $header_phone != '' ) { ?>
	<li>
		<a href="tel:<?php echo esc_attr( $header_phone ); ?>">
			<i class="icon-15874"></i><?php echo caleader_kses_basic($header_phone_title); ?><?php echo caleader_kses_basic($header_phone); ?>
		</a>
	</li>
	<?php } ?>
	<?php if ( isset( $header_time ) & $header_time != '' ) { ?>
	<li>
		<i class="icon-icon"></i><?php echo caleader_kses_basic( $header_time ); ?>
	</li>
	<?php } ?>
	<?php if ( isset( $header_mail ) & $header_mail != '' ) { ?>
	<li>
		<a href="<?php echo esc_url( 'mailto:' . $header_mail ); ?>"><i class="icon-mail"></i> <?php echo caleader_kses_basic( $header_mail ); ?></a>
	</li>
	<?php } ?>
	<?php if ( isset( $header_address_wapp ) & $header_address_wapp != '' ) {
		?>
	<li>
		<a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr( $header_address_wapp ); ?>">
			<i class="icon-whatsapp"></i><?php echo caleader_kses_basic( $header_address_wapp ); ?>
		</a>
	</li>
	<?php } ?>
</ul>
</ul>
<?php } else { ?>
<ul class="tt-box-info">
	<?php if ( isset( $header_address ) & $header_address != '' ) { ?>
	<li>
		<i class="icon-149984"></i>
		<?php echo sprintf( __( '%s', 'caleader' ), $header_address ); ?>
	</li>
	<?php } ?>
	<?php if ( isset( $header_phone ) & $header_phone != '' ) { ?>
	<li>
		<a href="tel:<?php echo esc_attr( $header_phone ); ?>">
		<i class="icon-15874"></i><?php echo caleader_kses_basic( $header_phone_title ); ?><br><?php echo caleader_kses_basic( $header_phone ); ?>
		</a>
	</li>
	<?php } ?>
	<?php if ( isset( $header_time ) & $header_time != '' ) { ?>
	<li>
		<i class="icon-icon"></i>
		<?php echo caleader_kses_basic( $header_time ); ?>
	</li>
	<?php } ?>
	<?php if ( isset( $header_mail ) & $header_mail != '' ) { ?>
	<li>
		<a href="<?php echo esc_url( 'mailto:' . $header_mail ); ?>"><i class="icon-mail"></i> <?php echo caleader_kses_basic( $header_mail ); ?></a>
	</li>
	<?php } ?>
	<?php if ( isset( $header_address_wapp ) & $header_address_wapp != '' ) {
		?>
	<li>
		<a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr( $header_address_wapp ); ?>">
			<i class="icon-whatsapp"></i><?php echo caleader_kses_basic( $header_address_wapp ); ?>
		</a>
	</li>
	<?php } ?>
</ul>
	<?php
}