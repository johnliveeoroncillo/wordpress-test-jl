<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Caleader
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset=<?php bloginfo( 'charset' ); ?>>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php
	if ( function_exists( 'has_site_icon' ) && has_site_icon() ) { // since 4.3.0
		wp_site_icon();
	} else {
		?>
			<link rel="shortcut icon" href="<?php echo get_theme_file_uri(); ?>/assets/images/favicon.ico" type="image/x-icon"/>
		<?php
	}
	?>
		 
	<?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
$header_layout = caleader_options( 'header_style' );
get_template_part( 'template-part/header/layout', $header_layout );
