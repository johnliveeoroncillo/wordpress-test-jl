<?php get_header();
if ( ! is_front_page() ) {
    if ( function_exists( 'caleader_breadcrumb_custom' ) ) {
        caleader_breadcrumb_custom();
    }
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
                    <div class="tt-pagination">
                        <?php
                        //global $wp_query;
                        echo paginate_links( array(
                            'base'      => @add_query_arg('paged','%#%'),
                            'format'    => '?paged=%#%',
                            'mid-size'  => 1,
                            'add_args'  => true,
                            'current'   => ( get_query_var('paged') ) ? get_query_var('paged') : 1,
                            'total'     => ( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1,
                            'prev_text' => '&larr;',
                            'next_text' => '&rarr;',
                            'type'      => 'list',
                            'end_size'  => 3,
                        ) );
                    ?>
                    </div>
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