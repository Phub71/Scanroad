<?php
/**
 * @package dhc
 */
//Output all custom styles for this theme
function dhc_custom_styles( $custom ) {
	$custom = '';

	$font = dhc_get_json('body_font_name');
	$font_style = dhc_font_style($font['style']);
	$body_fonts = $font['family'];
	$body_line_height = $font['line_height'];
	$body_font_weight = $font_style[0];
	$body_font_style = $font_style[1];
	$body_size = $font['size'];	
	
	$headings_fonts_ = dhc_get_json('headings_font_name');
	$headings_fonts_family = $headings_fonts_['family'];	
	$headings_style = dhc_font_style( $headings_fonts_['style'] );
	$headings_font_weight = $headings_style[0];
	$headings_font_style = $headings_style[1];

	$menu_fonts_ = dhc_get_json('menu_font_name');
	$menu_fonts_family = $menu_fonts_['family'];
	$menu_fonts_size = $menu_fonts_['size'];
	$menu_line_height = $menu_fonts_['line_height'];
	$menu_style = dhc_font_style( $menu_fonts_['style'] );
	$menu_font_weight = $menu_style[0];
	$menu_font_style = $menu_style[1];	

	// Body font family
	if ( $body_fonts !='' ) {
		$custom .= "body,button,input,select,textarea { font-family:" . $body_fonts . " ; }"."\n";
	}

	// Body font weight
	if ( $body_font_weight !='' ) {
		$custom .= "body,button,input,select,textarea { font-weight:" . $body_font_weight . ";}"."\n";
	}

	// Body font style
	if ( isset( $body_font_style ) ) {
        $custom .= "body,button,input,select,textarea { font-style:" . $body_font_style . "; }"."\n";        
	}

    // Body font size
    if ( $body_size !=''  ) {
        $custom .= "body,button,input,select,textarea { font-size:" . intval( $body_size ) . "px; }"."\n";        
    }

    // Body line height
    if ( $body_line_height != '' ) {
        $custom .= "body,button,input,select,textarea { line-height:" . intval( $body_line_height ) . "px ; }"."\n";        
    }

	// Headings font family
	if ( $headings_fonts_family !='' ) {
		$custom .= "h1,h2,h3,h5,h6 { font-family:" . $headings_fonts_family . ";}"."\n";
	}

	//Headings font weight
	if ( $headings_font_weight !='' ) {
		$custom .= "h1,h2,h3,h4,h5,h6 { font-weight:" . $headings_font_weight . ";}"."\n";
	}

	// Headings font style
	if ( isset( $headings_font_style )) {
        $custom .= "h1,h2,h3,h4,h5,h6  { font-style:" . $headings_font_style . "; }"."\n";        
	}

	// Menu font family
	if ( $menu_fonts_family != '') {
		$custom .= "#mainnav > ul > li > a { font-family:" . $menu_fonts_family . ";}"."\n";
	}

	// Menu font weight
	if ( $menu_font_weight != '' ) {
		$custom .= "#mainnav > ul > li > a { font-weight:" . $menu_font_weight . ";}"."\n";
	}

	// Menu font style
	if ( isset( $menu_font_style )) {
        $custom .= "#mainnav > ul > li > a  { font-style:" . $menu_font_style . "; }"."\n";        
	}

    //Menu font size
    if ( $menu_fonts_size != '' ) {
        $custom .= "#mainnav > ul > li > a { font-size:" . intval($menu_fonts_size) . "px;}"."\n";
    }   

    // Menu line height
    if ( $menu_line_height != '' ) {
        $custom .= "#mainnav > ul > li > a { line-height:" . intval($menu_line_height) . "px;}"."\n";
    }
    
	// H1 font size
	if ( $h1_size = dhc_get_opt( 'h1_size' ) ) {
		$custom .= "h1 { font-size:" . intval($h1_size) . "px; }"."\n";
	}

    // H2 font size
    if ( $h2_size = dhc_get_opt( 'h2_size' ) ) {
        $custom .= "h2 { font-size:" . intval($h2_size) . "px; }"."\n";
    }

    // H3 font size
    if ( $h3_size = dhc_get_opt( 'h3_size' ) ) {
        $custom .= "h3 { font-size:" . intval($h3_size) . "px; }"."\n";
    }

    // H4 font size
    if ( $h4_size = dhc_get_opt( 'h4_size' ) ) {
        $custom .= "h4 { font-size:" . intval($h4_size) . "px; }"."\n";
    }

    // H5 font size
    if ( $h5_size = dhc_get_opt( 'h5_size' ) ) {
        $custom .= "h5 { font-size:" . intval($h5_size) . "px; }"."\n";
    }

    // H6 font size
    if ( $h6_size = dhc_get_opt( 'h6_size' ) ) {
        $custom .= "h6 { font-size:" . intval($h6_size) . "px; }"."\n";
    }

    // Page title text color
    if ( $pagetitle_text_color = dhc_get_opt( 'pagetitle_text_color' ) ) {
        $custom .= ".page-title .page-title-heading h1, .breadcrumbs .trail-end, .breadcrumbs span { color:" . $pagetitle_text_color."; }"."\n";
    }

    // Page title link color
    if ( $pagetitle_link_color = dhc_get_opt( 'pagetitle_link_color' ) ) {
        $custom .= ".breadcrumbs span a, .breadcrumbs a,.breadcrumbs span.sep { color:" . $pagetitle_link_color."; }"."\n";
    }

    // Page title Padding
    if ( $pagetitle_padding = dhc_get_opt( 'pagetitle_padding' ) ) {
        $custom .= ".page-title { Padding:" . $pagetitle_padding."px 0; }"."\n";
    }  
   
    // Primary color    
    $primary_color = dhc_get_opt( 'primary_color' );
    $links_color = get_theme_mod('links_color');
    if ( $primary_color !='' ) {
    	$custom .= ".iconbox .box-header .box-icon span,a:hover, a:focus,.portfolio-filter li a:hover, .portfolio-filter li.active a,.dhc-portfolio .item .category-post a,.color_theme,.widget ul li a:hover,.footer-widgets ul li a:hover,.footer a:hover,.dhc-top a:hover,.dhc-portfolio .portfolio-container.grid2 .title-post a:hover,.dhc-button.no-background, .dhc-button.blog-list-small,.show-search a i:hover,.widget.widget_categories ul li a:hover,.breadcrumbs span a:hover, .breadcrumbs a:hover,.comment-list-wrap .comment-reply-link,.portfolio-single .content-portfolio-detail h3,.portfolio-single .content-portfolio-detail ul li:before, .dhc-list-star li:before, .dhc-list li:before,.navigation.posts-navigation .nav-links li a .meta-nav,.testimonial-sliders.style3 .author-name a,ul.iconlist .list-title a:hover,#mainnav > ul > li.current-menu-item > a:after,.fl-iconbox.style-4 .box-button a,.fl-iconbox.style-4 .box-button a:after,.blog-shortcode article .dhc-button,.fl-counter.style-2 .icon-wrap span,.fl-iconbox.icon-left .icon-wrap,.fl-counter .icon-wrap span { color:" . esc_attr($primary_color) . ";}"."\n";	

    	$custom .= " #Ellipse_7 circle,.testimonial-sliders .logo_svg path { fill:" . esc_attr($primary_color) . ";}"."\n";	

		// Background color
		$custom .= ".info-top-right a.appoinment, .wrap-header-content a.appoinment,button, input[type=button], input[type=reset], input[type=submit],.go-top:hover,.portfolio-filter.filter-2 li a:hover, .portfolio-filter.filter-2 li.active a,.entry-footer .social-share-article ul li a:hover,.dhc-button,.featured-post.blog-slider .flex-prev, .featured-post.blog-slider .flex-next,mark, ins,#dhc-portfolio-carousel ul.flex-direction-nav li a, .flex-direction-nav li a,.navigation.posts-navigation .nav-links li a:after,.title_related_portfolio:after,.navigation.loadmore a:hover,.owl-theme .owl-controls .owl-nav [class*=owl-],.widget.widget_tag_cloud .tagcloud a,.btn-menu:before, .btn-menu:after, .btn-menu span,.dhc_counter.style2 .dhc_counter-icon .icon,.blog-list article .dhc-button,.dhc_imagebox.style-3:hover .imagebox-content a,.fl-iconbox.style-4 .icon-wrap,.title-section h1:after,.blog-shortcode article .dhc-button:hover,.text-box .btn-cons a,.fl-has-line:after,#mainnav > ul > li.current-menu-item > a:after,#mainnav > ul > li > a:after,.fl-iconbox.icon-left.circle .icon-wrap,.wpcf7-form .flat-form-quote button,.brank.office .office-icon,.sidebar .widget.widget_nav_menu ul li.current-menu-item:before, .sidebar .widget.widget_nav_menu ul li.current-menu-item:hover::before,ul.dhc-list-star li:before,.sidebar .widget.widget_nav_menu ul li:hover,.flat-list-year ul li div:after,.dhc_imagebox.style2 .imagebox-title:before,.blog-post .dhc-button,.navigation.paging-navigation a:hover, .navigation.paging-navigation .current, .page-links a:hover, .page-links a:focus, .page-links > span { background-color:" . esc_attr($primary_color) . "; }"."\n";

		// Background color important
		$custom .= ".dhc_btnslider:not(:hover) {
			background-color:" . esc_attr($primary_color) . "!important;
		}"."\n";		

		// Border color
		$custom .= ".loading-effect-2 > span, .loading-effect-2 > span:before, .loading-effect-2 > span:after,textarea:focus, input[type=text]:focus, input[type=password]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=date]:focus, input[type=month]:focus, input[type=time]:focus, input[type=week]:focus, input[type=number]:focus, input[type=email]:focus, input[type=url]:focus, input[type=search]:focus, input[type=tel]:focus, input[type=color]:focus,select:focus,.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span,.navigation.loadmore a:hover,.dhc_imagebox.style-3:hover .imagebox-content a,.blog-shortcode article .dhc-button,.navigation.paging-navigation a:hover, .navigation.paging-navigation .current, .page-links a:hover, .page-links a:focus, .page-links > span { border-color:" . esc_attr($primary_color) . "}"."\n";

		// Border color important
		$custom .= " {
			border-color:" . esc_attr($primary_color) . "!important;
		}"."\n";	

		// Color #fff
		$custom .= " {
			color: #fff !important;
		}"."\n";	
		 
    }

    $custom .= " {
		background-color: #2e363a !important;
	}"."\n";	

	// Body color
	$body_text = get_theme_mod( 'body_text_color' );
	if ($body_text !='') {
		$custom .= "#Financial_Occult text,#F__x26__O tspan { fill:" . esc_attr( $body_text ) . ";}"."\n";
		$custom .= "body { color:" . esc_attr($body_text) . "}"."\n";
		$custom .= "a,.portfolio-filter li a,.dhc-portfolio .item .category-post a:hover,.title-section .title,ul.iconlist .list-title a,.breadcrumbs span a, .breadcrumbs a,.breadcrumbs span,h1, h2, h3, h4, h5, h6,strong,.testimonial-content blockquote,.testimonial-content .author-info,.sidebar .widget ul li a,.dhc_counter.style2 .dhc_counter-content-right,.dhc_counter.style2 .dhc_counter-content-left,.title_related_portfolio,.navigation.paging-navigation:not(.loadmore) a:hover, .navigation.paging-navigation .current, .page-links a:hover, .page-links a:focus,.widget_search .search-form input[type=search],.entry-meta ul,.entry-meta ul.meta-right,.entry-footer strong,.widget.widget_archive ul li:before, .widget.widget_categories ul li:before, .widget.widget_recent_entries ul li:before { color:" . esc_attr($body_text) . "}"."\n";
		//border bodycolor
		$custom .= ".owl-theme .owl-dots .owl-dot span,.widget .widget-title:after, .widget .widget-title:before,ul.iconlist li.circle:before { background-color:" . esc_attr($body_text) . "}"."\n";
	}

	// background bodycolor
	$custom .= ".navigation.paging-navigation:not(.loadmore) a:hover, .navigation.paging-navigation:not(.loadmore) .current, .page-links a:hover, .page-links a:focus, .page-links > span { border-color:" . esc_attr($body_text) . "}"."\n";

    if ( dhc_choose_opt ('top_background_color') !='' ) {
		$custom .= ".dhc-top { background-color:" . esc_attr(dhc_choose_opt ('top_background_color')) ." ; } "."\n";
    }	

    //Top text color
    $top_text_color = dhc_choose_opt( 'topbar_textcolor' );
    if ( dhc_choose_opt( 'topbar_textcolor' ) !='' ) {
		$custom .= ".dhc-top,.info-top-right,.dhc-top a { color:" . esc_attr( dhc_choose_opt( 'topbar_textcolor' ) ) ." ;} "."\n";
    }	  

    // Menu Background
	$mainnav_backgroundcolor = dhc_choose_opt( 'mainnav_backgroundcolor');	
	if ( $mainnav_backgroundcolor !='' ) {
		$custom .= ".nav.header-style2, .header.header-style1,.header.header-style3 { background:".esc_attr( $mainnav_backgroundcolor )." }"."\n";
	} 
   
	// Menu mainnav a color
	$mainnav_color = dhc_choose_opt( 'mainnav_color');
	if ( $mainnav_color !='' ) {
		$custom .= "#mainnav > ul > li > a { color:" . esc_attr( $mainnav_color ) . ";}"."\n";
	}

	// mainnav_hover_color
	$mainnav_hover_color = dhc_get_opt( 'mainnav_hover_color');
	if ( $mainnav_hover_color !='' ) {
		$custom .= "#mainnav > ul > li > a:hover,#mainnav > ul > li.current-menu-item > a { color:" . esc_attr( $mainnav_hover_color ) . " !important;}"."\n";
	}

	//Subnav a color
	$sub_nav_color = dhc_get_opt( 'sub_nav_color');
	if ( $sub_nav_color !='' ) {
		$custom .= "#mainnav ul.sub-menu > li > a { color:" . esc_attr( $sub_nav_color ) . "!important;}"."\n";
	}

	//Subnav background color
	$sub_nav_background = dhc_get_opt( 'sub_nav_background');
	if ( $sub_nav_background !='' ) {
		$custom .= "#mainnav ul.sub-menu { background-color:" . esc_attr( $sub_nav_background ) . ";}"."\n";			
	}

	//sub_nav_background_hover
	$sub_nav_background_hover = dhc_get_opt( 'sub_nav_background_hover');
	if ( $sub_nav_background_hover !='' ) {
		$custom .= "#mainnav ul.sub-menu > li > a:hover { background-color:" . esc_attr($sub_nav_background_hover) . "!important;}"."\n";
	}

	//border color sub nav
	$border_clor_sub_nav = dhc_get_opt( 'border_clor_sub_nav');
	if ( $border_clor_sub_nav !='' ) {
		$custom .= "#mainnav ul.sub-menu > li { border-color:" . esc_attr($border_clor_sub_nav) . "!important;}"."\n";
	}	

	// Footer simple background color
	$footer_background_color = dhc_choose_opt( 'footer_background_color');
	if ( $footer_background_color !='' ) {
		$custom .= ".footer { background-color:" . esc_attr($footer_background_color) . ";}"."\n";
	}

	// Footer simple text color
	$footer_text_color = dhc_choose_opt( 'footer_text_color');
	if ( $footer_text_color !='' ) {
		$custom .= ".footer a, .footer, .dhc-before-footer .custom-info > div,.footer-widgets ul li a,.footer-widgets .company-description p { color:" . esc_attr($footer_text_color) . ";}"."\n";
	}

	// bottom_background_color
	$bottom_background_color = dhc_choose_opt( 'bottom_background_color');
	if ( $bottom_background_color !='' ) {
		$custom .= ".bottom { background-color:" . esc_attr( $bottom_background_color ) . ";}"."\n";
	}

	// Bottom text color
	$bottom_text_color = dhc_choose_opt( 'bottom_text_color');
	if ( $bottom_text_color !='' ) {
		$custom .= ".bottom .copyright p,.bottom #menu-bottom li a { color:" . esc_attr( $bottom_text_color ) . ";}"."\n";
	}

	$custom .='.white #Financial_Occult text,.white #F__x26__O tspan {
						fill: #fff;
					}';

	// wp_add_inline_style( 'dhc-style', $custom );
	wp_add_inline_style( 'dhc-inline-css', $custom );
}

add_action( 'wp_enqueue_scripts', 'dhc_custom_styles' );

