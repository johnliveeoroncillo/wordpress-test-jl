<?php
add_action('admin_menu', 'dbi_add_settings_page');
add_action('admin_init', 'dbi_register_settings');


function dbi_add_settings_page()
{
    add_options_page('Carsada', 'Carsada', 'manage_options', 'carsada-settings', 'cra_render_plugin_settings_page');
}

function cra_render_plugin_settings_page()
{
?>
    <h2>Carsada Settings</h2>
    <form action="options.php" method="post">
        <?php
        settings_fields('carsada_options');
        do_settings_sections('cra_plugin'); ?>
        <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e('Save'); ?>" />
    </form>
<?php
}

function dbi_register_settings()
{
    register_setting('carsada_options', 'carsada_options', 'cra_plugin_options_validate');

    add_settings_section('social_settings', 'Social Media Url', 'carsada_settings_section_social', 'cra_plugin');
    add_settings_field('carsada_settings_social_facebook', 'Facebook', 'carsada_settings_social_facebook', 'cra_plugin', 'social_settings');
    add_settings_field('carsada_settings_social_instagram', 'Instagram', 'carsada_settings_social_instagram', 'cra_plugin', 'social_settings');
    add_settings_field('carsada_settings_social_linkedin', 'LinkedIn', 'carsada_settings_social_linkedin', 'cra_plugin', 'social_settings');

    add_settings_section('footer_settings', 'Footer Url', 'carsada_settings_section_footer', 'cra_plugin');
    add_settings_field('carsada_settings_footer_faq', 'FAQ', 'carsada_settings_footer_faq', 'cra_plugin', 'footer_settings');
    add_settings_field('carsada_settings_footer_terms', 'Terms &amp; Conditions', 'carsada_settings_footer_terms', 'cra_plugin', 'footer_settings');
    add_settings_field('carsada_settings_footer_privacy', 'Privacy Policy', 'carsada_settings_footer_privacy', 'cra_plugin', 'footer_settings');
    add_settings_field('carsada_settings_footer_contact_us', 'Contact Us', 'carsada_settings_footer_contact_us', 'cra_plugin', 'footer_settings');

    add_settings_section('email_settings', 'Emails', 'carsada_settings_section_email', 'cra_plugin');
    add_settings_field('carsada_settings_email_billing', 'Billing', 'carsada_settings_email_billing', 'cra_plugin', 'email_settings');
    add_settings_field('carsada_settings_email_footer', 'Footer', 'carsada_settings_email_footer', 'cra_plugin', 'email_settings');
    add_settings_field('carsada_settings_email_support', 'Support', 'carsada_settings_email_support', 'cra_plugin', 'email_settings');
    add_settings_field('carsada_settings_email_dev_contact', 'Dev Contact', 'carsada_settings_email_dev_contact', 'cra_plugin', 'email_settings');

    add_settings_section('mailchimp_settings', 'Mailchimp', 'carsada_settings_section_mailchimp', 'cra_plugin');
    add_settings_field('carsada_settings_mailchimp_api_key', 'API Key', 'carsada_settings_mailchimp_api_key', 'cra_plugin', 'mailchimp_settings');
    add_settings_field('carsada_settings_mailchimp_url', 'URL', 'carsada_settings_mailchimp_url', 'cra_plugin', 'mailchimp_settings');

    add_settings_section('other_carsada_settings', 'Other Carsada Settings', 'carsada_settings_section_other_carsada', 'cra_plugin');
    // add_settings_field('carsada_settings_other_carsada_terms', 'Terms (Year)', 'carsada_settings_other_carsada_terms', 'cra_plugin', 'other_carsada_settings');
    add_settings_field('carsada_settings_other_carsada_downpayment', 'Downpayment (%)', 'carsada_settings_other_carsada_downpayment', 'cra_plugin', 'other_carsada_settings');
    add_settings_field('carsada_settings_other_carsada_period', 'Payment Terms (Year)', 'carsada_settings_other_carsada_period', 'cra_plugin', 'other_carsada_settings');
    add_settings_field('carsada_settings_other_carsada_interest', 'Interest Rate (%)', 'carsada_settings_other_carsada_interest', 'cra_plugin', 'other_carsada_settings');
    add_settings_field('carsada_settings_other_carsada_time', 'Preffered Time', 'carsada_settings_other_carsada_time', 'cra_plugin', 'other_carsada_settings');

}


function cra_plugin_options_validate($input)
{
    return $input;
}

/**
 * SOCMED SETTINGS
 */
function carsada_settings_section_social()
{
    echo '<p>Here you can set all the options for Social Media Url</p>';
}
function carsada_settings_social_facebook()
{
    $options = get_option('carsada_options');
    $val = (isset($options['social']['facebook']) ? $options['social']['facebook'] : "");
    echo "<input id='carsada_settings_facebook' class='regular-text' name='carsada_options[social][facebook]' type='text' value='" . esc_attr($val) . "' />";
}
function carsada_settings_social_instagram()
{
    $options = get_option('carsada_options');
    $val = (isset($options['social']['instagram']) ? $options['social']['instagram'] : "");
    echo "<input id='carsada_settings_instagram' class='regular-text' name='carsada_options[social][instagram]' type='text' value='" . esc_attr($val) . "' />";
}
function carsada_settings_social_linkedin()
{
    $options = get_option('carsada_options');
    $val = (isset($options['social']['linkedin']) ? $options['social']['linkedin'] : "");
    echo "<input id='carsada_settings_linkedin' class='regular-text' name='carsada_options[social][linkedin]' type='text' value='" . esc_attr($val) . "' />";
}
/**
 * FOOTER URL
 */
function carsada_settings_section_footer()
{
    echo '<p>Here you can set all the options for Footer Url</p>';
}
function carsada_settings_footer_faq()
{
    $options = get_option('carsada_options');
    $val = (isset($options['footer']['faq']) ? $options['footer']['faq'] : "");
    echo "<input id='carsada_settings_faq' class='regular-text' name='carsada_options[footer][faq]' type='text' value='" . esc_attr($val) . "' />";
}
function carsada_settings_footer_terms()
{
    $options = get_option('carsada_options');
    $val = (isset($options['footer']['terms']) ? $options['footer']['terms'] : "");
    echo "<input id='carsada_settings_terms' class='regular-text' name='carsada_options[footer][terms]' type='text' value='" . esc_attr($val) . "' />";
}
function carsada_settings_footer_privacy()
{
    $options = get_option('carsada_options');
    $val = (isset($options['footer']['privacy']) ? $options['footer']['privacy'] : "");
    echo "<input id='carsada_settings_privacy' class='regular-text' name='carsada_options[footer][privacy]' type='text' value='" . esc_attr($val) . "' />";
}
function carsada_settings_footer_contact_us()
{
    $options = get_option('carsada_options');
    $val = (isset($options['footer']['contact_us']) ? $options['footer']['contact_us'] : "");
    echo "<input id='carsada_settings_contact_us' class='regular-text' name='carsada_options[footer][contact_us]' type='text' value='" . esc_attr($val) . "' />";
}

/**
 * EMAILS
 */
function carsada_settings_section_email()
{
    echo '<p>Here you can set all the options for emails</p>';
}
function carsada_settings_email_billing()
{
    $options = get_option('carsada_options');
    $val = (isset($options['email']['billing']) ? $options['email']['billing'] : "");
    echo "<input id='carsada_settings_billing' class='regular-text' name='carsada_options[email][billing]' type='text' value='" . esc_attr($val) . "' />";
}
function carsada_settings_email_footer()
{
    $options = get_option('carsada_options');
    $val = (isset($options['email']['footer']) ? $options['email']['footer'] : "");
    echo "<input id='carsada_settings_footer' class='regular-text' name='carsada_options[email][footer]' type='text' value='" . esc_attr($val) . "' />";
}
function carsada_settings_email_support()
{
    $options = get_option('carsada_options');
    $val = (isset($options['email']['support']) ? $options['email']['support'] : "");
    echo "<input id='carsada_settings_support' class='regular-text' name='carsada_options[email][support]' type='text' value='" . esc_attr($val) . "' />";
}
function carsada_settings_email_dev_contact()
{
    $options = get_option('carsada_options');
    $val = (isset($options['email']['dev_contact']) ? $options['email']['dev_contact'] : "");
    echo "<input id='carsada_settings_dev_contact' class='regular-text' name='carsada_options[email][dev_contact]' type='text' value='" . esc_attr($val) . "' />";
}
/**
 * MAILCHIMP
 */
function carsada_settings_section_mailchimp()
{
    echo '<p>Here you can set all the options for Mailchimp</p>';
}
function carsada_settings_mailchimp_api_key()
{
    $options = get_option('carsada_options');
    $val = (isset($options['mailchimp']['api_key']) ? $options['mailchimp']['api_key'] : "");
    echo "<input id='carsada_settings_mailchimp_api_key' class='regular-text' name='carsada_options[mailchimp][api_key]' type='text' value='" . esc_attr($val) . "' />";
}
function carsada_settings_mailchimp_url()
{
    $options = get_option('carsada_options');
    $val = (isset($options['mailchimp']['url']) ? $options['mailchimp']['url'] : "");
    echo "<input id='carsada_settings_mailchimp_url' class='regular-text' name='carsada_options[mailchimp][url]' type='text' value='" . esc_attr($val) . "' />";
}

/**
 * OTHER CARSADA SETTINGS
 */
function carsada_settings_section_other_carsada()
{
    echo '<p>Here you can set all the options for other carsada settings</p>';
}
function carsada_settings_other_carsada_terms()
{
    $options = get_option('carsada_options');
    $val = (isset($options['other_carsada']['terms']) ? $options['other_carsada']['terms'] : "3,4,5");
    echo "<input id='carsada_settings_other_carsada_terms' class='regular-text' name='carsada_options[other_carsada][terms]' type='text' value='" . esc_attr($val) . "' />";
    echo "<small style='display: block;'>Add comma (,) for multiple items (e.g 3,4,5) </small>";
}
function carsada_settings_other_carsada_downpayment()
{
    $options = get_option('carsada_options');
    $val = (isset($options['other_carsada']['downpayment']) ? $options['other_carsada']['downpayment'] : "15,20,30,40,50,60,70");
    echo "<input id='carsada_settings_other_carsada_downpayment' class='regular-text' name='carsada_options[other_carsada][downpayment]' type='text' value='" . esc_attr($val) . "' />";
    echo "<small style='display: block;'>Add comma (,) for multiple items (e.g 15,20,30,40,50,60,70) </small>";
}
function carsada_settings_other_carsada_period()
{
    $options = get_option('carsada_options');
    $val = (isset($options['other_carsada']['period']) ? $options['other_carsada']['period'] : "1,2,3,4,5");
    echo "<input id='carsada_settings_other_carsada_period' class='regular-text' name='carsada_options[other_carsada][period]' type='text' value='" . esc_attr($val) . "' />";
    echo "<small style='display: block;'>Add comma (,) for multiple items (e.g 1,2,3,4,5) </small>";
}
function carsada_settings_other_carsada_interest()
{
    $options = get_option('carsada_options');
    $val = (isset($options['other_carsada']['interest']) ? $options['other_carsada']['interest'] : "1,2,3,4,5,6,7,8,9,10,11,12");
    echo "<input id='carsada_settings_other_carsada_interest' class='regular-text' name='carsada_options[other_carsada][interest]' type='text' value='" . esc_attr($val) . "' />";
    echo "<small style='display: block;'>Add comma (,) for multiple items (e.g 1,2,3,4,5,6,7,8,9,10,11,12) </small>";
}

function carsada_settings_other_carsada_time()
{
    $options = get_option('carsada_options');    
    $val = (isset($options['other_carsada']['time']) ? $options['other_carsada']['time'] : "");
    echo "<input id='carsada_settings_other_carsada_time' class='regular-text' name='carsada_options[other_carsada][time]' type='text' value='" . esc_attr($val) . "' />";    echo "<small style='display: block;'>Add comma (,) for multiple items (e.g 1,2,9,10,11) </small>";
}