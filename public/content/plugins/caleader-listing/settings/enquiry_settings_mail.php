<?php
return [
	'id'             => 'enquiry_mail_settings',
	'title'          => esc_html__( 'Enquiry Mail Settings', 'caleader-listing' ),
	'settings_pages' => 'carleader-listings',
	'tab'            => 'enquiry_settings_tab',
	'fields'         => [
		[
			'name'    => esc_html__( 'Send E-mail', 'caleader-listing' ),
			'id'      => 'send_mil',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'caleader-listing' ),
				'0' => esc_html__( 'No', 'caleader-listing' ),
			),
			'std'     => '0',
			'inline'  => true,
		],
		[
			'name' => esc_html__( 'Sender Name', 'caleader-listing' ),
			'id'   => 'email_from_name',
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Sender Email', 'caleader-listing' ),
			'id'   => 'email_from',
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Recipient Name', 'caleader-listing' ),
			'desc' => esc_html__( 'If empty then take the admin user name.', 'caleader-listing' ),
			'id'   => 'reciepent_name',
			'std'  => esc_html__( '#{{enq_no}} Enquiry On {{listing_title}}', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Recipient E-mail', 'caleader-listing' ),
			'desc' => esc_html__( 'If empty then take the admin email.', 'caleader-listing' ),
			'id'   => 'reciepent_email',
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Subject', 'caleader-listing' ),
			'id'   => 'subject_en',
			'desc' => esc_html__( 'Use {{enq_no}} for enquiry id, {{listing_title}} for Product Title', 'caleader-listing' ),
			'std'  => esc_html__( '#{{enq_no}} Enquiry On {{listing_title}}', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'CC:', 'caleader-listing' ),
			'id'   => 'contact_form_cc',
			'desc' => esc_html__( 'Put new line separate string if multiple.', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Bcc:', 'caleader-listing' ),
			'id'   => 'contact_form_bcc',
			'desc' => esc_html__( 'Put new line separate string if multiple.', 'caleader-listing' ),
			'type' => 'text',
		],
		[
			'name' => esc_html__( 'Message', 'caleader-listing' ),
			'desc' => esc_html__( 'Use {{reciepent_name}} for reciepent name, {{enq_id}} for enquiry id, {{listing_title}} for Product Title, {{enq_name}} for Name, {{enquiry_email}} for Email, {{enquiry_message}} for message, {{enquiry_phone}} for phone and {{date}} for Date." ', 'caleader-listing' ),
			'id'   => 'enquiry_message',
			'std'  => esc_html__( 'There has been a new enquiry on <strong>{{listing_title}}</strong>', 'caleader-listing' ) . "\r\n" .
			esc_html__( 'ID: {{enq_id}}', 'caleader-listing' ) . "\r\n" .
			esc_html__( 'Name: {{enq_name}}', 'caleader-listing' ) . "\r\n" .
			esc_html__( 'Email: {{enquiry_email}}', 'caleader-listing' ) . "\r\n" .
			esc_html__( 'Phone: {{enquiry_phone}}', 'caleader-listing' ) . "\r\n",
			esc_html__( 'Message: {{enquiry_message}}', 'caleader-listing' ) . "\r\n",
			'type' => 'textarea',
		],
	],
];
