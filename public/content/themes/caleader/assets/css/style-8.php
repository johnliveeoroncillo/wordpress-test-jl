<?php
function caleader_get_custom_styles() {
	 $site_color         = caleader_options( 'site_color' );
	$caleader_custom_css = '';
	if ( $site_color == 'seven' ) {

		$color_setting_hex = caleader_options( 'color_setting_hex' );

		ob_start();
		?>

.mfp-close:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.mfp-arrow:hover,
button.mfp-arrow:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

button.mfp-arrow-right:hover,
button.mfp-arrow-left:hover {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.noUi-horizontal .noUi-handle:before {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.noUi-connect {
	background: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.noUi-horizontal .noUi-handle {
	background: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.datepicker table tr td.today:hover,
.datepicker table tr td.today:hover:hover,
.datepicker table tr td.today.disabled:hover,
.datepicker table tr td.today.disabled:hover:hover,
.datepicker table tr td.today:active,
.datepicker table tr td.today:hover:active,
.datepicker table tr td.today.disabled:active,
.datepicker table tr td.today.disabled:hover:active,
.datepicker table tr td.today.active,
.datepicker table tr td.today:hover.active,
.datepicker table tr td.today.disabled.active,
.datepicker table tr td.today.disabled:hover.active,
.datepicker table tr td.today.disabled,
.datepicker table tr td.today:hover.disabled,
.datepicker table tr td.today.disabled.disabled,
.datepicker table tr td.today.disabled:hover.disabled,
.datepicker table tr td.today[disabled],
.datepicker table tr td.today:hover[disabled],
.datepicker table tr td.today.disabled[disabled],
.datepicker table tr td.today.disabled:hover[disabled] {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.datepicker table tr td.today:active,
.datepicker table tr td.today:hover:active,
.datepicker table tr td.today.disabled:active,
.datepicker table tr td.today.disabled:hover:active,
.datepicker table tr td.today.active,
.datepicker table tr td.today:hover.active,
.datepicker table tr td.today.disabled.active,
.datepicker table tr td.today.disabled:hover.active {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.datepicker table tr td.active,
.datepicker table tr td.active:hover,
.datepicker table tr td.active.disabled,
.datepicker table tr td.active.disabled:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.datepicker table tr td.active:hover,
.datepicker table tr td.active:hover:hover,
.datepicker table tr td.active.disabled:hover,
.datepicker table tr td.active.disabled:hover:hover,
.datepicker table tr td.active:active,
.datepicker table tr td.active:hover:active,
.datepicker table tr td.active.disabled:active,
.datepicker table tr td.active.disabled:hover:active,
.datepicker table tr td.active.active,
.datepicker table tr td.active:hover.active,
.datepicker table tr td.active.disabled.active,
.datepicker table tr td.active.disabled:hover.active,
.datepicker table tr td.active.disabled,
.datepicker table tr td.active:hover.disabled,
.datepicker table tr td.active.disabled.disabled,
.datepicker table tr td.active.disabled:hover.disabled,
.datepicker table tr td.active[disabled],
.datepicker table tr td.active:hover[disabled],
.datepicker table tr td.active.disabled[disabled],
.datepicker table tr td.active.disabled:hover[disabled] {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.datepicker table tr td.active:active,
.datepicker table tr td.active:hover:active,
.datepicker table tr td.active.disabled:active,
.datepicker table tr td.active.disabled:hover:active,
.datepicker table tr td.active.active,
.datepicker table tr td.active:hover.active,
.datepicker table tr td.active.disabled.active,
.datepicker table tr td.active.disabled:hover.active {
	color: <?php echo esc_attr( $color_setting_hex ); ?> \9;
}

.datepicker table tr td span:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.datepicker table tr td span.active,
.datepicker table tr td span.active:hover,
.datepicker table tr td span.active.disabled,
.datepicker table tr td span.active.disabled:hover {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.datepicker table tr td span.active:hover,
.datepicker table tr td span.active:hover:hover,
.datepicker table tr td span.active.disabled:hover,
.datepicker table tr td span.active.disabled:hover:hover,
.datepicker table tr td span.active:active,
.datepicker table tr td span.active:hover:active,
.datepicker table tr td span.active.disabled:active,
.datepicker table tr td span.active.disabled:hover:active,
.datepicker table tr td span.active.active,
.datepicker table tr td span.active:hover.active,
.datepicker table tr td span.active.disabled.active,
.datepicker table tr td span.active.disabled:hover.active,
.datepicker table tr td span.active.disabled,
.datepicker table tr td span.active:hover.disabled,
.datepicker table tr td span.active.disabled.disabled,
.datepicker table tr td span.active.disabled:hover.disabled,
.datepicker table tr td span.active[disabled],
.datepicker table tr td span.active:hover[disabled],
.datepicker table tr td span.active.disabled[disabled],
.datepicker table tr td span.active.disabled:hover[disabled] {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.datepicker thead tr:first-child th:hover,
.datepicker tfoot tr:first-child th:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.datepicker thead th.next:hover i,
.datepicker thead th.prev:hover i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.datepicker td.day.active {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	color: <?php echo esc_attr( $color_setting_hex ); ?>fff !important;
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.btn,
.tt-aside-box form.search-form input[type=submit] {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-block-title .tt-description {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-aside-box form.search-form input[type=search]:focus,
.tt-form-default input[type=text]:focus,
.tt-form-default input[type=email]:focus,
.tt-form-default input[type=number]:focus,
.tt-form-default textarea:focus {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	-webkit-box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
	-moz-box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
	box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-form-default02 input[type=text]:focus,
.tt-form-default02 input[type=email]:focus,
.tt-form-default02 textarea:focus {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.radio:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.checkbox-group:hover label {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-input-file:hover:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	-webkit-box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
	-moz-box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
	box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
}

.nice-select.tt-skin-01:hover {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	-webkit-box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
	-moz-box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
	box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
}

.nice-select.tt-skin-01:active,
.nice-select.tt-skin-01:focus {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	-webkit-box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
	-moz-box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
	box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
}

.nice-select.tt-skin-01 .current span {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.nice-select.tt-skin-01 .option:hover,
.nice-select.tt-skin-01 .option.focus,
.nice-select.tt-skin-01 .option.selected.focus {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.nice-select.tt-skin-02 .current span {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.nice-select.tt-skin-02 .option:hover,
.nice-select.tt-skin-02 .option.focus,
.nice-select.tt-skin-02 .option.selected.focus {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-default-color {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-video-block .link-video:hover:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-list01 li:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-list01 li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-list02 li:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-list02 li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-list03 li:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-list03 li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-link {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-link-back {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.panel-menu ul li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.panel-menu #mm0.mmpanel a:not(.mm-close):hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.panel-menu #mm0.mmpanel a:not(.mm-close):hover:after {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.panel-menu .mm-close:hover,
.panel-menu .mm-prev-level:hover,
.panel-menu .mm-next-level:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.panel-menu .mm-close:hover:before .mm-prev-level:hover:before,
.panel-menu .mm-next-level:hover:after {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.panel-menu li.mm-close-parent .mm-close:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.panel-menu li.mm-close-parent .mm-close:hover:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.panel-menu .mm-prev-level:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.panel-menu .mm-prev-level:hover:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.panel-menu .mm-next-level:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
	background-color: transparent;
}

.panel-menu .mm-next-level:hover:after {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.panel-menu .mm-original-link:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.panel-menu .mm-original-link:hover:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-box-info li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-box-info li i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-dropdown-obj .tt-dropdown-toggle {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-searcher .tt-dropdown-menu {
	border-bottom: 3px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-searcher .tt-dropdown-menu .tt-btn-search:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-searcher .tt-dropdown-menu .tt-btn-close:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-cart .tt-dropdown-toggle {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-cart .tt-dropdown-menu {
	border-bottom: 3px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-cart .tt-dropdown-menu .tt-dropdown-title .tt-btn-close {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-cart .tt-dropdown-menu .tt-search-results li a:hover .tt-description .tt-title {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-cart .tt-dropdown-menu .tt-search-results li .tt-close-item:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-account .tt-dropdown-toggle {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-account .tt-dropdown-menu {
	border-bottom: 3px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-account .tt-dropdown-menu .tt-row-close .tt-btn-close:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-account .tt-dropdown-menu ul li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-mobile-quickLinks .row .col a.btn-toggle {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .quickLinks-map address i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .quickLinks-address i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 .tt-menu-toggle:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 #tt-desctop-menu nav>ul>li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 #tt-desctop-menu nav>ul>li.is-active>a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 #tt-desctop-menu nav>ul>li.is-active>a:after {
	border-top-color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

#tt-header.tt-header-01 #tt-desctop-menu nav>ul ul {
	border-bottom: 3px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 #tt-desctop-menu nav>ul ul li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-01 #tt-desctop-menu nav>ul ul li.is-active>a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-stuck #tt-desctop-menu nav>ul>li.is-active>a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-stuck #tt-desctop-menu nav>ul>li.is-active>a:after {
	border-top-color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

#tt-stuck #tt-desctop-menu nav>ul ul li.is-active>a {
	color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

#tt-header.tt-header-02 .tt-box-info li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-box-info li i {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-dropdown-obj .tt-dropdown-toggle {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-searcher .tt-dropdown-menu {
	border-bottom: 3px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-searcher .tt-dropdown-menu .tt-btn-search:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-searcher .tt-dropdown-menu .tt-btn-close:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-cart .tt-dropdown-toggle {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-cart .tt-dropdown-menu {
	border-bottom: 3px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-cart .tt-dropdown-menu .tt-dropdown-title .tt-btn-close {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-cart .tt-dropdown-menu .tt-search-results li a:hover .tt-description .tt-title {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-cart .tt-dropdown-menu .tt-search-results li .tt-close-item:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-account .tt-dropdown-toggle {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-account .tt-dropdown-menu {
	border-bottom: 3px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-account .tt-dropdown-menu .tt-row-close .tt-btn-close:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-account .tt-dropdown-menu ul li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-mobile-quickLinks .row .col a.btn-toggle {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .quickLinks-map address i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .quickLinks-address i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 .tt-menu-toggle:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 #tt-desctop-menu nav>ul>li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 #tt-desctop-menu nav>ul>li.is-active>a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 #tt-desctop-menu nav>ul>li.is-active>a:after {
	border-top-color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

#tt-header.tt-header-02 #tt-desctop-menu nav>ul ul {
	border-bottom: 3px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 #tt-desctop-menu nav>ul ul li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 #tt-desctop-menu nav>ul ul li.is-active>a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 #tt-stuck #tt-desctop-menu nav>ul>li.is-active>a {
	color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

#tt-header.tt-header-03 .tt-box-info li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-box-info li i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-dropdown-obj .tt-dropdown-toggle {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-searcher .tt-dropdown-menu {
	border-bottom: 3px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-searcher .tt-dropdown-menu .tt-btn-search:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-searcher .tt-dropdown-menu .tt-btn-close:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-cart .tt-dropdown-toggle {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-cart .tt-dropdown-menu {
	border-bottom: 3px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-cart .tt-dropdown-menu .tt-dropdown-title .tt-btn-close {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-cart .tt-dropdown-menu .tt-search-results li a:hover .tt-description .tt-title {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-cart .tt-dropdown-menu .tt-search-results li .tt-close-item:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-account .tt-dropdown-toggle {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-account .tt-dropdown-menu {
	border-bottom: 3px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-account .tt-dropdown-menu .tt-row-close .tt-btn-close:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-account .tt-dropdown-menu ul li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-mobile-quickLinks .row .col a.btn-toggle {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .quickLinks-map address i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .quickLinks-address i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 .tt-menu-toggle:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 #tt-desctop-menu nav>ul>li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 #tt-desctop-menu nav>ul>li.is-active>a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 #tt-desctop-menu nav>ul>li.is-active>a:after {
	border-top-color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

#tt-header.tt-header-03 #tt-desctop-menu nav>ul ul {
	border-bottom: 3px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 #tt-desctop-menu nav>ul ul li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 #tt-desctop-menu nav>ul ul li.is-active>a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-03 #tt-stuck #tt-desctop-menu nav>ul>li.is-active>a {
	color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.mainSlider .slick-arrow:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.loading-dots i {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.loading-dots.dark-gray i {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-search-filter>div.tt-col-title:before {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-search-filter>div.tt-col-title:before {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}


/* tt-brand */

.tt-link-redirect {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
	border: 1px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-link-redirect:hover {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-brand .tt-title:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-brand:hover .tt-title {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-map .tt-btn-toggle:not(.tt-style-02) {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-map .tt-btn-toggle:not(.tt-style-02):hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-map .tt-btn-toggle.tt-style-02:after {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-map .tt-box-map {
	display: none;
}


/* map */

.google-map {
	width: 100%;
	height: 320px;
}


/*  */

.tt-additional-box {
	margin-bottom: -57px;
}


/* short-structure */

@media (max-width: 575px) {
	.ws-short-structure {
		position: relative;
		padding-bottom: 15px;
	}
	.ws-short-structure:not(.is-open) {
		padding-bottom: 0px;
	}
	.ws-short-structure:not(.is-open) .tt-hide-block {
		display: none;
	}
	.ws-short-structure:not(.is-open):after {
		-moz-opacity: 1;
		-khtml-opacity: 1;
		-webkit-opacity: 1;
		opacity: 1;
	}
	.ws-short-structure:after {
		content: '';
		position: absolute;
		bottom: 0px;
		width: 100%;
		height: 43px;
		left: 0;
		-moz-opacity: 0;
		-khtml-opacity: 0;
		-webkit-opacity: 0;
		opacity: 0;
		background: -webkit-linear-gradient(bottom, rgba(255, 255, 255, 0), white 60%);
		background: -o-linear-gradient(bottom, rgba(255, 255, 255, 0), white 60%);
		background: -moz-linear-gradient(bottom, rgba(255, 255, 255, 0), white 60%);
		background: linear-gradient(to bottom, rgba(255, 255, 255, 0), white 60%);
	}
}

@media (min-width: 576px) {
	.ws-short-btn {
		display: none;
	}
}

@media (max-width: 575px) {
	.ws-short-btn .ws-btn-more {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-media-02 .tt-description .tt-title .tt-total {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-media-02 .tt-description .tt-link-marker {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-media-02 .tt-description .tt-link-marker:before {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.portfolio-masonry-layout .extra-link {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-portfolio-masonry .tt-filter-nav .button.active {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
		border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-portfolio-masonry .tt-filter-nav .button:hover {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-portfolio-content .tt-portfolio-item figure figcaption:before {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-portfolio-content .tt-portfolio-item figure figcaption .tt-title span {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-portfolio-content .tt-portfolio-item figure figcaption .tt-price {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-layout01 .tt-item .tt-item-icon {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-layout01 .tt-item .tt-item-content .link-tel {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-layout01-02 .tt-item .tt-item-icon {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-promo-01 .tt-item .box-value {
		border: 7px solid #123913;
	}
	.tt-promo-01 .tt-item .box-value i {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-promo-01 .tt-item .box-value {
		border: 7px solid #123913;
	}
	.tt-promo-01-nowrapper .tt-item .box-value i {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-promo-02-layout .tt-item .box-icon i {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-promo-02-layout .tt-item:hover .box-icon:before {
		border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-promo-02-layout .tt-item-smal:nth-child(2) .box-icon {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-promo-02-layout .tt-item-smal:nth-child(4) .box-icon {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-promo-02-layout .tt-item-smal:nth-child(6) .box-icon {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	@-webkit-keyframes blink {
		50% {
			color: <?php echo esc_attr( $color_setting_hex ); ?>;
		}
	}
	@keyframes blink {
		50% {
			color: <?php echo esc_attr( $color_setting_hex ); ?>;
		}
	}
	.tt-media .tt-layout .tt-title:after {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-media .tt-layout-bottom .tt-icon-link {
		border: 1px solid <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-media .tt-layout-bottom .tt-icon-link:before {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-media .tt-layot .tt-link {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-media .tt-layot .tt-link:after {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.box-reviews .tt-reviews-content .box-show-rating {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.box-reviews .tt-reviews-content02 .tt-border .tt-box-icon {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.box-reviews .tt-reviews-content02 .tt-border .box-show-rating {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-arrow-center .slick-prev:hover,
	.tt-arrow-center .slick-next:hover {
		border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-arrow-center-fluid .slick-prev:hover,
	.tt-arrow-center-fluid .slick-next:hover {
		border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-arrow-center-small .slick-prev:hover,
	.tt-arrow-center-small .slick-next:hover {
		border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.slick-slider .slick-dots li:hover {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.slick-slider .slick-dots li.slick-active {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-slick-nav01 .slick-prev:hover,
	.tt-slick-nav01 .slick-next:hover {
		border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-box-layout02 .tt-item .tt-col-icon .tt-icon {
		background: <?php echo esc_attr( $color_setting_hex ); ?>;
		border-radius: 50%;
	}
	.tt-box-layout03 .tt-item .tt-col-icon {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-box-layout03 .tt-item .tt-col-description {
		-webkit-flex: 2 1 auto;
		-ms-flex: 2 1 auto;
		flex: 2 1 auto;
	}
	.tt-media03 .tt-layot address {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-media03 .tt-layot address i {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-media03:hover .tt-layot .title {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-pagination .btn-pagination:hover {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
		border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-pagination ul li a:hover {
		border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-pagination ul li.active a {
		border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-rating {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.box-aside-info ul:not([class]) li i {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.box-info .tt-item-layout .tt-item .tt-col:first-child i {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.box-info .tt-social-icon li a {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-promo .tt-description .tt-icon {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	body:not(.touch) .tt-promo:hover .tt-icon {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-sub-menu li a:hover {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-sub-menu li.active a {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-faq-layout .tt-faq .tt-title:before {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-faq-layout .tt-faq .tt-title:hover {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-faq-layout .tt-faq.active .tt-title {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-aside-calculator .tt-calculator-title span {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-product-vertical-layout .tt-product-single-carousel-vertical .slick-prev:hover,
	.tt-product-vertical-layout .tt-product-single-carousel-vertical .slick-next:hover {
		border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.product-single-info .tt-wrapper .tt-label .tt-label-instock {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.product-single-info .tt-wrapper .tt-info-list li:before {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.layout-slide .slide-title .btn-close-slide:hover {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.layout-slide .slide-content .col-item .item-close:hover {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-media-box01 .tt-img i {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-media-box01 .tt-description .tt-title span {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-media-box01 .tt-description .tt-link {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-media-box01 .tt-description .tt-link:after {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-defaul-color {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-filters-options .tt-btn-toggle a {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-filters-options .tt-quantity a:hover {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-filters-options .tt-quantity a.active {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
		border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-product .tt-description .tt-title a:hover {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-product .tt-description .tt-btn-addtocart {
		background: <?php echo esc_attr( $color_setting_hex ); ?> !important;
	}
	.tt-product-02 .tt-image-box .tt-img .tt-label-location .tt-label-new {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-product-02 .tt-image-box .tt-img .tt-label-location .tt-label-info02 {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-product-02 .tt-image-box .tt-img .tt-label-custom i {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-product-02 .tt-image-box .tt-icon li a {
		border: 2px solid <?php echo esc_attr( $color_setting_hex ); ?>;
		background-color: transparent;
	}
	.tt-product-02 .tt-wrapper-description .tt-box-title .tt-title a:hover {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-product-02 .tt-wrapper-description .tt-box-price .tt-price {
		color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
	}
	.tt-product-02 .tt-wrapper-description .tt-box-price .tt-info-price {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-product-02 .tt-wrapper-description .tt-icon li a {
		border: 2px solid <?php echo esc_attr( $color_setting_hex ); ?>;
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-product-02 .tt-wrapper-description .tt-icon li a:hover {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-label-aside .tt-icon {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-label-aside .tt-icon {
		background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
}

.tt-product-aside .tt-description .tt-title a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-title-single .tt-title a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-mobile-product-layout .tt-label-location .tt-label-new {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-mobile-product-layout .tt-label-location .tt-label-info02 {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-title-single-sub a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-product-single-img .tt-label-location .tt-label-new {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-product-single-img .tt-label-location .tt-label-info02 {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.video-link-product [class^="icon-"]:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-tabs {
	overflow: hidden;
	margin-top: -15px;
}

.tt-tabs .tt-tabs__head>ul {
	list-style: none;
	padding: 0;
}

.tt-tabs .tt-tabs__head .tt-tabs__btn-prev,
.tt-tabs .tt-tabs__head .tt-tabs__btn-next {
	display: none;
}

.tt-tabs .tt-tabs__body>div {
	display: block;
}

.tt-tabs .tt-tabs__body>div>div {
	display: none;
}

.tt-tabs .tt-tabs__body>div:not(:first-child)>span {
	border-top: solid 1px #dfdfdf;
}

@media only screen and (max-width: 1025px) {
	.tt-tabs .tt-tabs__body>div:hover>span {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-tabs .tt-tabs__body>div.active>span {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
}

@media only screen and (min-width: 1025px) {
	.tt-tabs .tt-tabs__head>ul>li>span:hover {
		display: block;
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
	.tt-tabs .tt-tabs__head>ul>li.active>span {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
		border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
}

.tt-aside-gallery .tt-img-large .tt-label-location .tt-label-new {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-aside-gallery .tt-img-large .tt-label-location .tt-label-info02 {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-aside-gallery .tt-img-thumbnails .tt-more {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.modal .modal-body .close:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-back-to-top {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-back-to-top:hover {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

body:not(.touch) .tt-back-to-top:hover {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-breadcrumb ul li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-breadcrumb ul li:not(:first-child):before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-img-link .tt-wrapper-text i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-img-link:hover .tt-wrapper-text {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-post-content .tt-meta .tt-time a {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-post-content .tt-meta .tt-autor span {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-post-content .tt-title a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-post-content .tt-btn a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-post-content .tt-btn a:after {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-list-arrow li a:before,
.widget_categories ul li a:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-list-arrow li a:hover,
.widget_categories ul li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-list-box li a:hover,
.tags-links a:hover,
.tagcloud a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-list-box li.active a {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-blockquote:before {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-blockquote:after {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-comments-layout .tt-item div[class^="tt-comments-level-"] .tt-avatar:empty:after {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-comments-layout .tt-item div[class^="tt-comments-level-"] .tt-content .tt-comments-title .username {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer:not([class^="tt-footer"]) .tt-footer-copyright a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer:not([class^="tt-footer"]) .tt-footer-copyright a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer:not([class^="tt-footer"]) #tt-footer-menu ul li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer:not([class^="tt-footer"]) #tt-footer-menu ul li.is-active a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer:not([class^="tt-footer"]) .tt-social-icon li a {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer:not([class^="tt-footer"]) .tt-social-icon li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer:not([class^="tt-footer"]) .tt-box-info .tt-item i[class^="icon-"] {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer:not([class^="tt-footer"]) .tt-box-info .tt-item a:not([class]):hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer:not([class^="tt-footer"]) .tt-list-info li i[class^="icon-"] {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer:not([class^="tt-footer"]) .tt-list-info li a:not([class]):hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer:not([class^="tt-footer"]) .mc4wp-form .form-control:focus {
	border-bottom-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer:not([class^="tt-footer"]) .mc4wp-form .tt-btn {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-02 .tt-footer-bottom a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-02 #tt-footer-menu ul li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-02 #tt-footer-menu ul li.is-active a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-02 .tt-social-icon li a {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-02 .tt-social-icon li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-02 .tt-box-info .tt-item i[class^="icon-"] {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-02 .tt-box-info .tt-item a:not([class]):hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-02 .tt-box-info02 .tt-item i[class^="icon-"] {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-02 .tt-box-info02 .tt-item a:not([class]):hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-02 .mc4wp-form .form-control:focus {
	border-bottom-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-02 .mc4wp-form .tt-btn,
#tt-footer.tt-footer-02 .wpcf7-form .tt-btn {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-03 .tt-footer-copyright a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-03 .tt-footer-copyright a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-03 #tt-footer-menu ul li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-03 #tt-footer-menu ul li.is-active a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-03 .tt-social-icon li a {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-03 .tt-social-icon li a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-03 .tt-box-info .tt-item i[class^="icon-"] {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-03 .tt-box-info .tt-item a:not([class]):hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-03 .tt-list-info li i[class^="icon-"] {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-03 .tt-list-info li a:not([class]):hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-03 .subscribe-custom .tt-title i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-03 .subscribe-custom .mc4wp-form .form-control:focus {
	border-bottom-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-footer.tt-footer-03 .subscribe-custom .mc4wp-form .tt-btn {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.mainSlider .tt-caption-custom {
	background-image: url("../images/custom/mainSlider-layout01-color06.png");
}

.tt-colorswatch .tt-colorswatch-btn {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-skinSelect-01 .SumoSelect:hover>.CaptionCont,
.tt-skinSelect-01 .SumoSelect.open>.CaptionCont {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	-webkit-box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
	-moz-box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
	box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-skinSelect-01 .SumoSelect .optWrapper>.options li.opt:hover {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	color: <?php echo esc_attr( $color_setting_hex ); ?>fff;
}

.wpcf7-form input[type="submit"],
.rwmb-form-submit button {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.wpcf7-radio .wpcf7-list-item-label:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.wpcf7-checkbox .wpcf7-list-item-label:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-form-default02 input[type=text]:focus,
.tt-form-default02 input[type=email]:focus,
.tt-form-default02 textarea:focus,
.tt-form-default02 textarea:focus,
.wpcf7-form .wpcf7-form-control-wrap input:focus,
.wpcf7-form .wpcf7-form-control-wrap textarea:focus {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.tt-pagination ul li span.current {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-skinSelect-02 .SumoSelect .optWrapper>.options li.opt:hover {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.textarea-custom:hover,
.textarea-custom:focus,
.input-custom:hover,
.input-custom.focus,
.wpcf7-form-control.wpcf7-textarea:hover,
.wpcf7-form-control.wpcf7-textarea:focus {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.tt-comments-layout .tt-item div[class*="depth-"] .tt-avatar i {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.wpcf7-form input[type="submit"],
.rwmb-form-submit button {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.form-row.place-order button#place_order {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.form-row.place-order {
	border: 1px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

.woocommerce-info {
	border-top-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-search-filter .tt-icon-filter {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-layout .tt-meta .tt-icon {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-layout .tt-meta a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-layout .tt-title a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-layout-bottom:after {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-layout-bottom .tt-icon-link {
	border: 1px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

.singlepost-wrapper .tt-meta .tt-icon {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.singlepost-wrapper .tt-meta a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.singlepost-wrapper .tt-layout-bottom:after {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-breadcrumb ul li:last-child a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

@media (max-width: 766px) {
	.tt-search-filter>div.tt-col-title {
		background: <?php echo esc_attr( $color_setting_hex ); ?> !important;
	}
}

@media (max-width: 1024px) {
	#tt-header.tt-header-02 .tt-mobile-quickLinks .row .col a.btn-toggle {
		color: <?php echo esc_attr( $color_setting_hex ); ?>;
	}
}

.current-menu-ancestor>a {
	color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.current-menu-ancestor>a::after {
	border-top-color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.tt-product-02 .tt-image-box .tt-icon li a:hover {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-promo02 .tt-item:hover .tt-title {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.mainSlider .slide .slide-content .tp-caption-wrapper:after,
.mainSlider .slide .slide-content .tp-caption-wrapper:before,
.mainSlider .slide .slide-content .tp-caption-wrapper .wrapper-marker,
.btn-border:hover,
.tt-list-icon .tt-item-icon,
.portfolio-masonry-layout .extra-link:hover,
.tt-box-layout02 .tt-item .tt-col-icon .tt-icon,
#tt-footer:not([class^="tt-footer-indent"]) .tt-social-icon li a,
.slick-slider .slick-dots li.slick-active,
.tt-media .tt-layout .tt-title:after {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.mainSlider .slide .slide-content .tp-caption-wrapper {
	border-right: 10px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-back-to-top {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.mainSlider .tt-caption-custom:before {
	background: url("../images/custom/mainSlider-layout02-color06.png") 0 0 no-repeat;
}

.mainSlider-layout a.extra-link,
.mainSlider-layout a.extra-link:after,
.tt-search-filter .tt-icon-filter,
.tt-defaul-color,
.tt-img-parallax-left .tt-box-custom01 .tt-icon,
.btn-border,
.portfolio-masonry-layout .extra-link,
.tt-tabs-02 .tt-tabs__head>ul>li.active>span,
.tt-info-icon .tt-item .tt-icon,
.tt-media03 .tt-layot address,
.tt-media03 .tt-layot address i,
#tt-footer:not([class^="tt-footer"]) .tt-footer-copyright a,
.tt-promo02 .tt-icon,
.tt-portfolio-masonry .tt-filter-nav .button.active,
.tt-promo-counter .tt-layout-counter .tt-counter-number,
.tt-media .tt-layout-bottom .tt-icon-link:before,
.tt-portfolio-content .tt-portfolio-item figure figcaption .tt-title span,
.tt-portfolio-content .tt-portfolio-item figure figcaption .tt-price,
.tt-portfolio-content .tt-portfolio-item figure figcaption:before,
.tt-rating {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.btn-border,
.portfolio-masonry-layout .extra-link,
.tt-media .tt-layout-bottom .tt-icon-link {
	border: 1px solid <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.tt-tabs-02 .tt-tabs__head>ul>li.active>span,
.tt-portfolio-masonry .tt-filter-nav .button.active {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.current-menu-ancestor>a {
	color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.current-menu-ancestor>a::after {
	border-top-color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}


/* Caleader Theme Color Green */

.mainSlider .slide .slide-content .tp-caption-wrapper {
	border-right: 10px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

.mainSlider .slide .slide-content .tp-caption-wrapper:before {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.mainSlider .slide .slide-content .tp-caption-wrapper .wrapper-marker {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.mainSlider .slide .slide-content .tp-caption-wrapper:after {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.mainSlider-layout a.extra-link {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.mainSlider-layout a.extra-link:after {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-search-filter .tt-icon-filter {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-skinSelect-01 .SumoSelect:hover>.CaptionCont,
.tt-skinSelect-01 .SumoSelect.open>.CaptionCont {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	-webkit-box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
	-moz-box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
	box-shadow: 0px 0px 1px <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-skinSelect-01 .SumoSelect .optWrapper>.options li.opt:hover {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-img-parallax-left .tt-box-custom01 .tt-icon {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-defaul-color {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-block-title.tt-block-title-border:after {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-back-to-top {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

body:not(.touch) .tt-back-to-top:hover {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.btn-border {
	background: transparent;
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
	border: 1px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

.btn-border:hover {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-media-02 .tt-description .tt-title .tt-total {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-arrow-center-fluid .slick-prev:hover,
.tt-arrow-center-fluid .slick-next:hover {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-media-02 .tt-description .tt-link-marker {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-media-02 .tt-description .tt-link-marker:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.slick-slider .slick-dots li.slick-active {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-promo02 .tt-icon {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-img-parallax-right .tt-box-custom .tt-icon {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.portfolio-masonry-layout .extra-link {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
	border: 1px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

.portfolio-masonry-layout .extra-link:hover {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-portfolio-masonry .tt-filter-nav .button.active {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-portfolio-masonry .tt-filter-nav .button:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-portfolio-content .tt-portfolio-item figure figcaption .tt-title span {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-portfolio-content .tt-portfolio-item figure figcaption .tt-price {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-portfolio-content .tt-portfolio-item figure figcaption:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-list-icon .tt-item-icon {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-promo-counter .tt-layout-counter .tt-counter-number {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-media .tt-layout .tt-title:after {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-media .tt-layout-bottom .tt-icon-link:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-media .tt-layout-bottom .tt-icon-link {
	border: 1px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

.box-reviews02 .tt-reviews-marker:after {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.box-reviews02 .tt-reviews-marker .wrapper-marker {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.box-reviews02 .tt-reviews-marker:before {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.box-reviews02 .tt-reviews-marker .wrapper-marker {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.box-reviews02 .tt-reviews-marker {
	border-left: 10px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-arrow-bottom .slick-prev:hover,
.tt-arrow-bottom .slick-next:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-rating {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.current-menu-ancestor>a {
	color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.tt-sub-menu li a:hover {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-sub-menu li.active a {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.box-aside-info ul:not([class]) li i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-img-caption figure figcaption {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-col-icon .tt-col-icon {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.current-menu-ancestor>a::after {
	border-top-color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.tt-label-aside .tt-icon {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-filters-options .tt-quantity a.active {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	-webkit-box-shadow: 0px 0px 2px rgba(80, 190, 189, 0.8);
	-moz-box-shadow: 0px 0px 2px rgba(80, 190, 189, 0.8);
	box-shadow: 0px 0px 2px rgba(80, 190, 189, 0.8);
}

.tt-product-02 .tt-image-box .tt-icon li a {
	border: 2px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-product-02 .tt-image-box .tt-icon li a:hover {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-product-02 .tt-wrapper-description .tt-box-price .tt-price {
	color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.tt-product-02 .tt-image-box .tt-img .tt-label-location .tt-label-new {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-product-02 .tt-image-box .tt-img .tt-label-location .tt-label-info02 {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-filters-options .tt-quantity a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-product-02 .tt-image-box .tt-img .tt-label-location .tt-label-info02 {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-product-02 .tt-wrapper-description .tt-box-price .tt-info-price {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-product-02 .tt-image-box .tt-img .tt-label-custom i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-pagination ul li span.current,
.tt-pagination ul li.active a {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-pagination ul li a:hover {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-aside-calculator .tt-calculator-title span {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-arrow-center .slick-prev:hover,
.tt-arrow-center .slick-next:hover {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.rwmb-form-submit button {
	background: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.product-single-info .tt-wrapper-single .tt-wrapper .tt-price {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.slick-slider .slick-dots li:hover {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-searcher-aside .tt-btn {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-aside-box ul li a:before,
.side-block ul li a:before,
.tt-block02-aside ul li a:before,
.product-categories li:before,
.tt-list01 li:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-aside-box ul li a:hover,
.side-block ul li a:hover,
.tt-block02-aside ul li:hover,
.tt-block02-aside ul li:hover a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

#tt-header.tt-header-02 #tt-desctop-menu nav>ul>li.current-menu-ancestor>a:after {
	border-top-color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.tt-list-box li a:hover,
.tags-links a:hover,
.tagcloud a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	-webkit-box-shadow: 0px 0px 1px rgba(80, 190, 189, 0.8);
	-moz-box-shadow: 0px 0px 1px rgba(80, 190, 189, 0.8);
	box-shadow: 0px 0px 1px rgba(80, 190, 189, 0.8);
}

.tt-post .tt-layout .tt-meta .tt-icon {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-layout .tt-meta a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-layout .tt-title a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-layout-bottom:after {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-layout-bottom .tt-icon-link {
	border: 1px solid <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-layout-bottom .tt-icon-link:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-post .tt-img .tt-link-text .tt-wrapper-text i {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

blockquote:after,
.tt-blockquote:after {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-slick-nav01 .slick-prev:hover,
.tt-slick-nav01 .slick-next:hover {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-searcher-aside input:focus {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.singlepost-wrapper .tt-meta .tt-icon {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.singlepost-wrapper .tt-meta a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.singlepost-wrapper .tt-layout-bottom:after {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-comments-layout .tt-item div.comment .tt-content .tt-comments-title .username a,
.tt-comments-layout .tt-item div.comment .tt-content .tt-comments-title .username {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-comments-layout .tt-item div.comment .tt-content .comment-reply-link:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-comments-layout .tt-item div.comment .tt-avatar-area {
	display: flex;
}

#commentform #comment:hover,
#commentform #comment:focus,
#commentform #comment.focus {
	border-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.woocommerce .star-rating::before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.woocommerce .star-rating span::before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-product .tt-description .tt-price {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-product .tt-description .tt-btn-addtocart {
	background: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.tt-product-aside .tt-description .tt-price {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-faq-layout .tt-faq.active .tt-title {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-faq-layout .tt-faq .tt-title:before {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-faq-layout .tt-faq .tt-title:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.box-info .tt-item-layout .tt-item .tt-col:first-child i {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.box-info .tt-social-icon li a {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-skinSelect-02 .SumoSelect>.CaptionCont>span.placeholder,
.tt-skinSelect-02 .SumoSelect>.CaptionCont>span {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-product-02 .tt-wrapper-description .tt-box-title .tt-title a:hover {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-product-02 .tt-wrapper-description .tt-box-title:hover .tt-title a,
.tt-product-02 .tt-wrapper-description .tt-box-title:hover .tt-description a {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-aside-promo .tt-wrapper p.tt-info-price {
	color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}

.tt-portfolio-content .tt-portfolio-item figure figcaption .tt-info-price {
	color: <?php echo esc_attr( $color_setting_hex ); ?>;
}

.tt-block-title.tt-block-title-border:after {
	background-color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}
.tt-promo .tt-description .tt-icon{
    background-color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}
body:not(.touch) .tt-promo:hover .tt-icon {
	background-color: #fff !important;
    color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}
.tt-media-03 .tt-icon-link{
    border: 1px solid <?php echo esc_attr( $color_setting_hex ); ?> !important;
}
.tt-media-03 .tt-icon-link:before {
    color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}
.tt-media-03:hover .tt-layout .tt-title {
    color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}
#commentform #comment:hover, #commentform #comment:focus, #commentform #comment.focus {
    border-color: <?php echo esc_attr( $color_setting_hex ); ?> !important;
}



		<?php

		$caleader_custom_css = ob_get_clean();

	}
	return $caleader_custom_css;

}

?>
