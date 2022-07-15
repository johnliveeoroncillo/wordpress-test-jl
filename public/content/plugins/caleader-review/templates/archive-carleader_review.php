<?php get_header();
if (function_exists('caleader_breadcrumb_custom')) {	 
	caleader_breadcrumb_custom();
}
?>
<div class="container-indent-04">
		<div class="container">
			<div class="tt-block-title">
				<h3 class="tt-title"><?php echo esc_html__('Our Testimonials','cardealer-review');  ?></h3>
			</div>
			<div class="row">
				<div class="col-12 col-lg-8">
					<div class="tt-list-review">
                    <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        $post_id = get_the_ID();
                        $rating = get_post_meta($post_id, 'carleader_review_review_rating', true);
                    ?> 
						<div class="tt-item">
							<div class="tt-col-img">
                            <?php if ( has_post_thumbnail( $post->ID ) ) {  ?>
                                    <?php echo get_the_post_thumbnail( $post_id ,array(228, 150) ); ?>
                        <?php } ?>
							</div>
							<div class="tt-col-description">
								<h6 class="tt-title"><?php echo get_post_meta($post_id, 'carleader_review_review_name', true); ?>,<span> 2018 Chevrolet Malibu</span></h6>
								<div class="tt-rating">
									<?php 
									for($i=1;$i<=5;$i++){
										if($i<=$rating){
											echo '<i class="icon-star-full"></i>';
										}else{
											echo '<i class="icon-star-empty"></i>';
										}
									} 
									?>
								</div>
								<?php echo the_content() ?>
							</div>
						</div>
                 <?php
                endwhile;
                    else :
                    endif;
                ?>
					</div>
					<?php 
					global $wp_query;
					if($wp_query->max_num_pages > 1){
					?>
					<div class="tt-pagination">
                    <?php
						
							echo paginate_links( array(
								'base' 		=> @add_query_arg('paged','%#%'),
								'format' 	=> '?paged=%#%',
								'mid-size' 	=> 1,
								'add_args'  => false,
								'current' 	=> ( get_query_var('paged') ) ? get_query_var('paged') : 1,
								'total' 	=> ( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1,
								'prev_text' => '&larr;',
								'next_text' => '&rarr;',
								'type'      => 'list',
								'end_size'  => 3,
							) );
					?>
					</div>
					<?php } ?>
				</div>
				<div class="col-12 col-lg-4 asideColumn asideColumn-right">
					<div class="tt-block-aside">
						<h3 class="tt-aside-title"><?php echo sprintf(__('%s', 'bastel-review'), 'Leave your Review'); ?> </h3>
                        <form class="tt-form-default02 tt-form-review" id="carleaderreviewForm" method="post" >
                        <?php wp_nonce_field('carleader_review_submit_ajax', 'carleader_review_submit_nonce'); ?>
						<div class="tt-aside-content">
	
								<div class="tt-form-aside">
									<div class="form-group">
										<input type="text" name="send-name" class="form-control" placeholder="Your name*" required style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
									</div>
									<div class="form-group">
										<input type="email" name="send-email" class="form-control" placeholder="E-mail*" required>
									</div>
									<div class="form-group">
										<input type="text" name="send-car" class="form-control" placeholder="Your car" required>
									</div>
									<div class="form-group">
										<input type="text" name="send-review" class="form-control" placeholder="Review" required>
									</div>
									<input type="hidden" id="send-review-by-star-input" name="rating" class="form-control" value="">
									<div class="tt-rating send-review-by-star">
										<i data-value="1" class="icon-star-empty"></i>
										<i data-value="2" class="icon-star-empty"></i>
										<i data-value="3" class="icon-star-empty"></i>
										<i data-value="4" class="icon-star-empty"></i>
										<i data-value="5" class="icon-star-empty"></i>
									</div>
									<button type="submit" class="btn btn-wide"><?php printf(esc_html__('LEAVE REVIEW', 'cardealer-review')); ?> </button>
								</div>
						</div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>