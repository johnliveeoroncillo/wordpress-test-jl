<?php
use Elementor\Utils;
class CarLeaderReview extends \Elementor\Widget_Base {
	public function get_name() {
		return 'CarleaderReviews';
	}
	public function get_title() {
		return esc_html__( 'Carleader Reviews', 'caleader-core' );
	}
	public function get_icon() {
		return 'eicon-testimonial';
	}
	public function get_categories() {
		return [ 'CarLeader' ];
	}
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Car Leader Services', 'caleader-core' ),
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label'   => esc_html__( 'Posts per Page', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 20,
				'step'    => 1,
				'default' => 10,
			]
		);
		$this->add_control(
			'order_by',
			[
				'label'   => esc_html__( 'Order by', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'date'       => esc_html__( 'Date', 'caleader-core' ),
					'ID'         => esc_html__( 'ID', 'caleader-core' ),
					'author'     => esc_html__( 'Author', 'caleader-core' ),
					'title'      => esc_html__( 'Title', 'caleader-core' ),
					'modified'   => esc_html__( 'Modified', 'caleader-core' ),
					'rand'       => esc_html__( 'Random', 'caleader-core' ),
					'menu_order' => esc_html__( 'Menu order', 'caleader-core' ),

				],
				'default' => esc_html__( 'ID', 'caleader-core' ),
			]
		);
		$this->add_control(
			'sort_by',
			[
				'label'   => esc_html__( 'Sort By', 'caleader-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'desc' => esc_html__( 'desc', 'caleader-core' ),
					'asc'  => esc_html__( 'asc', 'caleader-core' ),

				],
				'default' => esc_html__( 'desc', 'caleader-core' ),
			]
		);

		$this->end_controls_section();

	}


	protected function render() {
		$settings       = $this->get_settings_for_display();
		$posts_per_page = $settings['posts_per_page'];
		$order_by       = $settings['order_by'];
		$sort_by        = $settings['sort_by'];
		$paged          = 2;
		?>

		<?php
			$args = array(
				'post_type'      => 'carleader_review',
				'posts_per_page' => $posts_per_page,
				'paged'          => 1,
				'post_status'    => 'publish',
				'orderby'        => $order_by,
				'order'          => $sort_by,
			);
			?>

		<div class="pt-wrapper-masonry">
			<div class="pt-portfolio-content layout-default pt-grid-col-3 pt-add-item tt-list-review ajax-more-posts-review">
				<?php

				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) {
					while ( $loop->have_posts() ) :
						$loop->the_post();
						$post_id = get_the_ID();
						$rating  = get_post_meta( $post_id, 'carleader_review_review_rating', true );
						?>
				<div class="element-item">
					<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" class="tt-item">
						<div class="tt-item-img">
						<?php if ( has_post_thumbnail( $post_id ) ) { ?>
									<?php echo get_the_post_thumbnail( $post_id, array( 290, 205 ) ); ?>
						<?php } ?>
						</div>
						<div class="tt-item-content">
							<div class="tt-title">
								<span><?php echo get_post_meta( $post_id, 'carleader_review_review_name', true ); ?></span>
								<?php echo get_post_meta( $post_id, 'carleader_review_review_car', true ); ?>
							</div>
							<div class="tt-rating">
									<?php
									for ( $i = 1;$i <= 5;$i++ ) {
										if ( $i <= $rating ) {
											echo '<i class="icon-118669"></i>';
										}
									}
									?>
								</div>						
							<?php echo the_content(); ?>	
						</div>
					</a>
				</div>
							<?php
							endwhile;
				} else {
					echo esc_html__( 'No Reviews found' );
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php if ( $loop->have_posts() ) { ?>
		<div class="text-center division-more-review-ajax">
		<input type="hidden" class="review-post-per-page" value="<?php echo $posts_per_page; ?>">
			<input type="hidden" class="review-page-count" value="<?php echo $paged; ?>">
			<input type="hidden" class="review-page-nonce" value="<?php echo wp_create_nonce( 'load_more_posts' ); ?>">
			<a href="javascript:void(0)" class="btn-border btn-top review-ajax-more"><?php echo esc_html__( 'more testimonials', 'caleader-core' ); ?> <span class="icon-right icon-arrowdown"></span></a>
		</div>
		<?php } ?>


		<div class="container-indent leave-review-section" id="js-transition01">
				<div class="tt-block-title">
					<h3 class="tt-title">
						<?php esc_html_e( 'Leave Your Review', 'caleader-core' ); ?>
					</h3>
				</div>	
				<form class="tt-form-default tt-form-review" id="carleaderreviewForm" method="post" >
					<?php wp_nonce_field( 'carleader_review_submit_ajax', 'carleader_review_submit_nonce' ); ?>
					<div class="row justify-content-center">
						<div class="col-xl-9">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="send-name" class="form-control" placeholder="Your name*" required style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="email" name="send-email" class="form-control" placeholder="Your E-mail*" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="send-car" class="form-control" placeholder="Your phone" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="send-car" class="form-control" placeholder="Your car" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<textarea name="send-review" class="form-control" placeholder="Review"></textarea>
							</div>
							<div class="tt-wrapper-rating">
								<input type="hidden" id="send-review-by-star-input" name="rating" class="form-control" value="">
								<div class="tt-rating send-review-by-star">
									<i data-value="1" class="icon-star icon-118669"></i>
									<i data-value="2" class="icon-star icon-118669"></i>
									<i data-value="3" class="icon-star icon-118669"></i>
									<i data-value="4" class="icon-star icon-118669"></i>
									<i data-value="5" class="icon-star icon-118669"></i>
								</div>
								<div class="tt-rating-value"><?php esc_html_e( '5 Stars', 'caleader-core' ); ?></div>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-wide"><?php printf( esc_html__( 'leave your review', 'caleader-core' ) ); ?> </button>
							</div>
							<div class="leave-review-alert">
								
							</div>
						</div>
					</div>
				</form>				
		</div>		
		<?php

	}



}
	  // Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CarLeaderReview() );
