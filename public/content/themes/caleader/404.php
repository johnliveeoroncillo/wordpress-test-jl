<?php get_header();
if(!is_front_page()){
	if (function_exists('caleader_breadcrumb_custom')) {	 
		caleader_breadcrumb_custom();	
	}
}
?>
<div id="tt-pageContent">
	<div class="container-indent-04">
		<div class="container">
			<div class="tt-block-title tt-sub-pages">
				<h1 class="tt-title"><?php esc_html_e( '404 - Nothing Found', 'caleader' ); ?></h1>
				<div class="tt-description"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'caleader' ); ?></div>
				<a href="<?php echo esc_url( home_url( '/' )) ?>" class="btn btn-white"> <?php echo esc_html__('Go to home', 'caleader') ?></a>
			</div>
		</div>
	</div>
</div>
<?php get_footer();