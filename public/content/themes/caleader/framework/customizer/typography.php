<?php

$fields[] = array(
	'type'     => 'typography',
	'settings' => 'body_fonts',
	'label'    => esc_html__( 'Body Font', 'caleader' ),
	'section'  => 'typography',
	'default'  => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#333333',
		'text-transform' => 'none',
		'text-align'     => 'left',
	),
	'priority' => 10,
	'output'   => array(
		array(
			'element' => 'body',
		),
		array(
			'element' => '.tt-searcher-aside input',
		),
		array(
			'element' => '.tt-searcher-aside input',
		),
		array(
			'element' => '.tt-list03 li',
		),
		array(
			'element' => '.tt-aside-promo .tt-wrapper p',
		),
	),
);


$fields[] = array(
	'type'     => 'typography',
	'settings' => 'title_fonts',
	'label'    => esc_html__( 'Post Title Font', 'caleader' ),
	'section'  => 'typography',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => 'sans-serif',
		'font-size'      => '32px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#333333',
		'text-transform' => 'none',
		'text-align'     => 'left',
	),
	'priority' => 10,
	'output'   => array(
		array(
			'element' => '.singlepost-wrapper .tt-title',
		),
		array(
			'element' => '.caleader-blog-listing .tt-post .tt-layout .tt-title a',
		),
	),
);

$fields[] = array(
	'type'     => 'typography',
	'settings' => 'listing_fonts',
	'label'    => esc_html__( 'Page and Listing Title Font', 'caleader' ),
	'section'  => 'typography',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => 'sans-serif',
		'font-size'      => '42px',
		'line-height'    => '1.25',
		'letter-spacing' => '0',
		'text-transform' => 'none',
	),
	'priority' => 10,
	'output'   => array(
		array(
			'element' => '.tt-title-single .tt-title',
		),
		array(
			'element' => '.tt-block-title .tt-title',
		),
		array(
			'element' => '.tt-subpages-wrapper .tt-title',
		),
		array(
			'element' => '.tt-aside-promo .tt-wrapper .tt-value',
		),
	),
);

$fields[] = array(
	'type'     => 'typography',
	'settings' => 'listing_comp_fonts',
	'label'    => esc_html__( 'Listing Component Fone', 'caleader' ),
	'section'  => 'typography',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => 'sans-serif',
		'font-size'      => '21px',
		'line-height'    => '1.2',
		'color'          => '#222222',
		'letter-spacing' => '0',
		'text-transform' => 'none',
		'text-align'     => 'left',
	),
	'priority' => 10,
	'output'   => array(
		array(
			'element' => '.tt-title-subpages',
		),
		array(
			'element' => '.tt-title-single-sub',
		),
		array(
			'element' => '.tt-product-02.tt-view .tt-wrapper-description .tt-box-title .tt-title',
		),
		array(
			'element' => '.tt-product-02 .tt-wrapper-description .tt-box-price .tt-price',
		),
		array(
			'element' => '.tt-skinSelect-01 .SumoSelect>.CaptionCont>span.placeholder',
		),
		array(
			'element' => '.tt-skinSelect-01 .SumoSelect>.CaptionCont>span',
		),
		array(
			'element' => '.tt-form-default input[type=search]',
		),
	),
);


$fields[] = array(
	'type'     => 'typography',
	'settings' => 'sidebar_title_fonts',
	'label'    => esc_html__( 'Sidebar and Component Title Font', 'caleader' ),
	'section'  => 'typography',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => '600',
		'font-size'      => '21px',
		'line-height'    => '1.3',
		'letter-spacing' => '0',
		'text-transform' => 'none',
		'text-align'     => 'left',
	),
	'priority' => 10,
	'output'   => array(
		array(
			'element' => '.tt-block02-aside .tt-block02-title',
		),
		array(
			'element' => '#tt-header.tt-header-01 .tt-searcher .tt-dropdown-menu .tt-search-input',
		),
		array(
			'element' => '.tt-aside-calculator .tt-calculator-title',
		),
		array(
			'element' => '.tt-aside03-box h6.tt-aside03-title',
		),
		array(
			'element' => '.tt-title-sub.tt-title-top',
		),
		array(
			'element' => '.tt-label-aside .tt-title',
		),
		array(
			'element' => '.tt-aside02 .tt-aside-box .tt-aside-title',
		),
		array(
			'element' => '.widget_smart_posts_grid .tt-post .tt-layout .tt-title a',
		),
		array(
			'element' => '.tt-post .tt-layout .tt-title a',
		),
	),
);

$fields[] = array(
	'type'     => 'typography',
	'settings' => 'modal_title_fonts',
	'label'    => esc_html__( 'Modal Title Font', 'caleader' ),
	'section'  => 'typography',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => '600',
		'font-size'      => '21px',
		'line-height'    => '1.3',
		'letter-spacing' => '0',
		'color'          => '#222222',
		'text-transform' => 'none',
		'text-align'     => 'left',
	),
	'priority' => 10,
	'output'   => array(
		array(
			'element' => '.modal .modal-body .modal-title',
		),
	),
);


$fields[] = array(
	'type'     => 'typography',
	'settings' => 'menu_fonts',
	'label'    => esc_html__( 'Menu Font', 'caleader' ),
	'section'  => 'typography',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => '600',
		'font-size'      => '15px',
		'line-height'    => '1.3',
		'letter-spacing' => '0',
		'color'          => '#222222',
		'text-transform' => 'none',
		'text-align'     => 'left',
	),
	'priority' => 10,
	'output'   => array(
		array(
			'element' => '#tt-footer:not([class^="tt-footer"]) #tt-footer-menu ul li a',
		),
		array(
			'element' => '#tt-header.tt-header-01 #tt-desctop-menu nav>ul>li a',
		),
		array(
			'element' => '.tt-comments-layout .tt-item div.comment .tt-content .comment-reply-link',
		),
		array(
			'element' => '.tt-form-default label',
		),
	),
);

$fields[] = array(
	'type'     => 'typography',
	'settings' => 'add_bt_fonts',
	'label'    => esc_html__( 'Button Font', 'caleader' ),
	'section'  => 'typography',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => '600',
		'font-size'      => '15px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'color'          => '#ffffff',
		'text-transform' => 'none',
		'text-align'     => 'center',
	),
	'priority' => 10,
	'output'   => array(
		array(
			'element' => '#tt-header.tt-header-01 .btn.btn-toggle-modal',
		),
		array(
			'element' => '.btn',
		),
		array(
			'element' => '.rwmb-form-submit button',
		),
		array(
			'element' => '.tt-product-02 .tt-wrapper-description .tt-btn .tt-btn-moreinfo',
		),
		array(
			'element' => '.tt-product-02.tt-view .tt-wrapper-description .tt-box-title .tt-description',
		),
	),
);

$fields[] = array(
	'type'     => 'typography',
	'settings' => 'foot_fonts',
	'label'    => esc_html__( 'Footer Title Font', 'caleader' ),
	'section'  => 'typography',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => '600',
		'font-size'      => '14px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'color'          => '#ffffff',
		'text-transform' => 'none',
		'text-align'     => 'left',
	),
	'priority' => 10,
	'output'   => array(
		array(
			'element' => '#tt-footer.tt-footer-02 .tt-box-info .tt-ttile',
		),
	),
);
