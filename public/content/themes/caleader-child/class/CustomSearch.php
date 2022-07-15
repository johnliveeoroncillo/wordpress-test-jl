<?php
/**
 * THIS WILL OVERRIDE THE DEFAULT SEARCH FORM OF CALEADER LISTING
 */
class CustomSearchForm {

	private $data       = array();
	private $dis_select = null;
	private $is_mobile  = 0;
	public function __construct() {
		add_filter( 'wp', array( $this, 'has_shortcode' ) );
		add_filter( 'query_vars', array( $this, 'register_query_vars' ) );
		add_shortcode( 'carleader_listings_search', array( $this, 'search_form' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'init_style' ) );
	}
    public function init_style() {
        wp_enqueue_style('search-form-style', CARSADA_DIR . '/assets/css/search_form.css?v=' . time());	
    }
	public function has_shortcode() {
		global $post;
		if ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'carleader_listings_search' ) ) {
			add_filter( 'is_carleader_listings', '__return_true' );
		}
	}
	public function end_meta_value( $end = 'max', $meta ) {
		global $wpdb;
		$query = $wpdb->prepare(
			'SELECT ' . $end . "( cast( meta_value as UNSIGNED ) ) FROM {$wpdb->postmeta} WHERE meta_key='%s'",
			$meta
		);
		return $wpdb->get_var( $query );
	}
	public function register_query_vars( $vars ) {
		$vars[] = 'the_year';
		$vars[] = 'make';
		$vars[] = 'model';
		$vars[] = 'condition';
		$vars[] = 'min_price';
		$vars[] = 'max_price';
		$vars[] = 'body_type';
		$vars[] = 'odometer';
		$vars[] = 'color';
		$vars[] = 'int_color';
		return $vars;
	}
	public function search_form( $atts ) {
		$s        = isset( $_GET['s'] ) ? sanitize_text_field( $_GET['s'] ) : '';
		$atts     = shortcode_atts(
			array(
				'area_placeholder' => esc_html__( 'State, Zip, Town', 'caleader-listing' ),
				'submit_btn'       => esc_html__( 'Find My Car', 'caleader-listing' ),
				'refine_text'      => esc_html__( 'More Refinements', 'caleader-listing' ),
				'style'            => '1',
				'layout'           => $atts['page'],
				'exclude'          => array(),
			),
			$atts
		);
		$page_url = caleader_listing_get_url();
		$exclude  = ! empty( $atts['exclude'] ) ? array_map( 'trim', explode( ',', $atts['exclude'] ) ) : array();

		$min_price = '';
		$max_price = '';

		$minsliderval = $this->end_meta_value( 'min', '_carleader_listing_price' );
		$maxsliderval = $this->end_meta_value( 'max', '_carleader_listing_price' );

		if ( isset( $_GET['min_price'] ) && $_GET['min_price'] != '' ) {
			$min_price = $_GET['min_price'];
		} else {
			$min_price = $minsliderval;
		}
		if ( isset( $_GET['max_price'] ) && $_GET['max_price'] != '' ) {
			$max_price = $_GET['max_price'];
		} elseif ( isset( $_GET['price'] ) && $_GET['price'] != '' ) {
			$max_price = $_GET['price'];
		} else {
			$max_price = $maxsliderval;
		}

		ob_start();
		?>
<?php
		if ( $atts['layout'] != 'home' ) {
			$inv_search_text = carleader_listings_option( 'inv_search_text' );
			if ( ! isset( $inv_search_text ) || $inv_search_text == '' ) {
				$inv_search_text = esc_html__( 'Search Our<br>Inventory', 'caleader-listing' );
			}

			?>

<div class="tt-label-aside">
    <a href="#" class="tt-btn-col-close"><i class="icon-close"></i></a>
    <div class="tt-icon">
        <i class="icon-carsearch"></i>
    </div>
    <div class="tt-title">
        <?php echo $inv_search_text; ?>
    </div>
</div>
<?php } ?>
<?php
		if ( $atts['layout'] != 'home' ) {
			?>
<form id="tt-filters-aside"
    class="caleader-listings-search tt-filters-aside s-<?php echo esc_attr( $atts['style'] ); ?> <?php echo esc_attr( $atts['layout'] ); ?>"
    autocomplete="off" action="<?php echo $page_url; ?>" method="GET" role="search">
    <?php } else { ?>
    <form id="tt-filters-aside"
        class="caleader-listings-search s-<?php echo esc_attr( $atts['style'] ); ?> <?php echo esc_attr( $atts['layout'] ); ?>"
        autocomplete="off" action="<?php echo $page_url; ?>" method="GET" role="search">
        <?php } ?>


        <?php
		if ( $atts['layout'] == 'home' ) {

			$h_search_top = carleader_listings_option( 'h_search_top' );

			$home_filter_fileds = carleader_listings_option( 'home_filter_fileds' );

			$fileds = array(
				'condition',
				'the_year',
				'make',
				'model',
				'price',
			);

			if ( isset( $home_filter_fileds ) ) {
				if ( ! empty( $home_filter_fileds ) ) {
					$fileds = $home_filter_fileds;
				}
			}

			if ( ! isset( $h_search_top ) || $h_search_top == '' ) {
				$h_search_top = esc_html__( 'Car Search', 'caleader-listing' );
			}
			$h_search_bot = carleader_listings_option( 'h_search_bot' );
			if ( ! isset( $h_search_bot ) || $h_search_bot == '' ) {
				$h_search_bot = esc_html__( 'Find your next car', 'caleader-listing' );
			}

			$this->dis_select[ $fileds[0] ] = false;

			?>
        <div id="js-searchfilter">
            <div class="tt-search-filter-wrapper">
                <div class="container tt-container-fluid-mobile">
                    <div class="tt-search-filter">
                        <?php
			$header_style = get_theme_mod( 'header_style' );
			if ( $header_style == 2 ) {
				echo '<i class="tt-icon-filter icon-2"></i>';
			} elseif ( $header_style == 3 ) {
				echo '<i class="tt-icon-filter icon-y1"></i>';
			} else {
				echo '<i class="tt-icon-filter icon-carsearch"></i>';
			}
			?>
                        <div class="tt-col-title">
                            <div class="tt-show">
                                <?php echo $h_search_top; ?><br>
                                <span><?php echo $h_search_bot; ?></span>
                            </div>
                            <div class="tt-close">
								<svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.74775 7.39919L0.951518 1.91778C0.385758 1.2712 0.844935 0.259277 1.70409 0.259277H11.2966C12.1557 0.259277 12.6149 1.2712 12.0491 1.91778L7.2529 7.39919C6.85449 7.85452 6.14616 7.85452 5.74775 7.39919Z" fill="#48484A"/>
								</svg>
							</div>
                        </div>
                        <div class="tt-col-select visible-desctope tt-skinSelect-01">

                            <?php
			foreach ( $fileds as $field ) {
				$this->is_mobile = 0;
				$funct           = $field . '_field';
				echo $this->{$funct}( $atts );
			}
			?>
                        </div>
                        <div class="tt-col-select visible-device tt-skinSelect-01">
                            <div class="tt-custom-mobile">
                                <?php
			$lastElement = end( $fileds );
			$count_f     = count( $fileds );
			$flg         = 0;
			if ( $count_f % 2 != 0 ) {
				$flg = 1;
			}
			foreach ( $fileds as $field ) {
				$this->is_mobile = 1;
				$class           = 'tt-col-6 col-mobile-ajax';
				if ( $field == $lastElement && $flg == 1 ) {
					$class = 'tt-col-12 col-mobile-ajax';
				}
				?>
                                <div class="<?php echo $class; ?>">
                                    <?php
				$funct = $field . '_field';
				echo $this->{$funct}( $atts );
				?>
                                </div>
                                <?php
			}
			?>

                                <input type="hidden" name="s">
                                <div class="tt-col-12">
                                    <div class="tt-btn">
                                        <button class="btn tt-icon-left" type="submit"><i
                                                class="icon-musica-searcher"></i><span>
                                                <?php
			// $count_posts = wp_count_posts( 'carleader-listing' )->publish;
			// echo $count_posts . '&nbsp;';

			$h_search_count = carleader_listings_option( 'h_search_count' );
			if ( ! isset( $h_search_count ) || $h_search_count == '' ) {
				$h_search_count = esc_html__( 'cars', 'caleader-listing' );
			}

			?>
                                            </span><?php echo $h_search_count; ?> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tt-col-btn">
                            <button class="btn tt-icon-left btn-primary btn-lg" type="submit"><i class="icon-musica-searcher"></i>
                                <span class="tt-mobile-hide">
                                    <?php
			// $count_posts = wp_count_posts( 'carleader-listing' )->publish;
			// echo $count_posts . '&nbsp;';
			$h_search_count = carleader_listings_option( 'h_search_count' );
			if ( ! isset( $h_search_count ) || $h_search_count == '' ) {
				$h_search_count = esc_html__( 'Search Cars', 'caleader-listing' );
			}
			?>
                                </span><?php echo $h_search_count; ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php
		} else {
			$archive_filter_fileds = carleader_listings_option( 'archive_filter_fileds' );
			$exclude               = array(
				'condition',
				'the_year',
				'make',
				'model',
				'body_type',
				'odometer',
				'transmission',
				'drivetrain',
				'color',
				'int_color',
				'price',
			);

			if ( isset( $archive_filter_fileds ) ) {
				if ( ! empty( $archive_filter_fileds ) ) {
					$exclude = $archive_filter_fileds;
				}
			}

			?>
        <div class="tt-col-select tt-skinSelect-01">
            <?php if ( in_array( 'condition', $exclude ) || in_array( 'the_year', $exclude ) ) { ?>
            <div class="tt-item">
                <?php
				if ( in_array( 'condition', $exclude ) ) {
					echo $this->condition_field( $atts );
				}
				?>
                <?php
				if ( in_array( 'the_year', $exclude ) ) {
					echo $this->the_year_field( $atts );
				}
				?>
            </div>
            <?php } ?>
            <?php if ( in_array( 'make', $exclude ) || in_array( 'model', $exclude ) ) { ?>
            <div class="tt-item">
                <?php
				if ( in_array( 'make', $exclude ) ) {
					echo $this->make_field( $atts );
				}
				?>
                <?php
				if ( in_array( 'model', $exclude ) ) {
					echo $this->model_field( $atts );
				}
				?>
            </div>
            <?php } ?>
            <?php if ( in_array( 'body_type', $exclude ) || in_array( 'odometer', $exclude ) ) { ?>
            <div class="tt-item">
                <?php
				if ( in_array( 'body_type', $exclude ) ) {
					echo $this->body_type_field( $atts );
				}
				?>
                <?php
				if ( in_array( 'odometer', $exclude ) ) {
					echo $this->odometer_field( $atts );
				}
				?>
            </div>
            <?php } ?>
            <?php if ( in_array( 'transmission', $exclude ) || in_array( 'fuel_type', $exclude ) ) { ?>
            <div class="tt-item">
                <?php
				if ( in_array( 'transmission', $exclude ) ) {
					echo $this->transmission_field( $atts );
				}
				?>
                <?php
				if ( in_array( 'fuel_type', $exclude ) ) {
					echo $this->fuel_type_field( $atts );
				}
				?>

            </div>
            <?php } ?>
            <?php
			if ( in_array( 'drivetrain', $exclude ) ) {
				?>
            <div class="tt-item">
                <?php
				if ( in_array( 'drivetrain', $exclude ) ) {
					  echo $this->drivetrain_field( $atts );
				}
				?>
            </div>
            <?php } ?>


            <?php if ( in_array( 'color', $exclude ) || in_array( 'int_color', $exclude ) ) { ?>
            <div class="tt-item">
                <?php
				if ( in_array( 'color', $exclude ) ) {
					echo $this->color_field( $atts );
				}
				?>
                <?php
				if ( in_array( 'int_color', $exclude ) ) {
					echo $this->int_color_field( $atts );
				}
				?>
            </div>
            <?php } ?>
            <?php
			$archive_layout = carleader_listings_option( 'archive_layout' );
			if ( ! isset( $archive_layout ) || $archive_layout == '' ) {
				$archive_layout = 1;
			}
			if ( isset( $_GET['layout'] ) && $_GET['layout'] != '' ) {
				$archive_layout = $_GET['layout'];
			}

			?>
            <div class="tt-item">
                <input type="hidden" id="id_layout" name="layout" value="<?php echo $archive_layout; ?>">
            </div>
            <div class="tt-item">
                <input type="hidden" name="s">
            </div>
        </div>
        <?php
			if ( in_array( 'price', $exclude ) ) {
				?>
        <div class="tt-col-price">
            <h3 class="tt-aside-title"><?php echo esc_html__( 'Price', 'caleader-listing' ); ?></h3>
            <div class="tt-slider-price">
                <?php
				$pft = carleader_listings_option( 'pft' );
				if ( ! isset( $pft ) || $pft == '' ) {
					  $pft = 1;
				}

				if (class_exists('WOOCS')) {
					global $WOOCS;
					$min_price=$WOOCS->woocs_exchange_value($min_price);
					$max_price=$WOOCS->woocs_exchange_value($max_price);
				}
				?>
                <?php if ( $pft == 1 ) { ?>
                <div id="slider-snap"></div>
                <?php } ?>
                <div class="slider-value-row">
                    <?php if ( $pft == 1 ) { 
					?>
                    <div id="slider-snap-value-lower" class="slider-value"><?php echo $min_price; ?></div>
                    <div id="slider-snap-value-upper" class="slider-value"><?php echo $max_price; ?></div>
                    <input type="hidden" id="minp" name="min_price" value="">
                    <input type="hidden" id="maxp" name="max_price" value="">
                    <?php } else { ?>
                    <input type="text" id="minp" name="min_price" value="" placeholder="<?php echo $min_price; ?>">
                    <input type="text" id="maxp" name="max_price" value="" placeholder="<?php echo $max_price; ?>">
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="tt-col-btn">
            <a href="
			<?php
			if ( isset( $_GET['layout'] ) ) {
				if ( $_GET['layout'] == 2 ) {
					  echo $page_url . '/?layout=2';
				} else {
					echo $page_url;
				}
			} else {
				echo $page_url;
			}
			?>
					 " class="btn btn-color02">
                <?php
			$reset_text = carleader_listings_option( 'reset_text' );
			if ( ! isset( $reset_text ) || $reset_text == '' ) {
				$reset_text = esc_html__( 'reset filters', 'caleader-listing' );
			}
			echo $reset_text;
			?>
            </a>
            <button class="btn" type="submit"><i class="icon-filer"></i>
                <?php
			$filter_text = carleader_listings_option( 'filter_text' );
			if ( ! isset( $filter_text ) || $filter_text == '' ) {
				$filter_text = esc_html__( 'filter', 'caleader-listing' );
			}
			echo $filter_text;
			?>
            </button>
        </div>
        <?php
			$archive_style = carleader_listings_option( 'archive_style' );
			if ( ! isset( $archive_style ) || $archive_style == '' ) {
				$archive_style = 'grid';
			}

			if ( isset( $_GET['showstyle'] ) ) {
				if ( $_GET['showstyle'] != '' ) {
					$archive_style = $_GET['showstyle'];
				}
			}

			?>
        <input class="archiveshowclass" type="hidden" name="showstyle"
            value="<?php echo esc_attr( $archive_style ); ?>">
        <?php } ?>
    </form>
    <?php
	if (class_exists('WOOCS')) {
		global $WOOCS;
		$minsliderval=$WOOCS->woocs_exchange_value($minsliderval);
		$maxsliderval=$WOOCS->woocs_exchange_value($maxsliderval);
	}
		$output = ob_get_clean();
		wp_localize_script(
			'caleader-main',
			'slider_val',
			array(
				'min'      => $minsliderval,
				'max'      => $maxsliderval,
				'curr_min' => $min_price,
				'curr_max' => $max_price,
			)
		);
		return apply_filters( 'carleader_listings_search_form_output', $output, $atts );
	}


	public function condition_field( $atts ) {
		$conditions = carleader_listings_available_listing_conditions();
		$options    = array();

		if ( ! $conditions ) {
			return '';
		}
		foreach ( $conditions as $n => $value ) {
			$options[ $n ] = $value;
		}
		$args = array(
			'name'   => 'condition',
			'label'  => esc_html__( 'Condition', 'caleader-listing' ),
			'prefix' => '',
		);

		if ( $atts['layout'] == 'home' ) {
			return $this->select_field( $options, $args, true );
		}

		return $this->multiple_select_field( $options, $args );
	}
	public function color_field( $atts ) {
		if ( empty( $this->data ) ) {
			$this->data = carleader_listings_search_data();
		}
		$color = $this->data['color'];
		if (empty($color)) return '';

		asort( $color );
		$options = array();
		if ( empty( $this->data ) ) {
			return '';
		}
		foreach ( $color as $n ) {
			$options[ $n ] = $n;
		}
		$args = array(
			'name'   => 'ext_color',
			'label'  => esc_html__( 'Ext Color', 'caleader-listing' ),
			'prefix' => '',
		);
		if ( $atts['layout'] == 'home' ) {
			return $this->select_field( $options, $args, true );
		}
		return $this->multiple_select_field( $options, $args );
	}
	public function int_color_field( $atts ) {
		if ( empty( $this->data ) ) {
			$this->data = carleader_listings_search_data();
		}
		$color = $this->data['int_color'];
		if (empty($color)) return '';

		asort( $color );
		$options = array();
		if ( empty( $this->data ) ) {
			return '';
		}
		foreach ( $color as $n ) {
			$options[ $n ] = $n;
		}
		$args = array(
			'name'  => 'int_color',
			'label' => esc_html__( 'Int Color', 'caleader-listing' ),
		);
		if ( $atts['layout'] == 'home' ) {
			return $this->select_field( $options, $args, true );
		}
		return $this->multiple_select_field( $options, $args );
	}
	public function the_year_field( $atts ) {
		if ( empty( $this->data ) ) {
			$this->data = carleader_listings_search_data();
		}

		$year = $this->data['year'];
		if (empty($year)) return '';

		arsort( $year);
		$options = array();
		if ( ! $year ) {
			return '';
		}
		foreach ( $year as $n ) {
			$options[ $n ] = $n;
		}
		$h_select_year_text = carleader_listings_option( 'h_select_year_text' );
		if ( ! isset( $h_select_year_text ) || $h_select_year_text == '' ) {
			$h_select_year_text = esc_html__( 'Year', 'caleader-listing' );
		}
		$args = array(
			'name'  => 'the_year',
			'label' => $h_select_year_text,
		);
		if ( $atts['layout'] == 'home' ) {
			return $this->select_field( $options, $args, true );
		}
		return $this->multiple_select_field( $options, $args );
	}
	public function price_field( $atts ) {
		if ( empty( $this->data ) ) {
			$this->data = carleader_listings_search_data();
		}
		$price = $this->data['price'];
		if (empty($price)) return '';

		asort( $price );
		$options = array();
		if ( ! $price ) {
			return '';
		}
		foreach ( $price as $n ) {
			$options[ $n ] = $n;
		}
		$h_select_price_text = carleader_listings_option( 'h_select_price_text' );
		if ( ! isset( $h_select_price_text ) || $h_select_price_text == '' ) {
			$h_select_price_text = esc_html__( 'Price', 'caleader-listing' );
		}
		$args = array(
			'name'  => 'price',
			'label' => $h_select_price_text,
		);
		return $this->select_field( $options, $args, true );
	}
	public function make_field( $atts ) {

		$make    = get_terms(
			array(
				'taxonomy'   => 'make-brand',
				'hide_empty' => true,
			)
		);

		if (empty($make)) return '';

		$options = array();
		if ( $make ) {
			foreach ( $make as $key => $type ) {
				$options[ $type->slug ] = $type->name;
			}
		}
		asort( $options );
		$args = array(
			'name'  => 'make',
			'label' => esc_html__( 'Make', 'caleader-listing' ),
		);
		if ( $atts['layout'] == 'home' ) {
			return $this->select_field( $options, $args, true );
		}
		return $this->multiple_select_field( $options, $args );
	}
	public function model_field( $atts ) {
		if ( empty( $this->data ) ) {
			$this->data = carleader_listings_search_data();
		}
		$model = $this->data['model'];
		if (empty($model)) return '';


		asort( $model );
		$options = array();
		if ( ! $model ) {
			return '';
		}
		foreach ( $model as $n ) {
			$options[ $n ] = $n;
		}
		$args = array(
			'name'  => 'model',
			'label' => esc_html__( 'Model', 'caleader-listing' ),
		);
		if ( $atts['layout'] == 'home' ) {
			return $this->select_field( $options, $args, true );
		}
		return $this->multiple_select_field( $options, $args );
	}
	public function body_type_field( $atts ) {
		$body_types = get_terms(
			array(
				'taxonomy'   => 'body-type',
				'hide_empty' => true,
			)
		);

		if (empty($body_types)) return '';


		$options    = array();
		if ( $body_types ) {
			foreach ( $body_types as $key => $type ) {
				$options[ $type->slug ] = $type->name;
			}
		}
		asort( $options );
		$args = array(
			'name'  => 'body_type',
			'label' => esc_html__( 'Body Type', 'caleader-listing' ),
		);
		if ( $atts['layout'] == 'home' ) {
			return $this->select_field( $options, $args, true );
		}
		return $this->multiple_select_field( $options, $args );
	}
	public function fuel_type_field( $atts ) {
		$fuels = carleader_listings_available_fuels();
		if (empty($fuels)) return '';

		asort( $fuels );
		$options = array();
		if ( ! $fuels ) {
			return '';
		}
		foreach ( $fuels as $n => $value ) {
			$options[ $n ] = $value;
		}
		$args = array(
			'name'   => 'model_engine_fuel',
			'label'  => esc_html__( 'Fuel Types', 'caleader-listing' ),
			'prefix' => '',
		);
		if ( $atts['layout'] == 'home' ) {
			return $this->select_field( $options, $args, true );
		}
		return $this->multiple_select_field( $options, $args );
	}
	public function odometer_field( $atts ) {
		if ( empty( $this->data ) ) {
			$this->data = carleader_listings_search_data();
		}
		$odometer = $this->data['odometer'];
		if (empty($odometer)) return '';


		asort( $odometer );
		$options = array();
		if ( ! $odometer ) {
			return '';
		}
		foreach ( $odometer as $n ) {
			$options[ $n ] = $n;
		}
		$args = array(
			'name'  => 'odometer',
			'label' => esc_html__( 'Max Mileage', 'caleader-listing' ),
		);
		if ( $atts['layout'] == 'home' ) {
			return $this->select_field( $options, $args, true );
		}
		return $this->multiple_select_field( $options, $args );
	}
	public function transmission_field( $atts ) {
		$transmissions = carleader_listings_available_transmissions();

		if (empty($transmissions)) return '';
		asort( $transmissions );
		$options = array();
		if ( ! $transmissions ) {
			return '';
		}
		foreach ( $transmissions as $n => $value ) {
			$options[ $n ] = $value;
		}
		$args = array(
			'name'   => 'model_transmission_type',
			'label'  => esc_html__( 'Transmission', 'caleader-listing' ),
			'prefix' => '',
		);
		if ( $atts['layout'] == 'home' ) {
			return $this->select_field( $options, $args, true );
		}
		return $this->multiple_select_field( $options, $args );
	}
	public function drivetrain_field( $atts ) {
		$drivetrains = carleader_listings_available_drivetrains();

		if (empty($drivetrains)) return '';

		asort( $drivetrains );
		$options = array();
		if ( ! $drivetrains ) {
			return '';
		}
		foreach ( $drivetrains as $n => $value ) {
			$options[ $n ] = $value;
		}
		$args = array(
			'name'   => 'drivetrain',
			'label'  => esc_html__( 'Drivetrain', 'caleader-listing' ),
			'prefix' => '',
		);
		if ( $atts['layout'] == 'home' ) {
			return $this->select_field( $options, $args, true );
		}
		return $this->multiple_select_field( $options, $args );
	}
	public function select_field( $options, $args = array(), $ajax = false ) {
		if ( empty( $options ) ) {
			return '';
		}

		$home_ajax_seacrh = carleader_listings_option( 'home_ajax_seacrh' );

		if ( ! isset( $home_ajax_seacrh ) ) {
			$home_ajax_seacrh = true;
		}

		if ( $home_ajax_seacrh ) {
			if ( $ajax ) {
				if ( $this->is_mobile ) {
					$ajax = 'select_ajax_mobile';
				} else {
					$ajax = 'select_ajax';
				}
			} else {
				$ajax = '';
			}
		} else {
			$ajax = '';
		}

		$selected = isset( $_GET[ $args['name'] ] ) ? $_GET[ $args['name'] ] : '';
		// $disabled = isset( $this->dis_select[ $args['name'] ] ) ? $this->dis_select[ $args['name'] ] : true;
		// if ( $home_ajax_seacrh ) {
		// 	if ( $disabled ) {
		// 		$disabled = 'disabled="disabled"';
		// 	} else {
		// 		$disabled = '';
		// 	}
		// } else {
			$disabled = '';
		// }


		ob_start();
		?>
    <select data-label_sumo="<?php echo $args['label']; ?>"
        class="tt-select tt-skin-01 id_select_<?php echo $args['name']; ?>  <?php echo esc_attr( $ajax ); ?>"
        name="<?php echo esc_attr( $args['name'] ); ?>" <?php echo $disabled; ?>>
        <?php
		if ( $args['name'] != 'condition' ) {
			$show = $args['label'];
			if ( $args['name'] == 'model' ) {
				$h_select_model_text = carleader_listings_option( 'h_select_model_text' );
				if ( ! isset( $h_select_model_text ) || $h_select_model_text == '' ) {
					$h_select_model_text = esc_html__( 'Select a Model', 'caleader-listing' );
				}
				$show = $h_select_model_text;
			} elseif ( $args['name'] == 'make' ) {
				$h_select_make_text = carleader_listings_option( 'h_select_make_text' );
				if ( ! isset( $h_select_make_text ) || $h_select_make_text == '' ) {
					$h_select_make_text = esc_html__( 'Select a Make', 'caleader-listing' );
				}
				$show = $h_select_make_text;
			}
			?>
        <option value="" disabled="disabled" selected="selected"><?php echo $show; ?></option>
        <?php
		} else {
			$show = esc_html__( 'Condition', 'caleader-listing' );
			?>
        <option value="" disabled="disabled" selected="selected"><?php echo $show; ?></option>
        <?php
		}
		if ( ! $ajax ) {
			?>
        <?php foreach ( $options as $val => $text ) : ?>
        <option value="<?php echo esc_attr( $val ); ?>" <?php selected( $val, $selected ); ?>>
            <?php
				if ( $args['name'] == 'price' ) {
					$currency = carleader_listings_option( 'currency' );
					echo esc_attr( $currency . $text );
				} else {
					echo esc_attr( str_replace( '_', ' ', $text ) );
				}
				?>
        </option>
        <?php
			endforeach;
		} else {
			if ( $disabled == '' ) {
				?>
        <?php foreach ( $options as $val => $text ) : ?>
        <option value="<?php echo esc_attr( $val ); ?>" <?php selected( $val, $selected ); ?>>
            <?php
					if ( $args['name'] == 'price' ) {
						$currency = carleader_listings_option( 'currency' );
						echo esc_attr( $currency . $text );
					} else {
						echo esc_attr( str_replace( '_', ' ', $text ) );
					}
					?>
        </option>
        <?php
				endforeach;
			}
		}
		?>


    </select>
    <?php
		if ( isset( $args['suffix'] ) ) {
			echo '<span class="suffix">' . esc_html( $args['suffix'] ) . '</span>';
		}
		$output = ob_get_clean();
		return apply_filters( 'carleader_listings_search_field' . $args['name'], $output );
	}
	public function multiple_select_field( $options, $args = array() ) {
		if ( empty( $options ) ) {
			return '';
		}
		ob_start();
		$selected = isset( $_GET[ $args['name'] ] ) ? $_GET[ $args['name'] ] : '';
		?>
    <select class="tt-select tt-skin-01 multiple_select_ajax" id="id_<?php echo esc_attr( $args['name'] ); ?>" <?php
		$useragent = $_SERVER['HTTP_USER_AGENT'];

		if ( preg_match( '/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent ) || preg_match( '/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr( $useragent, 0, 4 ) ) ) {
		} else {
			echo 'multiple="multiple"';
		}
		?> name="<?php echo esc_attr( $args['name'] ); ?>[]">
        <option value="" disabled="" selected=""><?php echo esc_attr( $args['label'] ); ?></option>
        <?php
		foreach ( $options as $val => $text ) :
			$sel = '';
			if ( is_array( $selected ) && ! empty( $selected ) ) {
				if ( in_array( $val, $selected ) ) {
					$sel = 'selected="selected"';
				}
			} else {
				if ( $val == $selected ) {
					$sel = 'selected="selected"';
				}
			}
			?>
        <option value="<?php echo esc_attr( $val ); ?>" <?php echo $sel; ?>>
            <?php echo esc_attr( str_replace( '_', ' ', $text ) ); ?>
        </option>
        <?php endforeach; ?>
    </select>
    <?php
		if ( isset( $args['suffix'] ) ) {
			echo '<span class="suffix">' . esc_html( $args['suffix'] ) . '</span>';
		}
		?>
    <?php
		$output = ob_get_clean();
		return apply_filters( 'carleader_listings_multiple_search_field' . $args['name'], $output );
	}
}

new CustomSearchForm();