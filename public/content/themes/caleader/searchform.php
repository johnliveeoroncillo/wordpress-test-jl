<?php
/**
 * The template for displaying search results pages
 *
 *
 * @package Caleader
 */

get_header(); ?>
<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
<div class="sidebar-search sidebar-widget">
    <div class="widget-content">
        <div class="tt-searcher-aside">
            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="search"  class="search-field form-control" placeholder="<?php esc_attr_e( 'Search','caleader' ); ?>" value="<?php echo get_search_query(); ?>" name="s"  required>
                <button type="submit" class="tt-btn"><span class="icon-musica-searcher"></span></button>
            </form>
        </div>
    </div>
</div>