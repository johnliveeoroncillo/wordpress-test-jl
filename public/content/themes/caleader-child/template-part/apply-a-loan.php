<?php

get_header();

$post = get_page_by_title('Apply a Loan', OBJECT, 'page');
$content = apply_filters('the_content', $post->post_content); 
echo $content;

get_footer();