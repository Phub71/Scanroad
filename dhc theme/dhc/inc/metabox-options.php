<?php
add_action( 'admin_init', 'dhc_page_options_init' );

function dhc_page_options_init() {   

    new dhc_meta_boxes(array(
    	// Portfolio
    	'id'	 => 'portfolio-options',
		'label'  => esc_html__( 'Causes Settings', 'dhc' ),
		'post_types'  => 'portfolios',
	    'context'     => 'normal',
        'priority'    => 'default',
		'sections' => array(
            'general'   => array( 'title' => esc_html__( 'General', 'dhc' ) ),
			),
		'options' => dhc_portfolio_options_fields()
	));	

	new dhc_meta_boxes(array( 
        'id'          => 'page-options',
        'label'       => esc_html__( 'Page Options', 'dhc' ),
        'post_types'  => 'page',
        'context'     => 'normal',
        'priority'    => 'default',       

        'sections' => array(
            'general'   => array( 'title' => esc_html__( 'General', 'dhc' ) ),
            'header'    => array( 'title' => esc_html__( 'Header', 'dhc' ) ),
            'footer'    => array( 'title' => esc_html__( 'Footer', 'dhc' ) ),            
            'blog'      => array( 'title' => esc_html__( 'Blog', 'dhc' ) )
        ),

        'options' => dhc_page_options_fields()
    ) );

    new dhc_meta_boxes(array(
		// event
		'id' 	=> 'blog-options',
		'label'	=> esc_html__( 'Post settings', 'dhc' ),
		'post_types'	=> array('post','faq'),
		'context'     => 'normal',
        'priority'    => 'default',
		'sections' => array(
            'blog'   => array( 'title' => esc_html__( 'Blog', 'dhc' ) ),
			),
		'options' => dhc_post_options_fields()
	));

    new dhc_meta_boxes(array(
        // event
        'id'    => 'testimonial-options',
        'label' => esc_html__( 'Testimonial Details', 'dhc' ),
        'post_types'    => 'testimonial',
        'context'     => 'normal',
        'priority'    => 'default',
        'sections' => array(
            'testimonial_details'   => array( 'title' => esc_html__( 'Testimonial Details', 'dhc' ) ),
            ),
        'options' => dhc_testimonial_options_fields()
    ));
}

add_action( 'admin_enqueue_scripts', 'dhc_admin_script_meta_box' );

/**
 * Enqueue script for handling actions with meta boxes
 *
 * @return void
 * @since 1.0
 */
function dhc_admin_script_meta_box() {
	$screen = get_current_screen();	
	wp_enqueue_script( 'dhc-meta-box', dhc_LINK . 'js/admin/meta-boxes.js', array('customize-preview'), '1.1' );
}

function dhc_load_custom_wp_admin_style() {
    wp_register_style( 'dhc_wp_admin_css', dhc_LINK .'js/admin/style.css', false, '1.0.0' );       
    wp_enqueue_style( 'dhc_wp_admin_css' );
}

add_action( 'admin_enqueue_scripts', 'dhc_load_custom_wp_admin_style' );
