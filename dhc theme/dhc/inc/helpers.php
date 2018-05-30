<?php
/**
 * Return the built-in header styles for this theme
 *
 * @return  array
 */
Class dhc_options_helpers {
	public function recognize_control_class( $name ) {
        $segments = explode( '-', $name );
        $segments = array_map( 'ucfirst', $segments );
        
        return implode( '', $segments );
    }
}

function dhc_add_icons($icon_name='fa',$url='') {
    $icons = '';
    if ($url != '') {
       $fontContent = wp_remote_get( $url, array('sslverify'   => false) );
       if (!is_wp_error($fontContent)){
           $pattern = sprintf('/\.([\A%s].*?)\:/',$icon_name);
           preg_match_all($pattern, $fontContent['body'],$tmp_icons);
           $icons = $tmp_icons[1];
       }
    }
    return $icons;
}

function dhc_admin_color_picker() {
    wp_enqueue_style( 'wp-color-picker' );        
    wp_enqueue_script( 'wp-color-picker' );   
    wp_enqueue_script( 'wp-color-picker-script-handle', plugins_url('wp-color-picker-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
 
}

function dhc_render_box_control( $name,$control,$id ) {
    add_action('admin_enqueue_scripts','dhc_admin_color_picker');
    $controls = dhc_decode($control);
    ?>
    <div class="dhc_box_control">
        <div class="dhc_box_position">
            <div class="dhc_box_margin">
                <label class="dhc_box_label"><?php echo esc_html('Margin');?></label>
                <input placeholder="-" data-position='margin-top' value ="<?php dhc_esc_attr($controls['margin-top']);?>" class="top" type="text"/>
                <input placeholder="-" data-position='margin-bottom' value ="<?php dhc_esc_attr($controls['margin-bottom']);?>" class="bottom" type="text"/>
                <input placeholder="-" data-position='margin-left' value ="<?php dhc_esc_attr($controls['margin-left']);?>" class="left" type="text"/>
                <input placeholder="-" data-position='margin-right' value ="<?php dhc_esc_attr($controls['margin-right']);?>" class="right" type="text"/>
            </div>

            <div class="dhc_box_padding">
                <label class="dhc_box_label"><?php echo esc_html('Padding');?></label>
                <input placeholder="-" data-position='padding-top' value ="<?php dhc_esc_attr($controls['padding-top']);?>" class="top" type="text"/>
                <input placeholder="-" data-position='padding-bottom' value ="<?php dhc_esc_attr($controls['padding-bottom']);?>" class="bottom" type="text"/>
                <input placeholder="-" data-position='padding-left' value ="<?php dhc_esc_attr($controls['padding-left']);?>" class="left" type="text"/>
                <input placeholder="-" data-position='padding-right' value ="<?php dhc_esc_attr($controls['padding-right']);?>" class="right" type="text"/>
            </div>

            <div class="dhc_box_border">
                    <label class="dhc_box_label"><?php echo esc_html('Border');?></label>
                <input placeholder="-" data-position='border-top-width' value ="<?php dhc_esc_attr($controls['border-top-width']);?>" class="top" type="text"/>
                <input placeholder="-" data-position='border-bottom-width' value ="<?php dhc_esc_attr($controls['border-bottom-width']);?>" class="bottom" type="text"/>
                <input placeholder="-" data-position='border-left-width' value ="<?php dhc_esc_attr($controls['border-left-width']);?>" class="left" type="text"/>
                <input placeholder="-" data-position='border-right-width' value ="<?php dhc_esc_attr($controls['border-right-width'])?>" class="right" type="text"/>
            </div>
            <div class="dhc_control_logo"></div>
        </div>
    </div>
    <input name="<?php echo esc_attr($name);?>" data-customize-setting-link="<?php echo  esc_attr($id);?>" value="<?php esc_attr(json_encode($controls['value']));?>" type="hidden"/>
<?php }

function dhc_color_picker_control($title,$control) { 
    $output = '<span class="dhc-options-control-title">'. esc_attr($title).'</span>
                <div class="background-color">
                    <div class="dhc-options-control-color-picker">
                        <div class="dhc-options-control-inputs">
                            <input type="text" class="dhc-color-picker" id="'. esc_attr( $control['name'] ) .'-color" name="'. esc_attr($control['name']).'" data-default-color value="'. esc_attr( $control['color'] ) .'" />
                        </div>
                    </div>
                </div>';
    return $output;
   
}

function dhc_render_border_style() {
    $border_style = array(
        'none' => esc_html__('None','dhc'),
        'hidden' => esc_html__('Hidden','dhc'),
        'dotted' => esc_html__('Dotted','dhc'),
        'dashed' => esc_html__('Dashed','dhc'),
        'solid' => esc_html__('Solid','dhc'),
        'double' => esc_html__('Double','dhc'),
        'groove' => esc_html__('Groove','dhc'),
        'ridge' => esc_html__('Ridge','dhc'),
        'inset' => esc_html__('Inset','dhc'),
        'outset' => esc_html__('Outset','dhc')
        );
    $output = '<label class="dhc_control_title">Border Style</label>
                <select class="themes_flat_border-style">';
            foreach ($border_style as $key => $value ) {
                $output .= '<option value="'.esc_attr($key).'">'.esc_attr($value).'</option>';
            }
    $output       .= '</slect>';
    return $output;
}

function dhc_shortcode_icon_name( $prefix,$icon_type ) {
    $icon_name = '';
    if ($icon_type != 'none') {
        $icon_name  = $prefix.$icon_type;
        wp_enqueue_style('vc_'.$icon_type);
    }
    return $icon_name;
}

function dhc_iconpicker_type_iconsfo( $icons ) {
    $iconssolid_icons = array(
        array('icfo-atm-1 icfo' => 'ATM 1'),
        array('icfo-atm-2 icfo' => 'ATM 2'),
        array('icfo-atm icfo' => 'ATM'),
        array('icfo-bag icfo' => 'BAG'),
        array('icfo-bag-1 icfo' => 'BAG-1'),
        array('icfo-bag-2 icfo' => 'BAG-2'),
        array('icfo-bag-3 icfo' => 'BAG-3'),
        array('icfo-bag-4 icfo' => 'BAG-4'),
        array('icfo-bag-5 icfo' => 'BAG-5'),
        array('icfo-bag-6 icfo' => 'BAG-6'),
        array('icfo-bank icfo' => 'BANK'),
        array('icfo-barbershop icfo' => 'Barbershop'),
        array('icfo-barcode icfo' => 'Barcode'),
        array('icfo-barcode-1 icfo' => 'Barcode-1'),
        array('icfo-basket icfo' => 'Basket'),
        array('icfo-basket-2 icfo' => 'Basket-2'),
        array('icfo-basket-1 icfo' => 'Basket-1'),
        array('icfo-box icfo' => 'Box'),
        array('icfo-box-1 icfo' => 'Box-1'),
        array('icfo-box-2 icfo' => 'Box-2'),
        array('icfo-box-3 icfo' => 'Box-3'),
        array('icfo-briefcase icfo' => 'Briefcase'),
        array('icfo-briefcase-1 icfo' => 'Briefcase-1'),
        array('icfo-cart icfo' => 'Cart'),
        array('icfo-cart-1 icfo' => 'Cart-1'),
        array('icfo-cart-2 icfo' => 'Cart-2'),
        array('icfo-cart-3 icfo' => 'Cart-3'),
        array('icfo-cart-4 icfo' => 'Cart-4'),
        array('icfo-cart-5 icfo' => 'Cart-5'),
        array('icfo-cart-6 icfo' => 'Cart-6'),
        array('icfo-cart-7 icfo' => 'Cart-7'),
        array('icfo-cart-8 icfo' => 'Cart-8'),
        array('icfo-cart-9 icfo' => 'Cart-9'),
        array('icfo-cart-10 icfo' => 'Cart-10'),
        array('icfo-cart-11 icfo' => 'Cart-11'),
        array('icfo-cart-12 icfo' => 'Cart-12'),
        array('icfo-cart-13 icfo' => 'Cart-13'),
        array('icfo-cart-14 icfo' => 'Cart-14'),
        array('icfo-cart-15 icfo' => 'Cart-15'),
        array('icfo-cart-16 icfo' => 'Cart-16'),
        array('icfo-cart-17 icfo' => 'Cart-17'),
        array('icfo-cashier icfo' => 'Cashier'),
        array('icfo-cashier-1 icfo' => 'Cashier-1'),
        array('icfo-change icfo' => 'Change'),
        array('icfo-check icfo' => 'Check'),
        array('icfo-coin icfo' => 'Coin'),
        array('icfo-coin-1 icfo' => 'Coin-1'),
        array('icfo-coin-2 icfo' => 'Coin-2'),
        array('icfo-coin-3 icfo' => 'Coin-3'),
        array('icfo-coin-4 icfo' => 'Coin-4'),
        array('icfo-coin-5 icfo' => 'Coin-5'),
        array('icfo-coin-6 icfo' => 'Coin-6'),
        array('icfo-coin-7 icfo' => 'Coin-7'),
        array('icfo-coin-8 icfo' => 'Coin-8'),
        array('icfo-coin-9 icfo' => 'Coin-9'),
        array('icfo-coin-10 icfo' => 'Coin-10'),
        array('icfo-coins icfo' => 'Coins'),
        array('icfo-coins-1 icfo' => 'Coins-1'),
        array('icfo-crate icfo' => 'Crate'),
        array('icfo-crate-1 icfo' => 'Crate-1'),
        array('icfo-crate-2 icfo' => 'Crate-2'),
        array('icfo-crate-3 icfo' => 'Crate-3'),
        array('icfo-crate-4 icfo' => 'Crate-4'),
        array('icfo-crate-5 icfo' => 'Crate-5'),
        array('icfo-credit-card icfo' => 'Credit-card'),
        array('icfo-credit-card-1 icfo' => 'Credit-card-1'),
        array('icfo-credit-card-2 icfo' => 'Credit-card-2'),
        array('icfo-credit-card-3 icfo' => 'Credit-card-3'),
        array('icfo-credit-card-4 icfo' => 'Credit-card-4'),
        array('icfo-credit-card-5 icfo' => 'Credit-card-5'),
        array('icfo-credit-card-6 icfo' => 'Credit-card-6'),
        array('icfo-delivery-cart icfo' => 'Delivery-cart'),
        array('icfo-delivery-cart-1 icfo' => 'Delivery-cart-1'),
        array('icfo-diagram icfo' => 'Diagram'),
        array('icfo-diagram-1 icfo' => 'Diagram-1'),
        array('icfo-diagram-2 icfo' => 'Diagram-2'),
        array('icfo-diagram-3 icfo' => 'Diagram-3'),
        array('icfo-folder icfo' => 'Folder'),
        array('icfo-folder icfo' => 'Folder'),
        array('icfo-get-money icfo' => 'Get-money'),
        array('icfo-graph icfo' => 'Graph'),
        array('icfo-graph-1 icfo' => 'Graph-1'),
        array('icfo-graph-2 icfo' => 'Graph-2'),
        array('icfo-graph-3 icfo' => 'Graph-3'),
        array('icfo-graph-4 icfo' => 'Graph-4'),
        array('icfo-graph-5 icfo' => 'Graph-5'),
        array('icfo-graph-6 icfo' => 'Graph-6'),
        array('icfo-graph-7 icfo' => 'Graph-7'),
        array('icfo-graph-8 icfo' => 'Graph-8'),
        array('icfo-grocery icfo' => 'Grocery'),
        array('icfo-grocery-1 icfo' => 'Grocery-1'),
        array('icfo-insert-coin icfo' => 'Insert-coin'),
        array('icfo-investment icfo' => 'Investment'),
        array('icfo-justice icfo' => 'Justice'),
        array('icfo-justice-scale icfo' => 'Justice-scale'),
        array('icfo-megaphone icfo' => 'Megaphone'),
        array('icfo-money icfo' => 'Money'),
        array('icfo-notes icfo' => 'Notes'),
        array('icfo-notes-1 icfo' => 'Notes-1'),
        array('icfo-notes-2 icfo' => 'Notes-2'),
        array('icfo-open icfo' => 'Open'),
        array('icfo-pack icfo' => 'Pack'),
        array('icfo-pie-chart icfo' => 'Pie-chart'),
        array('icfo-pie-chart-1 icfo' => 'Pie-chart-1'),
        array('icfo-pie-chart-2 icfo' => 'Pie-chart-2'),
        array('icfo-pie-chart-3 icfo' => 'Pie-chart-3'),
        array('icfo-pie-chart-4 icfo' => 'Pie-chart-4'),
        array('icfo-pie-chart-5 icfo' => 'Pie-chart-5'),
        array('icfo-pie-chart-6 icfo' => 'Pie-chart-6'),
        array('icfo-piggy-bank icfo' => 'Piggy-bank'),
        array('icfo-piggy-bank-1 icfo' => 'Piggy-bank-1'),
        array('icfo-point-of-service icfo' => 'Point-of-service'),
        array('icfo-poor icfo' => 'Poor'),
        array('icfo-presentation icfo' => 'Presentation'),
        array('icfo-presentation-1 icfo' => 'Presentation-1'),
        array('icfo-presentation-2 icfo' => 'Presentation-2'),
        array('icfo-presentation-3 icfo' => 'Presentation-3'),
        array('icfo-presentation-4 icfo' => 'Presentation-4'),
        array('icfo-presentation-5 icfo' => 'Presentation-5'),
        array('icfo-presentation-6 icfo' => 'Presentation-6'),
        array('icfo-presentation-7 icfo' => 'Presentation-7'),
        array('icfo-presentation-8 icfo' => 'Presentation-8'),
        array('icfo-presentation-9 icfo' => 'Presentation-9'),
        array('icfo-presentation-10 icfo' => 'Presentation-10'),
        array('icfo-presentation-11 icfo' => 'Presentation-11'),
        array('icfo-presentation-12 icfo' => 'Presentation-12'),
        array('icfo-presentation-13 icfo' => 'Presentation-13'),
        array('icfo-presentation-14 icfo' => 'Presentation-14'),
        array('icfo-presentation-15 icfo' => 'Presentation-15'),
        array('icfo-presentation-16 icfo' => 'Presentation-16'),
        array('icfo-presentation-17 icfo' => 'Presentation-17'),
        array('icfo-presentation-18 icfo' => 'Presentation-18'),
        array('icfo-presentation-19 icfo' => 'Presentation-19'),
        array('icfo-price-tag icfo' => 'Price Tag'),
        array('icfo-price-tag-1 icfo' => 'Price Tag-1'),
        array('icfo-price-tag-2 icfo' => 'Price Tag-2'),
        array('icfo-price-tag-3 icfo' => 'Price Tag-3'),
        array('icfo-price-tag-4 icfo' => 'Price Tag-4'),
        array('icfo-price-tag-5 icfo' => 'Price Tag-5'),
        array('icfo-price-tag-6 icfo' => 'Price Tag-6'),
        array('icfo-price-tag-7 icfo' => 'Price Tag-7'),
        array('icfo-price-tag-8 icfo' => 'Price Tag-8'),
        array('icfo-price-tag-9 icfo' => 'Price Tag-9'),
        array('icfo-receipt icfo' => 'Receipt'),
        array('icfo-record icfo' => 'Record'),
        array('icfo-rewind-time icfo' => 'Rewind-time'),
        array('icfo-rich icfo' => 'Rich'),
        array('icfo-safebox icfo' => 'Safebox'),
        array('icfo-safebox-1 icfo' => 'Safebox-1'),
        array('icfo-safebox-2 icfo' => 'Safebox-2'),
        array('icfo-safebox-3 icfo' => 'Safebox-3'),
        array('icfo-safebox-4 icfo' => 'Safebox-4'),
        array('icfo-stamp icfo' => 'Stamp'),
        array('icfo-stand icfo' => 'Stand'),
        array('icfo-store-1 icfo' => 'Store-1'),
        array('icfo-store-2 icfo' => 'Store-2'),
        array('icfo-store-3 icfo' => 'Store-3'),
        array('icfo-store icfo' => 'Store'),
        array('icfo-strongbox icfo' => 'Strongbox'),
        array('icfo-suitcase icfo' => 'Suitcase'),
        array('icfo-suitcase-1 icfo' => 'Suitcase-1'),
        array('icfo-suitcase-2 icfo' => 'Suitcase-2'),
        array('icfo-time-is-money icfo' => 'Time-is-money'),
        array('icfo-time-passing icfo' => 'Time-passing'),
        array('icfo-yen icfo' => 'Yen'),
        array('icfo-wallet icfo' => 'Wallet'),
        array('icfo-wallet-1 icfo' => 'Wallet-1'),
        array('icfo-wallet-2 icfo' => 'Wallet-2'),
        array('icfo-calculator icfo' => 'Calculator'),
    );

    return array_merge( $icons, $iconssolid_icons );
}

function dhc_map_icons($name='icon',$heading_name = 'Icon') {
	return array(
			array(
				'type' => 'dropdown',
				'heading' => esc_attr( $heading_name.' library'),
				'value' => array(
                    esc_html__( 'None', 'dhc' ) => 'none',
					esc_html__( 'Font Awesome', 'dhc' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'dhc' ) => 'openiconic',
					esc_html__( 'Typicons', 'dhc' ) => 'typicons',
					esc_html__( 'Entypo', 'dhc' ) => 'entypo',
					esc_html__( 'Linecons', 'dhc' ) => 'linecons',
					esc_html__( 'Mono Social', 'dhc' ) => 'monosocial',
                    esc_html__( 'Material', 'dhc' ) => 'material',					
				),
                'std' => 'none',
				'admin_label' => true,
				'param_name' => $name.'_type',
				'description' => esc_html__( 'Select icon library.', 'dhc' ),
				'integrated_shortcode_field' => $name.'_'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_attr( $heading_name ),
				'param_name' => $name.'_fontawesome',
				'value' => 'fa fa-adjust',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
                    'type' => 'fontawesome',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
				),
				'dependency' => array(
					'element' => $name.'_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'dhc' ),
				'integrated_shortcode_field' => $name.'_'
			),   
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'dhc' ),
				'param_name' => $name.'_openiconic',
				'value' => 'vc-oi vc-oi-dial',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'openiconic',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => $name.'_type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'dhc' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'dhc' ),
				'param_name' => $name.'_typicons',
				'value' => 'typcn typcn-adjust-brightness',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'typicons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => $name.'_type',
					'value' => 'typicons',
				),
				'description' => esc_html__( 'Select icon from library.', 'dhc' ),
				'integrated_shortcode_field' => $name.'_'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'dhc' ),
				'param_name' => $name.'_entypo',
				'value' => 'entypo-icon entypo-icon-note',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'entypo',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => $name.'_type',
					'value' => 'entypo',
				),
				'integrated_shortcode_field' => $name.'_'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'dhc' ),
				'param_name' => $name.'_linecons',
				'value' => 'vc_li vc_li-heart',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => $name.'_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'dhc' ),
				'integrated_shortcode_field' => $name.'_'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'dhc' ),
				'param_name' => $name.'_monosocial',
				'value' => 'vc-mono vc-mono-fivehundredpx',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'monosocial',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => $name.'_type',
					'value' => 'monosocial',
				),
				'description' => esc_html__( 'Select icon from library.', 'dhc' ),
				'integrated_shortcode_field' => $name.'_'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'dhc' ),
				'param_name' => $name.'_material',
				'value' => 'vc-material vc-material-cake',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'material',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => $name.'_type',
					'value' => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'dhc' ),
				'integrated_shortcode_field' => $name.'_'
			),
		);
}

function dhc_custom_button_color($color = '') {
    $color = $color == '' ? dhc_get_opt( 'primary_color' ) : $color;
    return $color;
}

function dhc_render_post($blog_layout,$readmore = '[...]',$length='') {
	if ($length != '') {
		global $_length;
		$_length = $length;
		add_filter('excerpt_length','dhc_special_excerpt',1000);
	}
	$button_type = array(
		'blog-grid' => 'no-background',
		'blog-list' => '',
		'blog-list-small' => 'no-background'
		);
	$_button_type = $button_type[$blog_layout];
	if( strpos( get_the_content(), 'more-link' ) === false ) {
        the_excerpt();

        if ($readmore != '[...]') {
	        echo '<div class="dhc-button-container"><a class="dhc-button dhc-archive '. esc_attr($_button_type).'" href="'.get_the_permalink().'" rel="nofollow">'.$readmore.'</a></div>';
            add_filter( 'excerpt_more', 'dhc_excerpt_more' );
            
	    }
    }
    else {
    	if ($readmore != '[...]') {
	        the_content(' ');
	        echo '<div class="dhc-button-container"><a class="dhc-button dhc-archive '. esc_attr($_button_type).'" href="'.get_the_permalink().'" rel="nofollow">'.$readmore.'</a></div>';
	    }
	    else {
	        the_content($readmore);
	    }
    }
}

function dhc_excerpt_more( $more ) {
    return '';
}

function dhc_special_excerpt($length) {
	global $_length;
	return $_length;
}

function dhc_predefined_header_styles() {
	static $styles;

	if ( empty( $styles ) ) {
		$styles = apply_filters( 'dhc/header_styles', array(
			'header-v1' => esc_html__( 'Classic', 'dhc' ),
			'header-v2' => esc_html__( 'Header style 02', 'dhc' ),
			'header-v4' => esc_html__( 'Modern', 'dhc' ),
		) );
	}

	return $styles;
}

/**
 * Render header style this theme
 *
 * @return  array
 */
function dhc_render_header_styles() {
	static $header_style;
	
	if ( dhc_meta( 'custom_header' ) == 1 ) {
		$header_style = dhc_meta( 'header_style' );
	} else {
		$header_style = get_theme_mod( 'header_style', 'Header-v1' );
	}

	return $header_style;
}

function dhc_available_social_icons() {
	$icons = apply_filters( 'dhc_available_icons', array(
		'twitter'        => array( 'iclass' => 'fa-twitter', 'title' => 'Twitter','share_link' => 'https://twitter.com/intent/tweet?url=' ),
		'facebook'       => array( 'iclass' => 'fa-facebook', 'title' => 'Facebook','share_link'=>'https://www.facebook.com/sharer.php?u=' ),
		'google-plus'    => array( 'iclass' => 'fa-google-plus', 'title' => 'Google Plus','share_link'=>'https://plus.google.com/share?url=' ),
		'pinterest'      => array( 'iclass' => 'fa-pinterest', 'title' => 'Pinterest','share_link' =>'https://pinterest.com/pin/create/bookmarklet/?url=' ),
		'instagram'      => array( 'iclass' => 'fa-instagram', 'title' => 'Instagram','share_link' => '' ),
		'youtube'        => array( 'iclass' => 'fa-youtube-play', 'title' => 'Youtube','share_link' =>'' ),
		'vimeo'          => array( 'iclass' => 'fa-vimeo-square', 'title' => 'Vimeo','share_link' =>'' ),
		'linkedin'       => array( 'iclass' => 'fa-linkedin', 'title' => 'LinkedIn','share_link' => 'https://www.linkedin.com/shareArticle?url=' ),
		'behance'        => array( 'iclass' => 'fa-behance', 'title' => 'Behance','share_link' =>'' ),
		'bitcoin'        => array( 'iclass' => 'fa-bitcoin', 'title' => 'Bitcoin','share_link' =>'' ),
		'bitbucket'      => array( 'iclass' => 'fa-bitbucket', 'title' => 'BitBucket','share_link' => '' ),
		'codepen'        => array( 'iclass' => 'fa-codepen', 'title' => 'Codepen','share_link' =>'' ),
		'delicious'      => array( 'iclass' => 'fa-delicious', 'title' => 'Delicious','share_link' =>'https://delicious.com/save?url='),
		'deviantart'     => array( 'iclass' => 'fa-deviantart', 'title' => 'DeviantArt','share_link' =>'' ),
		'digg'           => array( 'iclass' => 'fa-digg', 'title' => 'Digg','share_link' =>'http://digg.com/submit?url=' ),
		'dribbble'       => array( 'iclass' => 'fa-dribbble', 'title' => 'Dribbble','share_link' =>'' ),
		'flickr'         => array( 'iclass' => 'fa-flickr', 'title' => 'Flickr','share_link' => ''),
		'foursquare'     => array( 'iclass' => 'fa-foursquare', 'title' => 'Foursquare','share_link' => ''),
		'github'         => array( 'iclass' => 'fa-github-alt', 'title' => 'Github','share_link' => ''),
		'jsfiddle'       => array( 'iclass' => 'fa-jsfiddle', 'title' => 'JSFiddle','share_link' => ''),
		'reddit'         => array( 'iclass' => 'fa-reddit', 'title' => 'Reddit','share_link' => 'https://reddit.com/submit?url='),
		'skype'          => array( 'iclass' => 'fa-skype', 'title' => 'Skype','share_link' => 'https://web.skype.com/share?url='),
		'slack'          => array( 'iclass' => 'fa-slack', 'title' => 'Slack','share_link' => ''),
		'soundcloud'     => array( 'iclass' => 'fa-soundcloud', 'title' => 'SoundCloud','share_link' => ''),
		'spotify'        => array( 'iclass' => 'fa-spotify', 'title' => 'Spotify','share_link' => ''),
		'stack-exchange' => array( 'iclass' => 'fa-stack-exchange', 'title' => 'Stack Exchange','share_link' => ''),
		'stack-overflow' => array( 'iclass' => 'fa-stack-overflow', 'title' => 'Stach Overflow','share_link' => ''),
		'steam'          => array( 'iclass' => 'fa-steam', 'title' => 'Steam','share_link' => ''),
		'stumbleupon'    => array( 'iclass' => 'fa-stumbleupon', 'title' => 'Stumbleupon','share_link' => 'http://www.stumbleupon.com/submit?url='),
		'tumblr'         => array( 'iclass' => 'fa-tumblr', 'title' => 'Tumblr','share_link' => 'https://www.tumblr.com/widgets/share/tool?canonicalUrl='),
		'rss'            => array( 'iclass' => 'fa-rss', 'title' => 'RSS','share_link' => '' )
	) );

	$icons['__ordering__'] = array_keys( $icons );

	return $icons;
}

function themes_predefined_background_patterns() {
	static $patterns;

	if ( empty( $patterns ) || ! is_array( $patterns ) ) {
		$patterns = array();
		$template_directory = get_template_directory();
		$stylesheet_directory = get_stylesheet_directory();

		// Find background pattern from template's assets
		foreach( glob( dhc_LINK . '/images/controls/patterns/*' ) as $file ) {
			if ( is_dir( $file ) )
				continue;

			$patterns['parent_' . basename($file)] = THEME_URL . '/images/controls/patterns/' . basename($file);
		}

		if ( $template_directory != $stylesheet_directory ) {
			if ( is_dir( dhc_LINK . '/images/controls/patterns' ) ) {
				// Find background patterns from child theme's assets
				foreach( glob( dhc_LINK . '/images/controls/patterns/*' ) as $file ) {
					if ( is_dir( $file ) )
						continue;

					$patterns['child_' . basename($file)] = THEME_URL . '/images/controls/patterns/' . basename($file);
				}
			}
		}

		$patterns = apply_filters( 'dhc/themes_predefined_background_patterns', $patterns );
	}

	return $patterns;
}

/**
 * Menu fallback
 */
function dhc_menu_fallback() {
	echo '<ul id="menu-main" class="menu">
	<li>
	<a class="menu-fallback" href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__( 'Create a Menu', 'dhc' ) . '</a></li></ul>';
}

function dhc_esc_attr($attr) {
	echo esc_attr($attr);
}

function dhc_esc_html($attr) {
	echo esc_html($attr);
}

/**
 * Change the excerpt length
 */
function dhc_excerpt_length( $length ) {  
  	$excerpt = dhc_choose_opt('blog_archive_post_excepts_length');
  	return $excerpt;
}

add_filter( 'excerpt_length', 'dhc_excerpt_length', 999 );

/**
 * Blog layout
 */
function dhc_blog_layout() {
	switch (get_post_type()) {
		case 'page':
			$layout = dhc_choose_opt('page_layout');
			break;
		case 'post':
			$layout = dhc_choose_opt('blog_layout');
			break;
		case 'portfolios':
			$layout = dhc_choose_opt('portfolios_sidebar');
			break;
		
		default:
			$layout = dhc_choose_opt('blog_layout');
			break;
	}

	return $layout ;
}

function dhc_font_style($style) {
	if (strlen($style) > 4) {
	  	switch (substr($style, 0,3)) {
			case 'reg':
			    $a[0] = '400';
			    $a[1] = 'normal';
			break;
			case 'ita':
			    $a[0] = '400';
			    $a[1] = 'italic';			    
			break;
			default:
			    $a[0] = substr($style, 0,3);
			    $a[1] = substr($style, 4);
			break;
		}
		  
	}
	else {
	  	$a[0] = $style;
	  	$a[1] = 'normal';
	}
	return $a;
}

/**
 * Get post meta, using rwmb_meta() function from Meta Box class
 */
function dhc_meta( $key) {
	global $post;
	if (!is_null($post)) :
	    return get_post_meta( $post->ID,$key, true );
	endif;
}

if ( ! function_exists( 'dhc_favicon' ) ) {
    add_action( 'wp_head', 'dhc_favicon' );

    /**
     * Display the custom favicon setup for the theme
     *   
     * @return  void
     */
     
    function dhc_favicon() {
        if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {
          printf ('<link rel="shortcut icon" href="'.esc_url( dhc_LINK . 'icon/favicon.png').'" />');      
        }
    }
}

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function dhc_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'dhc' ), max( $paged, $page ) );
		}

		return $title;
	}

	add_filter( 'wp_title', 'dhc_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	if ( ! function_exists( '_wp_render_title_tag' ) ) {
		function dhc_render_title() {
			?>
			<title><?php wp_title( '|', true, 'right' ); ?></title>
			<?php
		}
		add_action( 'wp_head', 'dhc_render_title' );
	}
	
endif;

function dhc_get_box_control ( $box_control, $position ) {
    if ( is_array( $box_control ) ) {   
        if ( $box_control[$position] != ' ' ) {
            return esc_attr ( $box_control[$position] );
        } else {
            return "";
        }        
    }
}

function dhc_render_attrs($atts,$echo = true) {
    $attr = '';
    if (is_array($atts)) {
        foreach ($atts as $key => $value) {
            if ( $value !='') {
                $attr .= $key . '="' . esc_attr( $value ) . '" ';
            }
        }
    }
    if ($echo == true) {
        echo esc_attr($attr);
    }
    return $attr;
}

function dhc_get_json($key) {
	if ( get_theme_mod($key) == '' ) return dhc_customize_default_options2($key);
	if (!is_array(get_theme_mod($key))) {
    $decoded_value = json_decode(str_replace('&quot;', '"',  get_theme_mod( $key )), true );
    }
    else {
    	$decoded_value = get_theme_mod($key);
    }
    return $decoded_value;
}

function dhc_decode($value) {
	if (!is_array($value)) {
        $decoded_value = json_decode(str_replace('&quot;', '"',  $value) , true );
    }
    else {
        $decoded_value = $value;
    }
    return $decoded_value;
}

function dhc_get_opt( $key ) {
	return get_theme_mod( $key, dhc_customize_default_options2( $key ) );
}

function dhc_dynamic_sidebar($sidebar) {
	if ( is_active_sidebar ( $sidebar ) ) {
            dynamic_sidebar( $sidebar );        
        } else {         
            if ( is_user_logged_in() ) {                  
                
                esc_html_e('This is the','dhc') ; 
                echo esc_attr($sidebar);
                esc_html_e('widget area.Please go to ','dhc');
                printf('<a href="%s">%s</a>%s',esc_url( admin_url( 'widgets.php' )),esc_html__('Admin ','dhc'),esc_html__('to this area','dhc'));
            }
    }
}

function dhc_render_meta(){
	if ( 'post' == get_post_type() && dhc_choose_opt('blog_archive_show_post_meta') != 0 ) : ?>
		<div class="entry-meta clearfix">
			<?php dhc_posted_on(); ?>		
		</div><!-- /.entry-meta -->
	<?php endif; 
}

function dhc_choose_opt ($key) {
	$flatopts = ( get_option('flatopts') );
	if ( isset( $flatopts[$key] ) && dhc_meta( $flatopts[$key]) == 1 ) {
		return dhc_meta( $key );			
	}
	else 
		return dhc_get_opt( $key );
}

function dhc_load_page_menu($params) {
	if ( dhc_meta( 'enable_custom_navigator' ) == 1 && dhc_meta('menu_location_primary') != false ) {
		if ($params['theme_location'] == 'primary') {
			$params['menu'] = (int)dhc_meta('menu_location_primary');
		}
	}
	return ($params);
}

add_filter( 'wp_nav_menu_args', 'dhc_load_page_menu' );

	
add_filter('widget_text','do_shortcode');


function dhc_render_social($prefix = '',$value='',$show_title=false) {
    if ($value == '') {
 		$value = dhc_get_json('social_links');
    }

    $class[] = ($show_title == false ? 'dhc-socials' : 'dhc-shortcode-socials');

    if ( ! is_array( $value ) ) {
            $decoded_value = json_decode(str_replace('&quot;', '"', $value), true );
            $value = is_array( $decoded_value ) ? $decoded_value : array();
        }

    $icons = dhc_available_social_icons();

	?>
    <ul class="<?php echo esc_attr(implode(" ", $class));?>">
        <?php
        foreach ( $value as $key => $val ) {
            if ($key != '__ordering__') {
                $title = ($show_title == false ? '' : $icons[$key]['title']);
                printf(
                    '<li class="%s">
                        <a href="%s" target="_blank" rel="alternate" title="%s">
                            <i class="fa fa-%s"></i>
                            %s
                        </a>
                    </li>',
                    esc_attr( $key ),
                    esc_url( $val ),
                    esc_attr( $val ),
                    esc_attr( $key ),
                    esc_html($title)
                );
            }
    }
        ?>
    </ul><!-- /.social -->       
 	<?php 
	 }
