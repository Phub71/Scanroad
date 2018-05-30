<?php
/**
 * Return the default options of the theme
 * 
 * @return  void
 */

function dhc_customize_default_options2($key) {
	$default = array(
		'bread_crumb_prefix' =>'',
		'breadcrumb_separator' =>  esc_html('>', 'dhc'),
		'footer_widget_areas'				=> 3,
		'logo_height' => 50,
		'menu_location_primary' => 'primary',
		'site_logo'	=> dhc_LINK . 'images/logo.png',
		'site_retina_logo' => dhc_LINK . 'images/logo@2x.png',
		'social_links'	=> array ("facebook" => 'facebook.com/dhc', "twitter"=>"#", "google-plus"=>"#", "linkedin"=>"#"),
		'socials_link_footer' => 0,
		'pagetitle_style'=>'style-1',		
		'page_title_overlay' => 0,
		'pagetitle_padding' => 55,
		'page_title_heading' => 0,		
		'pagetitle_text_color'	=> '#222',
		'pagetitle_link_color'  => '#2691e4',
		'pagetitle_background_color' => '#f7f7f7',

		'enable_social_link'  => 1,
		'logo_margin_top' 	  => 25,
		'show_page_title'	  => 0,
		'enable_content_right_top'  => 1,
		'top_background_color'	=> '#18364a',
		'topbar_textcolor'	=> '#ffffff',
		'mainnav_backgroundcolor'=>'#fff',
		'mainnav_color'		=> '#424242',
		'mainnav_hover_color'=>'#2691e4',
		'sub_nav_color'		=>'#fff',
		'sub_nav_background'=>'#1d2738',
		'border_clor_sub_nav'=>'#2d374a',
		'sub_nav_background_hover'=>'#2691e4',
		'primary_color'=>'#2691e4',
		'body_text_color'=>'#878c9b',
		'body_font_name'	=> array(
			'family' => 'Karla',
			'style'  => '400',
			'size'   => '18',
			'line_height'=>'27'
			), 
		'header_style'	=> 'header-style1',
		'header_content'	=> '<ul>
			<li>
				<i class=" icon_pin_alt"></i>
				<strong style="margin-bottom:5px">Office Address</strong>
				<p style="font-size:15px">PO Box 16122 Collins Street West </p>
			</li>
			<li>
				<i class="icon_clock_alt"></i>
				<strong style="margin-bottom:5px">Open House</strong><p style="font-size:15px">
				Mon - Sat: 8.30 am - 5.30 pm
				</p>
			</li>
			<li>
				<i class="ion-android-call"></i>
				<strong style="margin-bottom:5px">Call Us</strong><p style="font-size:15px">
				+61 3 8376 6284
			</li>
		</ul>',
		'headings_font_name'	=> array(
			'family' => 'Karla',
			'style'  => '700'			
			),
		'h1_size' => 32,
		'h2_size' => 25,
		'h3_size' => 22,
		'h4_size' => 18,
		'h5_size' => 15,
		'h6_size' => 14,
		'breadcrumb_enabled' => 1,
		'show_post_paginator' => 0,
		'blog_grid_columns' => 3,
		'testimonial_rating' => 0,
		'blog_layout' => 'sidebar-right',
		'page_layout' => 'sidebar-left',
		'blog_archive_layout' => 'blog-list',
		'blog_archive_post_excepts_length' => 51,
		'blog_grid_layout'   => 'two-columns',
		'related_post_style'	=> 'blog-grid',
		'blog_sidebar_list'		  => 'blog-sidebar',
		'blog_archive_show_post_meta'	=> 1,		
		'blog_archive_readmore' => 1,
		'blog_archive_post_excepts_length' => 55,
		'blog_archive_readmore_text' => 'Read More',
		'blog_archive_pagination_style' => 'pager-numeric',
		'blog_posts_per_page'	=> 9,
		'blog_order_by'	=> 'date',
		'blog_order_direction' => 'DESC',
		'page_sidebar_list'	=> 'blog-sidebar',
		'menu_font_name'	=> array(
			'family' => 'Karla',
			'style'  => '700',
			'size'   => '15',
			'line_height'=>'100',
			),
		'show_readmore'	  => 1,
		// 'show_filter_portfolio' => 1,
		// 'portfolio_style'		=>'grid',
		// 'grid_columns_portfolio' => 'one-three',
		// 'portfolio_exclude' =>'',
		// 'portfolio_archive_pagination_style' => 'pager-numeric',
		// 'portfolio_grid_columns' => 'one-four',		
		// 'portfolio_post_perpage'	=> 9,
		// 'portfolio_order_by'	=> 'date',
		// 'portfolio_order_direction' => 'DESC',
		// 'portfolio_category_order' => '',
		// 'portfolio_single_style'	=> 'right_content',
		// 'related_portfolio_style' => 'grid',
		// 'grid_columns_portfolio_related' => 'one-half',
		// 'number_related_portfolio' => 2,
		// 'show_related_portfolio' => 1,		
		'enable_custom_topbar'  => 0,
		'enable_page_callout'	=> 0,
		'topbar_enabled' => 0,
		'header_sticky' => 1,
		'header_searchbox' => 0,
		'onepage_nav_script'=> 0,	
		'show_post_navigator' => 1,
		'breadcrumb_prefix'	  => '/',
		'footer_background_color'	=> '#091b27',
		'footer_text_color'			=> '#cecece',
		'bottom_background_color'	=> '#071621 ',
		'bottom_text_color'			=> '#cecece',
		'go_top'					=> 1,
		'layout_version'			=> 'wide',		
		'footer_copyright'			=> '<p>Coyright <i class="fa fa-copyright" aria-hidden="true"></i>
 		2017 DCH Logistics. All rights reserved.</p>',
		'top_content' => '
		<ul>
			<li>
				<i class="fa fa-phone"></i>Call us: +61 3 8376 6284     
			</li>
			<li>
				<i class="fa fa-envelope"></i> <a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">Email: support24-7@gmail.com</a> 
			</li>

		</ul>	
		',
		'top_content_right' => '<div class="info-top-right">		
		<a class="appoinment" href="#">REQUEST A QUOTE</a>
	</div>',
	);
	return $default[$key];
}

/**
 * Return an array that used to declare options
 * for the page
 * 
 * @return  array
 */
function dhc_portfolio_options_fields() {
	$options['cover_heading'] = array(
		'type' => 'heading',
		'section' => 'general',
		'title' => esc_html__( 'Portfolio', 'dhc' ),
		'description' => esc_html__( 'This is an special option, it allow to set Portfolio informations.', 'dhc' )
		);

	$options['icon_portfolio'] = array(
		'type'    => 'text',
		'section' => 'general',
		'title' => esc_html__( 'Icon for services', 'dhc' ),
		'default' => ''
	);

	$options['gallery_portfolio'] = array(
	'type'    => 'image-control',
	'section' => 'general',
	'title' => esc_html__( 'Images', 'dhc' ),
	'default' => ''
	);

	dhc_prepare_options($options);
	return $options;
}

function dhc_testimonial_options_fields() {
	$options['cover_heading'] = array(
		'type' => 'heading',
		'section' => 'testimonial_details',
		'title' => esc_html__( 'Testimonial Details', 'dhc' ),
		);

	$options['testimonial_subtitle'] = array(
		'type'    => 'text',
		'section' => 'testimonial_details',
		'title' => esc_html__( 'Subtitle', 'dhc' ),
		'default' => ''
		);

	$options['testimonial_company'] = array(
		'type'    => 'text',
		'section' => 'testimonial_details',
		'title' => esc_html__( 'Company', 'dhc' ),
		'default' => ''
		);

	$options['testimonial_rating'] = array(
		'type'    => 'select',
		'section' => 'testimonial_details',
		'title'   => esc_html__( 'Ratings', 'dhc' ),
		'default' => dhc_get_opt('testimonial_rating'),
		'choices'   => array(
				'5' => esc_html__('5 Stars','dhc'),
				'4' => esc_html__('4 Stars','dhc'),
				'3' => esc_html__('3 Stars','dhc'),
				'2' => esc_html__('2 Stars','dhc'),
				'1' => esc_html__('1 Stars','dhc'),
				'0' => esc_html__('No Rating','dhc')
			)
	);

	$options['testimonial_link'] = array(
		'type'    => 'text',
		'section' => 'testimonial_details',
		'title' => esc_html__( 'Link', 'dhc' ),
		'default' => ''
	);

	dhc_prepare_options($options);
	return $options;
}

function dhc_post_options_fields() {
	$options['blog_heading'] = array(
		'type' => 'heading',
		'section' => 'blog',
		'title' => esc_html__( 'Dear friends,', 'dhc' ),
		'description' => esc_html__( 'Option just view if post format is gallery or video! <br/>Thanks!', 'dhc' )
		);
	$options['gallery_images_heading'] = array(
		'type' => 'heading',
		'section' => 'blog',
		'title' => esc_html__( 'Post Format: Gallery .', 'dhc' ),
		'description' => esc_html__( '', 'dhc' )
		);

	$options['gallery_images'] = array(
		'type'    => 'image-control',
		'section' => 'blog',
		'title' => esc_html__( 'Images', 'dhc' ),
		'default' => ''
		);

	$options['video_url_heading'] = array(
		'type' => 'heading',
		'section' => 'blog',
		'title' => esc_html__( 'Post Format: Video ( Embeded video from youtube, vimeo ...).', 'dhc' ),
		'description' => esc_html__( '', 'dhc' )
		);

	$options['video_url'] = array(
		'type'    => 'textarea',
		'section' => 'blog',
		'title' => esc_html__( 'iframe video link', 'dhc' ),
		'default' => ''
		);
	dhc_prepare_options($options);
	return $options;
}

function dhc_blog_options_fields() {
	$options['position_field_heading'] = array(
		'type' => 'heading',
		'section' => 'events',
		'title' => esc_html__( 'Events', 'dhc' ),
		'description' => esc_html__( 'This is an special option, it allow to set Causes informations.', 'dhc' )
		);

	$options['position_field'] = array(
		'type'    => 'text',
		'section' => 'events',
		'title' => esc_html__( 'Position', 'dhc' ),
		'default' => ''
		);

	$options['address'] = array(
		'type'    => 'textarea',
		'section' => 'events',
		'title' => esc_html__( 'Address', 'dhc' ),
		'default' => ''
		);

	$options['event_time'] = array(
		'type'    => 'datetime',
		'section' => 'events',
		'title' => esc_html__( 'Event date time', 'dhc' ),
		'default' => ''
		);

	$options['event_link'] = array(
		'type'    => 'text',
		'section' => 'events',
		'title' => esc_html__( 'Link to join', 'dhc' ),
		'default' => ''
		);
	dhc_prepare_options($options);
	return $options;
}
function dhc_page_options_fields() {
	global $wp_registered_sidebars;
	$patterns = themes_predefined_background_patterns();

	$options  = array();
	$sidebars = array();

	// Retrieve all registered sidebars
	foreach( $wp_registered_sidebars as $params )
		$sidebars[$params['id']] = $params['name'];

	/**
	 * General
	 */	
	$options['layout_heading'] = array(
		'type' => 'heading',
		'section' => 'general',
		'title' => esc_html__( 'Layout', 'dhc' ),
		'description' => esc_html__( 'Choose between a full or a boxed layout to set how this page layout will look like.', 'dhc' )
		);

	$options['enable_custom_layout'] = array(
		'type'    => 'power',
		'title'   => esc_html__( 'Enable Custom Layout', 'dhc' ),
		'section' => 'general',
		'children'=> array('layout_version','page_layout','sidebar_default','page_sidebar_list'),
		'default' => false
		);

	$options['layout_version'] = array(
		'type'    => 'select',
		'title'   => esc_html__( 'Display Style', 'dhc' ),
		'section' => 'general',
		'default' => 'wide',
		'choices' => array(
			'wide'  =>  esc_html__( 'Wide', 'dhc' ),
			'boxed'  =>  esc_html__( 'Boxed', 'dhc' )
			)
		);

	$options['page_layout'] = array(
		'type'    => 'select',
		'title'   => esc_html__( 'Sidebar Position', 'dhc' ),
		'section' => 'general',
		'default' => 'sidebar-right',
		'choices' => array(
			'fullwidth' => esc_html__( 'No Sidebar', 'dhc' ),
			'sidebar-left' => esc_html__( 'Sidebar Left', 'dhc' ),
			'sidebar-right' =>  esc_html__( 'Sidebar Right', 'dhc' )
			)
		);

	$options['page_sidebar_list'] = array(
		'type'    => 'dropdown-sidebar',
		'title'   => esc_html__( 'Custom Sidebar', 'dhc' ),
		'section' => 'general',
		'default' => 'sidebar-page'
		);

	
	/**
	 * Header
	 */
	$options['topbar_heading'] = array(
		'type' => 'heading',
		'section' => 'header',
		'title' => esc_html__( 'Top Bar', 'dhc' ),
		'description' => esc_html__( 'Turn on/off the top bar and change it styles.', 'dhc' )
		);

	$options['enable_custom_topbar'] = array(
		'type'    => 'power',
		'title'   => esc_html__( 'Enable Custom Topbar', 'dhc' ),
		'section' => 'header',
		'children' => array('topbar_enabled','enable_content_right_top','top_background_color','topbar_textcolor','top_content','top_content_right','enable_social_link'),
		'default' => false
		);

	$options['topbar_enabled'] = array(
		'type'    => 'power',
		'title'   => esc_html__( 'Display Topbar On This Page', 'dhc' ),
		'section' => 'header',
		'default' => ( 'topbar_enabled' )
		);

	$options['enable_social_link'] = array(
		'type'    => 'power',
		'title'   => esc_html__( 'Enable Social Links', 'dhc' ),
		'section' => 'header',
		'default' => ( 'enable_social_link' )
		);

	$options['enable_content_right_top'] = array(
		'type'    => 'power',
		'title'   => esc_html__( 'Enable Content Right Top', 'dhc' ),
		'section' => 'header',
		'default' => ( 'enable_content_right_top' )
		);

	$options['top_background_color'] = array(
		'type'    => 'color-picker',
		'title'   => esc_html__( 'Topbar Background', 'dhc' ),
		'section' => 'header',
		'default' => dhc_get_opt( 'top_background_color' )
		);

	$options['topbar_textcolor'] = array(
		'type'    => 'color-picker',
		'title'   => esc_html__( 'Topbar Text Color', 'dhc' ),
		'section' => 'header',
		'default' => dhc_get_opt( 'topbar_textcolor' )
		);

	$options['top_content'] = array(
		'type'    => 'textarea',
		'title'   => esc_html__( 'Content Left', 'dhc' ),
		'section' => 'header',
		'default' => dhc_get_opt( 'top_content' )
		);

	$options['top_content_right'] = array(
		'type'    => 'textarea',
		'title'   => esc_html__( 'Content Right', 'dhc' ),
		'section' => 'header',
		'default' => dhc_get_opt( 'top_content_right' )
		);

	$options['header_style_heading'] = array(
		'type'        => 'heading',
		'section'     => 'header',
		'title'       => esc_html__( 'Custom Header', 'dhc' ),
		'description' => esc_html__( 'Change the header style, toggle sticky header feature and turn on/off extra menu icons.', 'dhc' )
		);

	$options['enable_custom_header_style'] = array(
		'type'    => 'power',
		'title'   => 'Enable Custom Styles',
		'title'   => esc_html__( 'Enable Custom Header', 'dhc' ),
		'section' => 'header',
		'children' => array('header_sticky','header_searchbox','header_show_offcanvas','header_image','header_content','header_style','logo_margin_top'),
		'default' => false
		);

	$options['logo_margin_top'] = array(
		'type' => 'text',
		'title'   => esc_html__( 'Logo Margin Top', 'dhc' ),
		'section' => 'header',
		'default' => dhc_customize_default_options2('logo_margin_top')
		);

	$options['header_style'] = array(
		'type'    => 'radio-images',
		'title'   => esc_html__( 'Header Style', 'dhc' ),
		'section' => 'header',
		'default' => dhc_customize_default_options2('header_style'),
		'choices' => array (
                'header-style1' => array (
                    'tooltip'   => esc_html( 'Header Style 1','dhc' ),
                    'src'       => dhc_LINK . 'images/controls/header1.jpg'
                ) ,
                'header-style2'=>  array (
                    'tooltip'   => esc_html( 'Header Style 2','dhc' ),
                    'src'       => dhc_LINK . 'images/controls/header2.jpg'
                ) ,
               'header-style3'=>  array(
                    'tooltip'   => esc_html( 'Header Style 3','dhc' ),
                    'src'       => dhc_LINK . 'images/controls/header3.jpg'
                ) ,
               'header-style4'=>  array(
                    'tooltip'   => esc_html( 'Header Style 4','dhc' ),
                    'src'       => dhc_LINK . 'images/controls/header4.jpg'
                ) ,
            )
		);


	$options['header_content'] = array(
		'type'    => 'textarea',
		'title'   => esc_html__( 'Header Content', 'dhc' ),
		'section' => 'header',
		'default' => dhc_get_opt( 'header_content' )
		);

	$options['header_sticky'] = array(
		'type'    => 'power',
		'section' => 'header',
		'title'   => esc_html__( 'Enable Sticky Header', 'dhc' )
		);

	$options['header_searchbox'] = array(
		'type'    => 'power',
		'section' => 'header',
		'title'   => esc_html__( 'Show Search Menu', 'dhc' ),
		'default' => ( 'header_searchbox' )
		);

	$options['navigator_heading'] = array(
		'type'        => 'heading',
		'section'     => 'header',
		'title'       => esc_html__( 'Navigator', 'dhc' ),
		'description' => esc_html__( 'Just select your menu that you wish assign it to the location on the theme.', 'dhc' )
		);

	$options['enable_custom_navigator'] = array(
		'type'    => 'power',
		'section' => 'header',
		'title'   => esc_html__( 'Enable Custom Navigator', 'dhc' ),
		'children' => array('onepage_nav_script','mainnav_color','mainnav_backgroundcolor','menu_location_primary'),
		'default' => false
		);

	$options['mainnav_backgroundcolor'] = array(
		'type'    => 'color-picker',
		'title'   => esc_html__( 'Mainnav Background', 'dhc' ),
		'section' => 'header',
		'default' => dhc_get_opt( 'mainnav_backgroundcolor' )
		);

	$options['mainnav_color'] = array(
		'type'    => 'color-picker',
		'title'   => esc_html__( 'Mainnav Color', 'dhc' ),
		'section' => 'header',
		'default' => dhc_get_opt( 'mainnav_color' )
		);

	$options['onepage_nav_script'] = array(
		'type'    => 'power',
		'section' => 'header',
		'title'   => esc_html__( 'Load One Page Navigator Script', 'dhc' ),
		'default' => dhc_get_opt( 'onepage_nav_script' )
		);

	// Navigator
	$menus     = wp_get_nav_menus();

	if ( $menus ) {
		$choices = array( 0 => esc_html__( '-- Select --', 'dhc' ) );
		foreach ( $menus as $menu ) {
			$choices[ $menu->term_id ] = wp_html_excerpt( $menu->name, 40, '&hellip;' );
		}

		$options["menu_location_primary"] = array(
				'title'   => esc_html__('Choose menu for page','dhc'),
				'section' => 'header',
				'type' 	  => 'select',
				'choices' => $choices,
				'default' => dhc_customize_default_options2('menu_location_primary')
			);
	}

	/**
	 * Footer
	 */	
	$options['footer_widgets_heading'] = array(
		'type'        => 'heading',
		'section'     => 'footer',
		'title'       => esc_html__( 'Footer Widgets', 'dhc' ),
		'description' => esc_html__( 'This section allow to change the layout and styles of footer widgets to match as you need.', 'dhc' )
		);

	$options['enable_custom_footer_widgets'] = array(
		'type'    => 'power',
		'title'   => esc_html__( 'Enable Custom Footer Widgets', 'dhc' ),
		'section' => 'footer',
		'children'=> array('footer_background_color','footer_text_color','footer_widget_areas'),
		'default' => false
		);

	$options['footer_widget_areas'] = array(
		'type'    => 'select',
		'title'   => esc_html__( 'Footer Widget Layout', 'dhc' ),
		'section' => 'footer',
		'choices'   => array(                
                1     => esc_html( '1 Columns', 'dhc' ),
                2     => esc_html( '2 Columns', 'dhc' ),
                3     => esc_html( '3 Columns', 'dhc' ),
                4     => esc_html( '4 Columns', 'dhc' ),                
            ),
		'default' => dhc_customize_default_options2('footer_widget_areas')
		);

	$options['footer_background_color'] = array(
		'type'    => 'color-picker',
		'title'   => esc_html__( 'Footer Background', 'dhc' ),
		'section' => 'footer',
		'default' => dhc_get_opt( 'footer_background_color' )
		);

	$options['footer_text_color'] = array(
		'type'    => 'color-picker',
		'title'   => esc_html__( 'Footer Text Color', 'dhc' ),
		'section' => 'footer',
		'default' => dhc_get_opt( 'footer_text_color' )
		);
	
	$options['footer_heading'] = array(
		'type'        => 'heading',
		'class'       => 'no-border',
		'section'     => 'footer',
		'title'       => esc_html__( 'Custom Footer', 'dhc' ),
		'description' => esc_html__( 'You can change the copyright text, show/hide the social icons on the footer.', 'dhc' )
		);

	$options['enable_custom_footer'] = array(
		'type'    => 'power',
		'title'   => esc_html__( 'Enable Custom Footer Content', 'dhc' ),
		'section' => 'footer',
		'children'=>array('socials_link_footer','footer_copyright','bottom_text_color','bottom_background_color'),
		'default' => false
		);

	$options['footer_copyright'] = array(
		'type'    => 'textarea',
		'title'   => esc_html__( 'Copyright', 'dhc' ),
		'section' => 'footer',
		'default' => dhc_customize_default_options2( 'footer_copyright' )
		);

	$options['bottom_background_color'] = array(
		'type'    => 'color-picker',
		'title'   => esc_html__( 'Bottom Background Color', 'dhc' ),
		'section' => 'footer',
		'default' => dhc_get_opt( 'bottom_background_color' )
		);

	$options['bottom_text_color'] = array(
		'type'    => 'color-picker',
		'title'   => esc_html__( 'Bottom Text Color', 'dhc' ),
		'section' => 'footer',
		'default' => dhc_get_opt( 'bottom_text_color' )
		);	

	/**
	 * Blog Options
	 */
	$options['blog_list_heading'] = array(
		'type'        => 'heading',
		'class'       => 'no-border',
		'section'     => 'blog',
		'title'       => esc_html__( 'Blog', 'dhc' ),
		'description' => esc_html__( 'All options in this section will be used to make style for blog page.', 'dhc' )
		);

	$options['enable_custom_blog'] = array(
		'type'    => 'power',
		'title'   => esc_html__( 'Enable Custom Blog layout', 'dhc' ),
		'section' => 'blog',
		'children'=> array('blog_grid_columns','blog_archive_post_excepts','blog_archive_post_excepts_length','blog_archive_show_post_meta','blog_archive_readmore','blog_archive_readmore_text','blog_posts_per_page','blog_order_by','blog_order_direction','blog_archive_pagination_style','blog_show_content', 'blog_archive_layout'),		
		'default' => false
		);

	$options['blog_grid_columns'] = array(
		'type'    => 'select',
		'section' => 'blog',
		'title'   => esc_html__( 'Grid Columns', 'dhc' ),
		'default' => dhc_customize_default_options2('blog_grid_columns'),
		'choices' => array(
			2 => esc_html__( '2 Columns', 'dhc' ),
			3 => esc_html__( '3 Columns', 'dhc' ),
			4 => esc_html__( '4 Columns', 'dhc' )
			)
		);	

	$options['blog_archive_layout'] = array(
		'type'    => 'select',
		'title'   => esc_html__( 'Blog Layout', 'dhc' ),
		'section' => 'blog',
		'default' => dhc_customize_default_options2('blog_archive_layout'),
		'choices' => array(
			'blog-list' =>  esc_html( 'Blog List','dhc' ),
            'blog-list-small'=>  esc_html( 'Blog List Small','dhc' ),
            'blog-grid'=>   esc_html( 'Blog Grid','dhc' ),
			)
		);

	$options['blog_archive_post_excepts_length'] = array(
		'type'    => 'text',
		'title'   => esc_html__( 'Post Excepts Length', 'dhc' ),
		'section' => 'blog',
		'default' => dhc_customize_default_options2('blog_archive_post_excepts_length')
		);	

	$options['blog_archive_readmore'] = array(
		'type'    => 'power',
		'title'   => esc_html__( 'Show Read More', 'dhc' ),
		'section' => 'blog',
		'default' => true,
		'children' => array ('blog_archive_readmore_text')
		);

	$options['blog_archive_readmore_text'] = array(
		'type'    => 'text',
		'title'   => esc_html__( 'Read More Text', 'dhc' ),
		'section' => 'blog',
		'default' =>dhc_customize_default_options2('blog_archive_readmore_text')
		);

	$options['blog_posts_per_page'] = array(
		'type'     => 'spinner',
		'section'  => 'blog',
		'title'    => esc_html__( 'Posts Per Page', 'dhc' ),
		'default'  => get_option( 'posts_per_page' )
		);

	$options['blog_archive_pagination_style'] = array(
		'type'    => 'select',
		'title'   => esc_html__( 'Pagination Style', 'dhc' ),
		'section' => 'blog',
		'default' => dhc_customize_default_options2('blog_archive_pagination_style'),
		'choices' => array(
			'pager' =>  esc_html__( 'Pager', 'dhc' ),
			'numeric' =>  esc_html__( 'Numeric', 'dhc' ),
			'pager-numeric' =>  esc_html__( 'Pager & Numeric', 'dhc' ),
			'loadmore' =>  esc_html__( 'Load More', 'dhc' )
			)
		);
	
	dhc_prepare_options($options);
	
	return $options;
}
function dhc_prepare_options($options) {
	$flat_data = get_option('flatopts');
	$flatopts = array();
	if(!is_array($flat_data)) $flat_data = array();
	$children = array_map(function ($ar) {if (isset($ar['children'])){ return $ar['children'];}}, $options);
	$children = array_filter($children);
	foreach ($children as $key => $value) {
		if (is_array($value)) {
			foreach ($value as $_key => $_value) {
				$flatopts[$_value] = $key;
			}
		}
		else {
			$flatopts[$value] = $key;
		}
	}
	$flat_data = array_merge($flat_data,$flatopts);
	update_option('flatopts',$flat_data);
}
