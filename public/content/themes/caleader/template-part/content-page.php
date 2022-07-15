<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		?>
		<div class="page-content-section">
		<?php the_content() ; ?>
		</div>
		<?php

		wp_link_pages( array(
			'before' => '<div class="tt-page-pagination">' ,
			'after'  => '</div>',
			'link_before'      => '<span>',
			'link_after'       => '</span>',
		) );

	}

}