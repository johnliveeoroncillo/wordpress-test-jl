<?php
class ContactForm {




	public function __construct() {
		add_shortcode( 'carleader_listing_contact_form', [ $this, 'contact_form_shortcode' ] );
		add_action( 'rwmb_frontend_before_submit_button', [ $this, 'listing_fields' ] );
		add_filter( 'rwmb_frontend_insert_post_data', [ $this, 'post_data' ], 10, 2 );
		add_action( 'rwmb_frontend_after_save_post', [ $this, 'add_listing_data' ] );

		add_action( 'rwmb_frontend_after_save_post', [ $this, 'caleader_send_mail' ] );
	}
	public function contact_form_shortcode() {
		$shortcode = "[mb_frontend_form id='carleader_listing_contact_form' submit_button='" . esc_html__( 'ASK A QUESTION', 'caleader-listing' ) . "']";
		return do_shortcode( $shortcode );
	}
	public function listing_fields( $config ) {
		if ( 'carleader_listing_contact_form' !== $config['id'] ) {
			return;
		}
		echo '<input type="hidden" name="listing_enquiry_title" value="' . get_the_title() . '">';
		echo '<input type="hidden" name="listing_enquiry_id" value="' . get_the_ID() . '">';
	}
	public function post_data( $data, $config ) {
		if ( 'carleader_listing_contact_form' !== $config['id'] ) {
			return $data;
		}

		$count_posts = wp_count_posts( 'contact-posting' )->publish;

		$listing_id         = filter_input( INPUT_POST, 'listing_enquiry_id' );
		$data['post_title'] = sprintf( esc_html__( '#%d: Enquiry on listing #%2$s', 'caleader-listing' ), $count_posts, $listing_id );
		return $data;
	}
	public function add_listing_data( $enquiry ) {
		if ( 'carleader_listing_contact_form' !== $enquiry->config['id'] ) {
			return;
		}
		$listing_id    = filter_input( INPUT_POST, 'listing_enquiry_id' );
		$listing_title = filter_input( INPUT_POST, 'listing_enquiry_title' );

		if ( ! $listing_id ) {
			return;
		}

		update_post_meta( $enquiry->post_id, '_listing_enqury_listing_id', $enquiry->post_id );
		update_post_meta( $enquiry->post_id, '_listing_enqury_listing_title', $listing_title );
	}

	public function caleader_send_mail( $enquiry ) {
		if ( 'carleader_listing_contact_form' !== $enquiry->config['id'] ) {
			return;
		}

		$send_mil = carleader_listings_option( 'send_mil' );
		if ( ! $send_mil ) {
			return;
		}
		$listing_title = filter_input( INPUT_POST, 'listing_enquiry_title' );

		$name    = get_post_meta( $enquiry->post_id, '_listing_enqury_name', true );
		$email   = get_post_meta( $enquiry->post_id, '_listing_enqury_email', true );
		$phone   = get_post_meta( $enquiry->post_id, '_listing_enqury_phone', true );
		$message = get_post_meta( $enquiry->post_id, '_listing_enqury_msg', true );

		$listing_id = get_post_meta( $enquiry->post_id, '_listing_enqury_listing_id', true );
		$subject    = $this->subject( $enquiry->post_id, $listing_title );
		$to         = $this->recipient();
		$message    = $this->message( $enquiry->post_id, $listing_title, $this->recipient_name(), $name, $email, $phone, $message );
		$headers    = $this->headers( get_post_meta( $enquiry->post_id, '_listing_enqury_email', true ) );
		wp_mail( $to, $subject, $message, $headers );
	}

	protected function recipient_name() {

		$reciepent_name = carleader_listings_option( 'reciepent_name' );
		if ( ! isset( $reciepent_name ) || empty( $reciepent_name ) ) {
			$reciepent_name = get_bloginfo( 'name' ) . esc_html__( 'admin', 'caleader-listing' );
		}
		return $reciepent_name;

	}

	protected function recipient() {

		$recipient = carleader_listings_option( 'reciepent_email' );
		if ( ! isset( $recipient ) || empty( $recipient ) ) {
			$recipient = get_bloginfo( 'admin_email' );
		}
		return $recipient;

	}

	protected function subject( $id, $listing_title ) {
		$subject = carleader_listings_option( 'subject_en' );
		if ( ! isset( $subject ) || empty( $subject ) ) {
			$subject = esc_html__( '#{{enq_no}} Enuiry On {{listing_title}}', 'caleader-listing' );
			$subject = str_replace( '{{enq_no}}', $id, $subject );
			$subject = str_replace( '{{listing_title}}', $listing_title, $subject );
		} else {
			$subject = str_replace( '{{enq_no}}', $id, $subject );
			$subject = str_replace( '{{listing_title}}', $listing_title, $subject );
		}
		return apply_filters( 'carleader_listing_contact_form_subject', $subject );
	}

	protected function message( $id, $title, $reciepent_name, $name, $email, $phone, $message_param ) {
		$message = carleader_listings_option( 'contact_form_message' );
		
		if ( ! isset( $message ) || empty( $message ) ) {
			$message = esc_html__( 'Hi {{reciepent_name}},', 'caleader-listing' ) . "\r\n" .
			esc_html__( 'There has been a new enquiry on <strong>{{listing_title}}</strong>', 'caleader-listing' ) . "\r\n" .
			esc_html__( 'ID: {{enq_id}}', 'caleader-listing' ) . "\r\n" .
			esc_html__( 'Name: {{enq_name}} ', 'caleader-listing' ) . "\r\n" .
			esc_html__( 'Email: {{enquiry_email}} ', 'caleader-listing' ) . "\r\n" .
			esc_html__( 'Message: {{enquiry_message}} ', 'caleader-listing' ) . "\r\n";

			if ( isset( $phone ) && $phone != '' ) {
				$message .= esc_html__( 'Phone: {{enquiry_phone}}', 'caleader-listing' ) . "\r\n";
			}
		}
		$message = str_replace( '{{enq_id}}', $id, $message );
		$message = str_replace( '{{listing_title}}', $title, $message );
		$message = str_replace( '{{reciepent_name}}', $reciepent_name, $message );
		$message = str_replace( '{{enq_name}}', $name, $message );
		$message = str_replace( '{{enquiry_email}}', $email, $message );
		$message = str_replace( '{{enquiry_phone}}', $phone, $message );
		$message = str_replace( '{{enquiry_message}}', $message_param, $message );
		return apply_filters( 'carleader_listing_contact_form_message', wpautop( wp_kses_post( $message ) ) );
	}

	protected function headers() {
		$headers[] = 'From: ' . $this->email_from();
		$headers[] = 'Reply-To: ' . $this->recipient();
		if ( $this->cc() ) {
			$headers[] = 'Cc: ' . $this->cc();
		}
		if ( $this->bcc() ) {
			$headers[] = 'Bcc: ' . $this->bcc();
		}
		$headers[] = 'Content-type: ' . $this->content_type();
		return apply_filters( 'carleader_listing_contact_form_headers', $headers );
	}

	protected function email_from() {
		$from_email = carleader_listings_option( 'email_from' ) ? carleader_listings_option( 'email_from' ) : get_bloginfo( 'admin_email' );
		$from_name  = carleader_listings_option( 'email_from_name' ) ? carleader_listings_option( 'email_from_name' ) : get_bloginfo( 'name' );
		return apply_filters( 'auto_listings_email_from', wp_specialchars_decode( esc_html( $from_name ), ENT_QUOTES ) . ' <' . sanitize_email( $from_email ) . '>' );
	}

	protected function cc() {
		$return = carleader_listings_option( 'contact_form_cc' );
		return apply_filters( 'carleader_listing_contact_form_cc', $return );
	}

	protected function bcc() {
		$return = carleader_listings_option( 'contact_form_bcc' );
		return apply_filters( 'carleader_listing_contact_form_bcc', $return );
	}

	protected function content_type() {
		return 'text/html';
	}

}
new ContactForm();
