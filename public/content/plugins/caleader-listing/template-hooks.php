<?php
add_action( 'carleader_listings_before_listings_loop', 'carleader_listings_ordering', 10 );
add_action( 'carleader_listings_search_box', 'carleader_listings_searchBox', 10 );
add_action( 'carleader_listings_product_loop', 'carleader_listings_productLoop', 10 );
add_action( 'carleader_listings_after_listings_loop', 'carleader_listings_pagination', 10 );
add_action( 'carleader_listings_add_to_cart_button', 'carleader_listings_cart_button', 10, 6 );
add_action( 'caleader_listings_check_post_type', 'caleader_listings_checkpost_type', 10, 6 );
add_action( 'caleader_listings_get_post_type', 'caleader_listings_getpost_type', 10, 6 );
add_action( 'caleader_listings_check_option', 'caleader_listings_checkoption', 10, 6 );
