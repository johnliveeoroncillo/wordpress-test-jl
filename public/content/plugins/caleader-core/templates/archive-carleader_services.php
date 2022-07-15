<?php get_header(); ?>
<div class="container-indent-04">
		<div class="container">
			<div class="tt-block-title tt-sub-pages">
				<h1 class="tt-title"><?php echo esc_html__('Our Services:', 'caleader-core'); ?></h1>
				<div class="tt-description"><?php echo esc_html__('What we offer for our clients:', 'caleader-core'); ?></div>
			</div>
			<div class="row tt-promo-list">
            <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        $post_id = get_the_ID();
                        $rating = get_post_meta($post_id, 'carleader_review_review_rating', true);
                        $icon = get_post_meta(get_the_ID(), 'framework_service_icon', true);
                        $short_description = get_post_meta(get_the_ID(), 'framework_service_short_description', true);
            ?> 
				<div class="col-12 col-sm-6">
					<a href="<?php the_permalink();?>" class="tt-promo">
                    <?php  
                    $attachement = wp_get_attachment_image_src(get_post_thumbnail_id(), 'carleader-services-thumbnail');
                    ?>
                    <img src="<?php if ($attachement != array()) {  echo esc_url($attachement[0]);} ?>" alt="">
						<div class="tt-description">
							<div class="tt-icon <?php echo $icon;?>"></div>
							<div class="tt-title">
                            <?php echo the_title() ?>
							</div>
							<div class="tt-text">
                            <?php 
                            if(!empty($short_description)) {
                                echo $short_description;
                            }else{
                                the_content();
                            }
                            ?>
							</div>
						</div>
					</a>
				</div>
                <?php
                endwhile;
                    else :
                    endif;
                ?>
                <?php
                    the_posts_pagination(array(
                        'prev_text' => esc_html__('&laquo; Previous', 'cardealer-core'),
                        'next_text' => esc_html__('Next &raquo;', 'cardealer-core'),
                        'before_page_number' => '',
                        'screen_reader_text' => ' ',
                    ));
	            ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>