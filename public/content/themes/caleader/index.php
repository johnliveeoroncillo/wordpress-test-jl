<?php
 get_header();
 $breadcrumbs = caleader_options( 'breadcrumbs' );

if (!is_front_page()) {

    ?>
    <div class="tt-subpages-wrapper">
    	<h1 class="tt-title"><?php echo esc_html(get_the_title(get_option('page_for_posts', true))); ?></h1>
    	<?php if($breadcrumbs){ ?>
			<div class="tt-breadcrumb">
				<ul>
					<?php
					if ( function_exists( 'bcn_display' ) ) {
						bcn_display();
					}
					?>
				</ul>
			</div>
		<?php } ?>
    </div>
    <?php
}
?>

<?php
if(is_active_sidebar('blog_sideber')){
	$leftclass='col-sm-12 col-md-8 col-lg-9 blog-center-right';
	$rightclass='col-sm-12 col-md-4 col-lg-3 rightColumn';
	$has_sidebar=true;
}else{
	$leftclass='col-sm-12 col-md-12 blog-center';
	$rightclass='';
	$has_sidebar=false;
}
?>
<div id="tt-pageContent">
<div class="section-wrapper-01">
	<div class="container-indent">
		<div class="container">
			<div class="row">
				<div class="<?php echo esc_attr($leftclass); ?>">
					<div class="tt-listing-post">
					<?php
					if (have_posts()) :
						while ( have_posts() ) {
							the_post();
							get_template_part( "post-formats/content", get_post_format() );
						}
					else :
						get_template_part('post-formats/content', 'none');
					endif;	
					?>
					</div>
					<?php
						$pagination_blog = get_the_posts_pagination();
						if ($pagination_blog) :
							?>
							<div class="tt-pagination">
								<?php
								the_posts_pagination(array(
									'mid_size' => 2,
									'prev_text' => '←',
									'next_text' => '→'
								));
								?>
							</div>
					<?php endif; ?>
				</div>
				<?php if($has_sidebar){?>
					<div class="divider divider-lg d-block d-md-none"></div>
					<div class="<?php echo esc_attr($rightclass); ?>">
						<?php get_sidebar();?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
</div>
<?php get_footer();