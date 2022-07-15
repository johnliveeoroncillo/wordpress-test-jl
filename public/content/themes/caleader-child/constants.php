<?php
/**
 * GET VALUES FROM SETTINGS
 */
$options = get_option('carsada_options');
/**
 * CAAS KEYS
 */
// $caas_base_url = (!empty($options['caas']['base_url']) ? $options['caas']['base_url'] : '');
// $caas_client_key = (!empty($options['caas']['client_key']) ? $options['caas']['client_key'] : '');
// $caas_client_secret = (!empty($options['caas']['client_secret']) ? $options['caas']['client_secret'] : '');
// $caas_admin_key = (!empty($options['caas']['admin_key']) ? $options['caas']['admin_key'] : '');
// $caas_admin_secret = (!empty($options['caas']['admin_secret']) ? $options['caas']['admin_secret'] : '');
/**
 * CONSENT SETTINGS
 */
// $consent_app_id = (!empty($options['consent']['app_id']) ? $options['consent']['app_id'] : '');
// $consent_tnc_id = (!empty($options['consent']['tnc_id']) ? $options['consent']['tnc_id'] : '');
// $consent_tnc_code = (!empty($options['consent']['tnc_code']) ? $options['consent']['tnc_code'] : '');
// $consent_og_code = (!empty($options['consent']['og_code']) ? $options['consent']['og_code'] : '');
// $consent_og_id = (!empty($options['consent']['og_id']) ? $options['consent']['og_id'] : '');
/**
 * SOCMED URL
 */
$facebook = (!empty($options['social']['facebook']) ? $options['social']['facebook'] : '');
$instagram = (!empty($options['social']['instagram']) ? $options['social']['instagram'] : '');
$linkedin = (!empty($options['social']['linkedin']) ? $options['social']['linkedin'] : '');
/**
 * FOOTER URL
 */
$faq = (!empty($options['footer']['faq']) ? $options['footer']['faq'] : '');
$terms = (!empty($options['footer']['terms']) ? $options['footer']['terms'] : '');
$privacy = (!empty($options['footer']['privacy']) ? $options['footer']['privacy'] : '');
$contact_us = (!empty($options['footer']['contact_us']) ? $options['footer']['contact_us'] : '');
/**
 * Emails
 */
$billing = (!empty($options['email']['billing']) ? $options['email']['billing'] : '');
$footer_email = (!empty($options['email']['footer']) ? $options['email']['footer'] : '');
$support_email = (!empty($options['email']['support']) ? $options['email']['support'] : '');
$dev_contact_email = (!empty($options['email']['dev_contact']) ? $options['email']['dev_contact'] : '');

/**
 * MAILCHIMP
 */
$mailchimp_api_key = (!empty($options['mailchimp']['api_key']) ? $options['mailchimp']['api_key'] : '');
$mailchimp_url = (!empty($options['mailchimp']['url']) ? $options['mailchimp']['url'] : '');

/**
 * OTHER CARSADA SETTINGS
 */
$carsada_terms = (!empty($options['other_carsada']['terms']) ? $options['other_carsada']['terms'] : '');
$carsada_downpayment = (!empty($options['other_carsada']['downpayment']) ? $options['other_carsada']['downpayment'] : '');
$carsada_period = (!empty($options['other_carsada']['period']) ? $options['other_carsada']['period'] : '');
$carsada_interest = (!empty($options['other_carsada']['interest']) ? $options['other_carsada']['interest'] : '');
$carsada_time = (!empty($options['other_carsada']['time']) ? $options['other_carsada']['time'] : '');

/**
 * CUSTOM CONSTANTS
 */
define('CURRENT_URL', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); //RETURNS CURRENT URL
define('CARSADA_URL', get_bloginfo('url')); //SAMPLE OUTPUT: http://localhost:8080/CARSADA or https://{stage}.CARSADA.ph
define('CARSADA_DOMAIN', str_replace(array('https:', 'http:', '/', '?'), '', CARSADA_URL)); //SAMPLE OUTPUT: localhost:8080/carsada or{stage}.carsada.ph
define('CARSADA_UPLOADS', CARSADA_URL.'/wp-content/uploads');
define('CARSADA_VENDOR', CARSADA_URL.'/wp-content/vendor');
define('CARSADA_ASSETS', CARSADA_URL.'/assets');
define('CARSADA_ASSETS_LIVE_URL', CARSADA_URL.'/wp-content/themes/caleader-child/assets');
define('CARSADA_DIR', get_stylesheet_directory_uri()); //SAMPLE OUTPUT: http://localhost:8080/CARSADA/wp-content/themes/caleader-child
define('BASE_PATH', get_stylesheet_directory()); //SAMPLE OUTPUT: C:\xampp\htdocs\CARSADA/wp-content/themes/caleader-child 

define('CARSADA_CODE_EXPIRY', '+1 hour');
define('CARSADA_CODE_RESEND_EXPIRY', '+15 minutes');
define('EXPIRY_CODE_IN_SECONDS', 3600); // 1hour = 3600seconds
define('MAX_AGE', 18);
define('MIN_AGE', 100);

define('DEV_CONTACT_EMAIL', $dev_contact_email);
define('FOOTER_EMAIL', $footer_email);
define('SUPPORT_EMAIL', $support_email);
define('BILLING_EMAIL', $billing);

define('CARSADA_FAQ_URL', $faq);
define('CARSADA_TERMS_URL', $terms);
define('CARSADA_PRIVACY_URL', $privacy);
define('CARSADA_CONTACTUS_URL', $contact_us);

define('CARSADA_FACEBOOK_URL', $facebook);
define('CARSADA_INSTAGRAM_URL', $instagram);
define('CARSADA_LINKEDIN_URL', $linkedin);

define('MAILCHIMP_API_KEY', $mailchimp_api_key);
define('MAILCHIMP_URL', $mailchimp_url);

define('CARSADA_TERMS', $carsada_terms);
define('CARSADA_DOWNPAYMENT', $carsada_downpayment);
define('CARSADA_PERIOD', $carsada_period);
define('CARSADA_INTEREST', $carsada_interest);
define('CARSADA_TIME', $carsada_time);

