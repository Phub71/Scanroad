<?php
/**
 * DHC Theme Customizer
 *
 * @package DHC
 */

function dhc_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_section( 'header_image' )->title = esc_html('Backgound PageTitle', 'dhc');
    $wp_customize->get_section( 'header_image' )->priority = '22';   
    $wp_customize->get_section( 'title_tagline' )->priority = '1';
    $wp_customize->get_section( 'title_tagline' )->title = esc_html('General', 'dhc');
    $wp_customize->get_section( 'colors' )->title = esc_html('Layout Style', 'dhc');  
  
    //Heading
    class dhc_Info extends WP_Customize_Control {
        public $type = 'heading';
        public $label = '';
        public function render_content() {
        ?>
            <h3 class="dhc-title-control"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }    

    //Title
    class dhc_Title_Info extends WP_Customize_Control {
        public $type = 'title';
        public $label = '';
        public function render_content() {
        ?>
            <h4><?php echo esc_html( $this->label ); ?></h4>
        <?php
        }
    }    

    //Desc
    class dhc_Theme_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }    

    //Desc
    class dhc_Desc_Info extends WP_Customize_Control {
        public $type = 'desc';
        public $label = '';
        public function render_content() {
        ?>
            <p class="dhc-desc-control"><?php echo esc_html( $this->label ); ?></p>
        <?php
        }
    }       


    //___General___//
    $wp_customize->add_setting('dhc_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );

    // Heading site infomation
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'custom-stie-infomation', array(
        'label' => esc_html('SITE INFORMATION', 'dhc'),
        'section' => 'title_tagline',
        'settings' => 'dhc_options[info]',
        'priority' => 1
        ) )
    );    

    // Desc site infomaton
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc_customizer_siteinfomation', array(
        'label' => esc_html('This section have basic information of your site, just change it to match with you need.', 'dhc'),
        'section' => 'title_tagline',
        'settings' => 'dhc_options[info]',
        'priority' => 2
        ) )
    );  

  //  =============================
    //  // Socials              //
    //  =============================
    $wp_customize->add_section(
        'dhc_socials',
        array(
            'title'         => esc_html('Socials', 'dhc'),
            'priority'      => 2,
            'sanitize_callback' => 'dhc_sanitize_text',
        )
    ); 

      // social links
    $wp_customize->add_setting(
      'social_links',
      array(
        'sanitize_callback' => 'esc_attr',
        'default' => dhc_customize_default_options2('social_links'),     
      )   
    );

    $wp_customize->add_control( new SocialIcons($wp_customize,
        'social_links',
        array(
            'type' => 'social-icons',
            'label' => esc_html('Social', 'dhc'),
            'section' => 'dhc_socials',
            'priority' => 1,
        ))
    );      

    //___Header___//
    $wp_customize->add_section(
        'dhc_header',
        array(
            'title'         => esc_html('Header', 'dhc'),
            'priority'      => 2,
        )
    );

    // Heading custom logo
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'custom-logo', array(
        'label' => esc_html('Custom Logo', 'dhc'),
        'section' => 'dhc_header',
        'settings' => 'dhc_options[info]',
        'priority' => 2
        ) )
    );    

    // Desc custon logo
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc_customizer_logo', array(
        'label' => esc_html('In this section You can upload your own custom logo, change the way your logo can be displayed', 'dhc'),
        'section' => 'dhc_header',
        'settings' => 'dhc_options[info]',
        'priority' => 3
        ) )
    );    

    //Logo
    $wp_customize->add_setting(
        'site_logo',
        array(
            'default' => dhc_customize_default_options2('site_logo'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => esc_html( 'Upload your logo ', 'dhc' ),
               'description'    => esc_html( 'The best size is 168x50px ( If you don\'t display logo please remove it your website display 
                Site Title default in General )', 'dhc' ),
               'type'           => 'image',
               'section'        => 'dhc_header',
               'priority'       => 5,
            )
        )
    );

    // Logo Retina
    $wp_customize->add_setting(
        'site_retina_logo',
        array(
            'default'           => dhc_customize_default_options2('site_retina_logo'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_retina_logo',
            array(
               'label'          => esc_html( 'Upload your logo retina', 'dhc' ),
               'description'    => esc_html( 'The best size is 372x90px', 'dhc' ),
               'type'           => 'image',
               'section'        => 'dhc_header',
               'priority'       => 6,
            )
        )
    );

    // Logo Size
    $wp_customize->add_control( new dhc_Title_Info( $wp_customize, 'logo-size', array(
        'label' => esc_html('Logo Size', 'dhc'),
        'section' => 'dhc_header',
        'settings' => 'dhc_options[info]',
        'priority' => 7
        ) )
    );  

    // Height
    $wp_customize->add_setting(
        'logo_height',
        array(
            'default' => dhc_customize_default_options2('logo_height'),
            'sanitize_callback' => 'dhc_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'logo_height',
        array(
            'label' => esc_html( 'Height (px)', 'dhc' ),
            'section' => 'dhc_header',
            'type' => 'text',
            'priority' => 9
        )
    );  

    // Box control
    $wp_customize->add_setting(
        'logo_margin_top',
        array(
            'default' => dhc_customize_default_options2('logo_margin_top'),
            'sanitize_callback' => 'dhc_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'logo_margin_top',
        array(
            'label' => esc_html( 'Margin Top', 'dhc' ),
            'section' => 'dhc_header',
            'type' => 'text',
            'priority' => 10
        )
    );  

    // Heading Header Style     
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'header_style', array(
        'label' => esc_html('Header Style', 'dhc'),
        'section' => 'dhc_header',
        'settings' => 'dhc_options[info]',
        'priority' => 12
        ) )
    );     

    // Desc
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc_header', array(
        'label' => esc_html('Change the header style, toggle sticky header feature and turn on/off extra menu', 'dhc'),
        'section' => 'dhc_header',
        'settings' => 'dhc_options[info]',
        'priority' => 12
        ) )
    );     

     $wp_customize->add_setting(
        'header_style',
        array(
            'default'           => dhc_customize_default_options2('header_style'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new RadioImages($wp_customize,
        'header_style',
        array (
            'type'      => 'radio-images',           
            'section'   => 'dhc_header',
            'priority'  => 13,
            'label'         => esc_html('Header Style', 'dhc'),
            'choices'   => array (
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
            ),
        ))
    );

    // Read More Text
    $wp_customize->add_setting (
        'header_content',
        array(
            'default' => dhc_customize_default_options2('header_content'),
            'sanitize_callback' => 'dhc_sanitize_text'
        )
    );

    $wp_customize->add_control(
        'header_content',
        array(
            'type'      => 'textarea',
            'label'     => esc_html('Header Content', 'dhc'),
            'section'   => 'dhc_header',
            'priority'  => 14
        )
    );

      // Header Sticky
    $wp_customize->add_setting(
      'header_searchbox',
        array(
            'sanitize_callback' => 'dhc_sanitize_checkbox',
            'default' => dhc_customize_default_options2('header_searchbox'),     
        )   
    );

    $wp_customize->add_control(
        'header_searchbox',
        array(
            'type' => 'checkbox',
            'label' => esc_html('Show search', 'dhc'),
            'section' => 'dhc_header',
            'priority' => 15,
        )
    );  


      // Header Sticky
    $wp_customize->add_setting(
      'header_sticky',
        array(
            'sanitize_callback' => 'dhc_sanitize_checkbox',
            'default' => dhc_customize_default_options2('header_sticky'),     
        )   
    );

    $wp_customize->add_control(
        'header_sticky',
        array(
            'type' => 'checkbox',
            'label' => esc_html('Enable sticky header', 'dhc'),
            'section' => 'dhc_header',
            'priority' => 15,
        )
    );  

    // Heading Top Bar 
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'top-bar', array(
        'label' => esc_html('Top Bar', 'dhc'),
        'section' => 'dhc_header',
        'settings' => 'dhc_options[info]',
        'priority' => 16
        ) )
    );    

    // Desc Top Bar 
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc', array(
        'label' => esc_html('Turn on/off the top bar and change it styles', 'dhc'),
        'section' => 'dhc_header',
        'settings' => 'dhc_options[info]',
        'priority' => 17
        ) )
    );  

    // Top bar
    $wp_customize->add_setting(
      'topbar_enabled',
        array(
            'sanitize_callback' => 'dhc_sanitize_checkbox',
            'default' => dhc_customize_default_options2('topbar_enabled'),     
        )   
    );

    $wp_customize->add_control(
        'topbar_enabled',
        array(
            'type' => 'checkbox',
            'label' => esc_html('Enable Topbar', 'dhc'),
            'section' => 'dhc_header',
            'priority' => 18,
        )
    );      

        // Enable Socials Top
    $wp_customize->add_setting(
      'enable_social_link',
        array(
            'sanitize_callback' => 'dhc_sanitize_checkbox',
            'default' => dhc_customize_default_options2('enable_social_link'),     
        )   
    );

    $wp_customize->add_control(
        'enable_social_link',
        array(
            'type' => 'checkbox',
            'label' => esc_html('Enable Socials ', 'dhc'),
            'section' => 'dhc_header',
            'priority' => 18,
        )
    );      
  

  
    // Enable Content Right Top
    $wp_customize->add_setting(
      'enable_content_right_top',
        array(
            'sanitize_callback' => 'dhc_sanitize_checkbox',
            'default' => dhc_customize_default_options2('enable_content_right_top'),     
        )   
    );

    $wp_customize->add_control(
        'enable_content_right_top',
        array(
            'type' => 'checkbox',
            'label' => esc_html('Enable Content Right On Top', 'dhc'),
            'section' => 'dhc_header',
            'priority' => 20,
        )
    );      

    // Top bar background color
    $wp_customize->add_setting(
        'top_background_color',
        array(
            'default'           => dhc_get_opt('top_background_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'top_background_color',
            array(
                'label'         => esc_html('Topbar Backgound', 'dhc'),
                'section'       => 'dhc_header',
                'settings'      => 'top_background_color',
                'priority'      => 21
            )
        )
    );

    // Top bar text color
    $wp_customize->add_setting(
        'topbar_textcolor',
        array(
            'default'           => dhc_get_opt('topbar_textcolor'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'topbar_textcolor',
            array(
                'label'         => esc_html('Topbar Text Color', 'dhc'),
                'section'       => 'dhc_header',
                'settings'      => 'topbar_textcolor',
                'priority'      => 22
            )
        )
    );

    // Top Content
    $wp_customize->add_setting(
        'top_content',
        array(
            'default' => dhc_customize_default_options2('top_content'),
            'sanitize_callback' => 'dhc_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'top_content',
        array(
            'label' => esc_html( 'Content Left', 'dhc' ),
            'section' => 'dhc_header',
            'type' => 'textarea',
            'priority' => 23
        )
    );  

    // Top Content right
    $wp_customize->add_setting(
        'top_content_right',
        array(
            'default' => dhc_customize_default_options2('top_content_right'),
            'sanitize_callback' => 'dhc_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'top_content_right',
        array(
            'label' => esc_html( 'Content Right', 'dhc' ),
            'section' => 'dhc_header',
            'type' => 'textarea',
            'priority' => 24
        )
    );  

   //___Footer___//
    $wp_customize->add_section(
        'flat_footer',
        array(
            'title'         => esc_html('Footer', 'dhc'),
            'priority'      => 4,
        )
    );        

    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_control('header_textcolor');
  

    // Footer widget
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'custom-widget-footer', array(
        'label' => esc_html('footer widgets', 'dhc'),
        'section' => 'flat_footer',
        'settings' => 'dhc_options[info]',
        'priority' => 9
        ) )
    );    

    // Desc
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc_customizer_widget_footer', array(
        'label' => esc_html('This section allow to change the layout and styles of footer widgets to match as you need', 'dhc'),
        'section' => 'flat_footer',
        'settings' => 'dhc_options[info]',
        'priority' => 10
        ) )
    );  

      // Gird columns Related Posts
    $wp_customize->add_setting(
        'footer_widget_areas',
        array(
            'default'           => dhc_customize_default_options2('footer_widget_areas'),
            'sanitize_callback' => 'dhc_sanitize_footer_widget',
        )
    );

    $wp_customize->add_control(
        'footer_widget_areas',
        array(
            'type'      => 'select',           
            'section'   => 'flat_footer',
            'priority'  => 14,
            'label'     => esc_html('Columns  Footer', 'dhc'),
            'choices'   => array(                
                1     => esc_html( '1 Columns', 'dhc' ),
                2     => esc_html( '2 Columns', 'dhc' ),
                3     => esc_html( '3 Columns', 'dhc' ),
                4     => esc_html( '4 Columns', 'dhc' ),                
            )
        )
    );      

    // Footer background color
    $wp_customize->add_setting(
        'footer_background_color',
        array(
            'default' => dhc_customize_default_options2('footer_background_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_background_color',
            array(
                'label'         => esc_html('Footer Backgound', 'dhc'),
                'section'       => 'flat_footer',
                'settings'      => 'footer_background_color',
                'priority'      => 12
            )
        )
    );

    // Footer text color
    $wp_customize->add_setting(
        'footer_text_color',
        array(
            'default'           => dhc_customize_default_options2('footer_text_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_text_color',
            array(
                'label'         => esc_html('Footer Text Color', 'dhc'),
                'section'       => 'flat_footer',
                'settings'      => 'footer_text_color',
                'priority'      => 13
            )
        )
    ); 

    // Footer title
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'custom-footer-content', array(
        'label' => esc_html('CUSTOM FOOTER', 'dhc'),
        'section' => 'flat_footer',
        'settings' => 'dhc_options[info]',
        'priority' => 14
        ) )
    );    

    // Desc
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc_customizer_footer', array(
        'label' => esc_html('You can change the copyright text, show/hide the social icons on the footer.', 'dhc'),
        'section' => 'flat_footer',
        'settings' => 'dhc_options[info]',
        'priority' => 15
        ) )
    );   

   
    // Footer Content
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'default' => dhc_get_opt('footer_copyright'),
            'sanitize_callback' => 'dhc_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'footer_copyright',
        array(
            'label' => esc_html( 'Copyright', 'dhc' ),
            'section' => 'flat_footer',
            'type' => 'textarea',
            'priority' => 17
        )
    );  

    // bottom background color
    $wp_customize->add_setting(
        'bottom_background_color',
        array(
            'default'           => dhc_customize_default_options2('bottom_background_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'bottom_background_color',
            array(
                'label'         => esc_html('Bottom Backgound', 'dhc'),
                'section'       => 'flat_footer',
                'settings'      => 'bottom_background_color',
                'priority'      => 18
            )
        )
    );

    // Bottom text color
    $wp_customize->add_setting(
        'bottom_text_color',
        array(
            'default'           => dhc_customize_default_options2('bottom_text_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'bottom_text_color',
            array(
                'label'         => esc_html('Bottom Text Color', 'dhc'),
                'section'       => 'flat_footer',
                'settings'      => 'bottom_text_color',
                'priority'      => 19
            )
        )
    ); 

    //  =============================
    //  // Color              //
    //  ============================= 
    $wp_customize->add_panel('color_panel',array(
        'title'         => 'Color',
        'description'   => 'This is panel Description',
        'priority'      => 10,
    ));

    // ADD SECTION GENERAL
    $wp_customize->add_section('color_general',array(
        'title'         => 'General',
        'priority'      => 10,
        'panel'         => 'color_panel',
    ));

    // Heading Color Scheme
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'color_scheme', array(
        'label' => esc_html('SCHEME COLOR', 'dhc'),
        'section' => 'color_general',
        'settings' => 'dhc_options[info]',
        'priority' => 1
        ) )
    );    

    // Desc color scheme
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc_color_schemer', array(
        'label' => esc_html('Select the color that will be used for theme color.','dhc'),
        'section' => 'color_general',
        'settings' => 'dhc_options[info]',
        'priority' => 2
        ) )
    );   

    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => dhc_customize_default_options2('primary_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'         => esc_html('Scheme color', 'dhc'),
                'section'       => 'color_general',
                'settings'      => 'primary_color',
                'priority'      => 3
            )
        )
    );    

    // Body Color
    $wp_customize->add_setting(
        'body_text_color',
        array(
            'default'           => dhc_customize_default_options2('body_text_color'),
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => esc_html('Body Color', 'dhc'),
                'section' => 'color_general',
                'priority' => 4
            )
        )
    ); 

    // ADD SECTION HEADER COLOR
    $wp_customize->add_section('color_header',array(
        'title'=>'Header',
        'priority'=>11,
        'panel'=>'color_panel',
    ));

    // Title section portfolio
    $wp_customize->add_setting('dhc_options[info]', array(
        'type'              => 'info_control',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'topbar_color', array(
        'label' => esc_html('Top Color', 'dhc'),
        'section' => 'color_header',
        'settings' => 'dhc_options[info]',
        'priority' => 1
        ) )
    );      

    // ADD SECTION HEADER COLOR
    $wp_customize->add_section('color_header',array(
        'title'=>'Header',
        'priority'=>11,
        'panel'=>'color_panel',
    ));

    // Title section portfolio
    $wp_customize->add_setting('dhc_options[info]', array(
        'type'              => 'info_control',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'topbar_color', array(
        'label' => esc_html('Top Color', 'dhc'),
        'section' => 'color_header',
        'settings' => 'dhc_options[info]',
        'priority' => 1
        ) )
    );  

    // Top bar background color
    $wp_customize->add_setting(
        'top_background_color',
        array(
            'default'           => dhc_get_opt('top_background_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'top_background_color',
            array(
                'label'         => esc_html('Topbar Backgound', 'dhc'),
                'section'       => 'color_header',
                'settings'      => 'top_background_color',
                'priority'      => 2
            )
        )
    );

    // Top bar text color
    $wp_customize->add_setting(
        'topbar_textcolor',
        array(
            'default'           => dhc_get_opt('topbar_textcolor'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'topbar_textcolor',
            array(
                'label'         => esc_html('Topbar Text Color', 'dhc'),
                'section'       => 'color_header',
                'settings'      => 'topbar_textcolor',
                'priority'      => 3
            )
        )
    );

    // MENU COLOR
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'menu_color', array(
        'label' => esc_html('MENU COLOR', 'dhc'),
        'section' => 'color_header',
        'settings' => 'dhc_options[info]',
        'priority' => 3
        ) )
    );    

    // Desc
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc_menu_color', array(
        'label' => esc_html('Select color for background menu, background submenu color menu a, color menu a:hover, background menu a:hover...','dhc'),
        'section' => 'color_header',
        'settings' => 'dhc_options[info]',
        'priority' => 4
        ) )
    );   

    // Menu Background
    $wp_customize->add_setting(
        'mainnav_backgroundcolor',
        array(
            'default'   => dhc_customize_default_options2('mainnav_backgroundcolor'),
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'mainnav_backgroundcolor',
            array(
                'label' => esc_html('Mainnav Background', 'dhc'),
                'section' => 'color_header',
                'priority' => 5
            )
        )
    );   

    // Menu a color
    $wp_customize->add_setting(
        'mainnav_color',
        array(
            'default'           => dhc_customize_default_options2('mainnav_color'),
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'mainnav_color',
            array(
                'label' => esc_html('Mainnav a color', 'dhc'),
                'section' => 'color_header',
                'priority' => 6
            )
        )
    );

    // Menu a:hover color
    $wp_customize->add_setting(
        'mainnav_hover_color',
        array(
            'default'           => dhc_customize_default_options2('mainnav_hover_color'),
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'mainnav_hover_color',
            array(
                'label' => esc_html('Mainnav a:hover color', 'dhc'),
                'section' => 'color_header',
                'priority' => 7
            )
        )
    );

    // Sub menu a color
    $wp_customize->add_setting(
        'sub_nav_color',
        array(
            'default'           => dhc_customize_default_options2('sub_nav_color'),
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sub_nav_color',
            array(
                'label' => esc_html('Sub nav a color', 'dhc'),
                'section' => 'color_header',
                'priority' => 8
            )
        )
    );

    // Sub nav background
    $wp_customize->add_setting(
        'sub_nav_background',
        array(
            'default'           => dhc_customize_default_options2('sub_nav_background'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sub_nav_background',
            array(
                'label' => esc_html('Sub nav background color', 'dhc'),
                'section' => 'color_header',
                'priority' => 9
            )
        )
    );

    // Border color li sub nav
    $wp_customize->add_setting(
        'border_clor_sub_nav',
        array(
            'default'           => dhc_customize_default_options2('border_clor_sub_nav'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'border_clor_sub_nav',
            array(
                'label' => esc_html('Border color sub nav', 'dhc'),
                'section' => 'color_header',
                'priority' => 10
            )
        )
    );

    // Sub nav background hover
    $wp_customize->add_setting(
        'sub_nav_background_hover',
        array(
            'default'   => dhc_customize_default_options2('sub_nav_background_hover'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sub_nav_background_hover',
            array(
                'label' => esc_html('Sub-menu background color hover', 'dhc'),
                'section' => 'color_header',
                'priority' => 11
            )
        )
    );   

    /* Page title Style */
    // Title section page tite
    $wp_customize->add_setting('dhc_options[info]', array(
        'type'              => 'info_control',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'page_title', array(
        'label' => esc_html('Page Title Tyle', 'dhc'),
        'section' => 'header_image',
        'settings' => 'dhc_options[info]',
        'priority' => 21
        ) )
    );  


    $wp_customize->add_setting(
        'pagetitle_style',
        array(
            'default'           => dhc_get_opt('pagetitle_style'),
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control( new RadioImages($wp_customize,
        'pagetitle_style',
        array(
            'type'      => 'radio-images',           
            'section'   => 'header_image',
            'priority'  => 22,
            'label'         => esc_html('Click the page title type for your website', 'dhc'),
            'choices'   => array (
                'pagetitle_style_1'=> array (
                   'tooltip'   => esc_html('Page Title Style1','dhc'),
                   'src'       => dhc_LINK . 'images/controls/breadcrumbs_01.jpg'
                ) ,
                'pagetitle_style_2'=>  array (
                   'tooltip'   => esc_html('Page Title Style2','dhc'),
                   'src'       => dhc_LINK . 'images/controls/breadcrumbs_02.jpg'
                ) ,
                'pagetitle_style_3'=>  array (
                   'tooltip'   => esc_html('Page Title Style3','dhc'),
                    'src'      => dhc_LINK . 'images/controls/breadcrumbs_03.jpg'
                ),        
            ),
        ))
    );  

    // Enable Paget title overlay
    $wp_customize->add_setting(
      'page_title_overlay',
        array(
            'sanitize_callback' => 'dhc_sanitize_checkbox',
            'default' => dhc_get_opt('page_title_overlay'),     
        )   
    );

    $wp_customize->add_control( 
        'page_title_overlay',
        array(
            'type' => 'checkbox',
            'label' => esc_html('Enable Background Overlay', 'dhc'),
            'section' => 'header_image',
            'priority' => 23,
        )
    );    

    // Enable Paget title heading
    $wp_customize->add_setting(
      'page_title_heading',
        array(
            'sanitize_callback' => 'dhc_sanitize_checkbox',
            'default' => dhc_get_opt('page_title_heading'),     
        )   
    );

    $wp_customize->add_control( 
        'page_title_heading',
        array(
            'type' => 'checkbox',
            'label' => esc_html('Enable Page Title Heading', 'dhc'),
            'section' => 'header_image',
            'priority' => 23,
        )
    );    

    /* Padding Down/Up Page title */
    $wp_customize->add_setting (
        'pagetitle_padding',
        array(
            'default' => dhc_get_opt('pagetitle_padding'),
            'sanitize_callback' => 'dhc_sanitize_text'
        )
    );

    $wp_customize->add_control(
        'pagetitle_padding',
        array(
            'type'      => 'text',
            'label'     => esc_html('Padding Down/Up ( Px )', 'dhc'),
            'section'   => 'header_image',
            'priority'  => 22
        )
    );     

    // Page Title background color
    $wp_customize->add_setting(
        'pagetitle_background_color',
        array(
            'default' => dhc_customize_default_options2('pagetitle_background_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'pagetitle_background_color',
            array(
                'label'         => esc_html('Backgound', 'dhc'),
                'section'       => 'header_image',
                'settings'      => 'pagetitle_background_color',
                'priority'      => 23
            )
        )
    );

    // Page Title text color
    $wp_customize->add_setting(
        'pagetitle_text_color',
        array(
            'default'           => dhc_customize_default_options2('pagetitle_text_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'pagetitle_text_color',
            array(
                'label'         => esc_html('Text Color', 'dhc'),
                'section'       => 'header_image',
                'settings'      => 'pagetitle_text_color',
                'priority'      => 24
            )
        )
    ); 

    // Page Title link color
    $wp_customize->add_setting(
        'pagetitle_link_color',
        array(
            'default'           => dhc_customize_default_options2('pagetitle_link_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'pagetitle_link_color',
            array(
                'label'         => esc_html('Link Color', 'dhc'),
                'section'       => 'header_image',
                'settings'      => 'pagetitle_link_color',
                'priority'      => 25
            )
        )
    );   

    // Heading Color Scheme
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'color_scheme', array(
        'label' => esc_html('BREADCRUMB', 'dhc'),
        'section' => 'header_image',
        'settings' => 'dhc_options[info]',
        'priority' => 25
        ) )
    );    

    // Desc color scheme
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc_color_schemer', array(
        'label' => esc_html('Change settings for the breadcrumb.','dhc'),
        'section' => 'header_image',
        'settings' => 'dhc_options[info]',
        'priority' => 26
        ) )
    );   

    // Breadcrumb
    $wp_customize->add_setting(
      'breadcrumb_enabled',
        array(
            'sanitize_callback' => 'dhc_sanitize_checkbox',
            'default' => 1,     
        )   
    );

    $wp_customize->add_control( 
        'breadcrumb_enabled',
        array(
            'type' => 'checkbox',
            'label' => esc_html('Enable Breadcrumb', 'dhc'),
            'section' => 'header_image',
            'priority' => 27,
        )
    );    

    $wp_customize->add_setting (
        'breadcrumb_prefix',
        array(
            'default' => esc_html('You are here:', 'dhc'),
            'sanitize_callback' => 'dhc_sanitize_text'
        )
    );

    $wp_customize->add_control(
        'breadcrumb_prefix',
        array(
            'type'      => 'text',
            'label'     => esc_html('Breadcrumb Prefix', 'dhc'),
            'section'   => 'header_image',
            'priority'  => 28
        )
    );  

    $wp_customize->add_setting (
        'breadcrumb_separator',
        array(
            'default' => esc_html('>', 'dhc'),
            'sanitize_callback' => 'dhc_sanitize_text'
        )
    );

    $wp_customize->add_control(
        'breadcrumb_separator',
        array(
            'type'      => 'text',
            'label'     => esc_html('Breadcrumb Separator', 'dhc'),
            'section'   => 'header_image',
            'priority'  => 29
        )
    );   

    // ADD SECTION COLOR FOOTER
    $wp_customize->add_section('color_footer',array(
        'title'=>'Footer',
        'priority'=>12,
        'panel'=>'color_panel',
    ));    

    // Footer background color
    $wp_customize->add_setting(
        'footer_background_color',
        array(
            'default' => dhc_customize_default_options2('footer_background_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_background_color',
            array(
                'label'         => esc_html('Footer Backgound', 'dhc'),
                'section'       => 'color_footer',
                'settings'      => 'footer_background_color',
                'priority'      => 12
            )
        )
    );

    // Footer text color
    $wp_customize->add_setting(
        'footer_text_color',
        array(
            'default'           => dhc_customize_default_options2('footer_text_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_text_color',
            array(
                'label'         => esc_html('Footer Text Color', 'dhc'),
                'section'       => 'color_footer',
                'settings'      => 'footer_text_color',
                'priority'      => 13
            )
        )
    ); 

    // bottom background color
    $wp_customize->add_setting(
        'bottom_background_color',
        array(
            'default'           => dhc_customize_default_options2('bottom_background_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'bottom_background_color',
            array(
                'label'         => esc_html('Bottom Backgound', 'dhc'),
                'section'       => 'color_footer',
                'settings'      => 'bottom_background_color',
                'priority'      => 18
            )
        )
    );

    // Bottom text color
    $wp_customize->add_setting(
        'bottom_text_color',
        array(
            'default'           => dhc_customize_default_options2('bottom_text_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'bottom_text_color',
            array(
                'label'         => esc_html('Bottom Text Color', 'dhc'),
                'section'       => 'color_footer',
                'settings'      => 'bottom_text_color',
                'priority'      => 19
            )
        )
    );   

   //___Footer___//
    $wp_customize->add_section(
        'dhc_footer',
        array(
            'title'         => esc_html('Footer', 'dhc'),
            'priority'      => 4,
        )
    );        

    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_control('header_textcolor'); 

   
    // Section Blog
    $wp_customize->add_section(
        'blog_options',
        array(
            'title' => esc_html('Post', 'dhc'),
            'priority' => 13,
        )
    );

    // Heading Blog
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'bloglist', array(
        'label' => esc_html('Blog List', 'dhc'),
        'section' => 'blog_options',
        'settings' => 'dhc_options[info]',
        'priority' => 1
        ) )
    );    

    // Desc blog 
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc_customizer_bloglist', array(
        'label' => esc_html('All options in this section will be used to make style for blog page.','dhc'),
        'section' => 'blog_options',
        'settings' => 'dhc_options[info]',
        'priority' => 2
        ) )
    );   

    $wp_customize->add_setting(
        'blog_layout',
        array(
            'default'           => dhc_customize_default_options2('blog_layout'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( 
        'blog_layout',
        array (
            'type'      => 'select',           
            'section'   => 'blog_options',
            'priority'  => 3,
            'label'         => esc_html('List Sidebar Position', 'dhc'),
            'choices'   => array (
                'sidebar-right' => esc_html( 'Sidebar Right','dhc' ),
                'sidebar-left'=>  esc_html( 'Sidebar Left','dhc' ),
                'fullwidth' =>   esc_html( 'Full Width','dhc' )
                ) ,
        )
    );

    $wp_customize->add_setting(
        'blog_archive_layout',
        array(
            'default'           => dhc_customize_default_options2('blog_archive_layout'),
            'sanitize_callback' => 'esc_attr',
        )
    );

     $wp_customize->add_control( 
        'blog_archive_layout',
        array (
            'type'      => 'select',           
            'section'   => 'blog_options',
            'priority'  => 3,
            'label'         => esc_html('Blog Layout', 'dhc'),
            'choices'   => array (
                'blog-list' =>  esc_html( 'Blog List','dhc' ),
                'blog-list-small'=>  esc_html( 'Blog List Small','dhc' ),
                'blog-grid'=> esc_html( 'Blog Grid','dhc' ),
            )  
        )
    );

    $wp_customize->add_setting(
        'blog_grid_layout',
        array(
            'default'           => 'two-columns',
            'sanitize_callback' => 'esc_attr',
        )
    );

     $wp_customize->add_control( 
        'blog_grid_layout',
        array (
            'type'      => 'select',           
            'section'   => 'blog_options',
            'priority'  => 3,
            'label'         => esc_html('Post Grid Columns', 'dhc'),
            'choices'   => array (
                'two-columns' =>  esc_html( '2 Columns','dhc' ),
                'three-columns'=>  esc_html( '3 Columns','dhc' ),
                'four-columns'=> esc_html( '4 Columns','dhc' ),
                )  
        )
    );    

    $wp_customize->add_setting (
        'blog_sidebar_list',
        array(
            'default'           => dhc_customize_default_options2('blog_sidebar_list'),
            'sanitize_callback' => 'esc_html',
        )
    );

    $wp_customize->add_control( new DropdownSidebars($wp_customize,
        'blog_sidebar_list',
        array(
            'type'      => 'dropdown',           
            'section'   => 'blog_options',
            'priority'  => 3,
            'label'         => esc_html('List Sidebar Position', 'dhc'),
            
        ))
    );

    // Excerpt
    $wp_customize->add_setting(
        'blog_archive_post_excepts_length',
        array(
            'sanitize_callback' => 'absint',
            'default'           => dhc_customize_default_options2('blog_archive_post_excepts_length'),
        )       
    );
    $wp_customize->add_control( 'blog_archive_post_excepts_length', array(
        'type'        => 'number',
        'priority'    => 4,
        'section'     => 'blog_options',
        'label'       => esc_html('Post Excepts Length', 'dhc'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5
        ),
    ) );

    // Show Post Meta
    $wp_customize->add_setting ( 
        'blog_archive_show_post_meta',
        array (
            'sanitize_callback' => 'dhc_sanitize_checkbox' ,
            'default' => dhc_customize_default_options2('blog_archive_show_post_meta'),     
        )
    );

    $wp_customize->add_control(
        'blog_archive_show_post_meta',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html('Show Post Meta', 'dhc'),
            'section'   => 'blog_options',
            'priority'  => 5
        )
    );

    // Show Read More
    $wp_customize->add_setting (
        'blog_archive_readmore',
        array (
            'sanitize_callback' => 'dhc_sanitize_checkbox',
            'default' => dhc_customize_default_options2('blog_archive_readmore'),     
        )
    );

    $wp_customize->add_control( 
        'blog_archive_readmore',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html('Show Read More', 'dhc'),
            'section'   => 'blog_options',
            'priority'  => 6,
        )
    );

    // Read More Text
    $wp_customize->add_setting (
        'blog_archive_readmore_text',
        array(
            'default' => dhc_customize_default_options2('blog_archive_readmore_text'),
            'sanitize_callback' => 'dhc_sanitize_text'
        )
    );

    $wp_customize->add_control(
        'blog_archive_readmore_text',
        array(
            'type'      => 'text',
            'label'     => esc_html('Read More Text', 'dhc'),
            'section'   => 'blog_options',
            'priority'  => 7
        )
    );

    // Pagination
    $wp_customize->add_setting(
        'blog_archive_pagination_style',
        array(
            'default'           => dhc_customize_default_options2('blog_archive_pagination_style'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( 
        'blog_archive_pagination_style',
        array(
            'type'      => 'select',           
            'section'   => 'blog_options',
            'priority'  => 8,
            'label'         => esc_html('Pagination Style', 'dhc'),
            'choices'   => array(
                'pager'     => esc_html('Pager','dhc'),
                'numeric'         =>  esc_html('Numeric','dhc'),
                'pager-numeric'         =>  esc_html('Pager & Numeric','dhc'),
                'loadmore' =>  esc_html__( 'Load More', 'dhc' )
            ),
        )
    );

    // Header Blog Single    
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'blogsingle', array(
        'label' => esc_html('Blog Single', 'dhc'),
        'section' => 'blog_options',
        'settings' => 'dhc_options[info]',
        'priority' => 9
        ) )
    );    

    // Desc Blog Single
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc_customizer_blogsingle', array(
        'label' => esc_html('Also, you can change the style for blog single to make your site unique.','dhc'),
        'section' => 'blog_options',
        'settings' => 'dhc_options[info]',
        'priority' => 10
        ) )
    );   

    // Show Related Posts
    $wp_customize->add_setting (
        'show_author_box',
        array (
            'sanitize_callback' => 'dhc_sanitize_checkbox',
            'default' => 0,     
        )
    );

    $wp_customize->add_control( 
        'show_author_box',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html('Show Author Post', 'dhc'),
            'section'   => 'blog_options',
            'priority'  => 11
        )
    );

    // Show Post Navigator
    $wp_customize->add_setting (
        'show_post_navigator',
        array (
            'sanitize_callback' => 'dhc_sanitize_checkbox',
            'default' => dhc_customize_default_options2('show_post_navigator'),     
        )
    );

    $wp_customize->add_control( 
        'show_post_navigator',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html('Show Post Navigator', 'dhc'),
            'section'   => 'blog_options',
            'priority'  => 12
        )
    );
   
    // Show Related Posts
    $wp_customize->add_setting (
        'show_related_post',
        array (
            'sanitize_callback' => 'dhc_sanitize_checkbox',
            'default' => 0,     
        )
    );

    $wp_customize->add_control( 
        'show_related_post',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html('Show Related Posts', 'dhc'),
            'section'   => 'blog_options',
            'priority'  => 15
        )
    );

    // Related Posts Style
    $wp_customize->add_setting(
        'related_post_style',
        array(
            'default'           => dhc_customize_default_options2('related_post_style'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( 
        'related_post_style',
        array(
            'type'      => 'select',           
            'section'   => 'blog_options',
            'priority'  => 16,
            'label'         => esc_html('Related Posts Style', 'dhc'),
            'choices'   => array(
                'blog-list' => esc_html( 'Blog List','dhc' ),
                'blog-list-small'=> esc_html( 'Blog List Small','dhc' ),
                'blog-grid'=>   esc_html( 'Blog Grid','dhc' ),
        ))
    );

    // Gird columns Related Posts
    $wp_customize->add_setting(
        'grid_columns_post_related',
        array(
            'default'           => 'blog-three-columns',
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control(
        'grid_columns_post_related',
        array(
            'type'      => 'select',           
            'section'   => 'blog_options',
            'priority'  => 17,
            'label'     => esc_html('Columns Of Related Posts', 'dhc'),
            'choices'   => array(                
                'blog-two-columns'     => esc_html( '2 Columns', 'dhc' ),
                'blog-three-columns'     => esc_html( '3 Columns', 'dhc' ),
                'blog-four-columns'     => esc_html( '4 Columns', 'dhc' ),                    
            )
        )
    );

    // Number Of Related Posts
    $wp_customize->add_setting (
        'number_related_post',
        array(
            'default' => esc_html('3', 'dhc'),
            'sanitize_callback' => 'dhc_sanitize_text'
        )
    );

    $wp_customize->add_control(
        'number_related_post',
        array(
            'type'      => 'text',
            'label'     => esc_html('Number Of Related Posts', 'dhc'),
            'section'   => 'blog_options',
            'priority'  => 18
        )
    );
    
    // Section Typography
    $wp_customize->add_section(
        'flat_typography',
        array(
            'title' => esc_html('Typography', 'dhc'),
            'priority' => 6,            
        )
    );

    // Heading Typography
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'custom-typography', array(
        'label' => esc_html('BODY FONT', 'dhc'),
        'section' => 'flat_typography',
        'settings' => 'dhc_options[info]',
        'priority' => 2
        ) )
    );    

    // Desc Typography
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc_customizer_logo', array(
        'label' => esc_html('You can modify the font family, size, color, ... for global content.', 'dhc'),
        'section' => 'flat_typography',
        'settings' => 'dhc_options[info]',
        'priority' => 3
        ) )
    );
    
    // Body fonts
    $wp_customize->add_setting(
        'body_font_name',
        array(
            'default' => dhc_customize_default_options2('body_font_name'),
            'sanitize_callback' => 'esc_html',
        )
    );
    $wp_customize->add_control( new Typography($wp_customize,
        'body_font_name',
        array(
            'label' => esc_html( 'Font name/style/sets', 'dhc' ),
            'section' => 'flat_typography',
            'type' => 'typography',
            'fields' => array('family','style','line_height','size'),
            'priority' => 4
        ))
    );

    // Headings fonts
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'custom-heading-font', array(
        'label' => esc_html('Headings fonts', 'dhc'),
        'section' => 'flat_typography',
        'settings' => 'dhc_options[info]',
        'priority' => 8
        ) )
    );    

    // Desc font
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc_customizer_heading-font', array(
        'label' => esc_html('You can modify the font options for your headings. h1, h2, h3, h4, ...', 'dhc'),
        'section' => 'flat_typography',
        'settings' => 'dhc_options[info]',
        'priority' => 9
        ) )
    );   

    $wp_customize->add_setting(
        'headings_font_name',
        array(
            'default' => dhc_customize_default_options2('headings_font_name'),
            'sanitize_callback' => 'esc_html',
        )
    );
    $wp_customize->add_control( new Typography($wp_customize,
        'headings_font_name',
        array(
            'label' => esc_html( 'Font name/style/sets', 'dhc' ),
            'section' => 'flat_typography',
            'type' => 'typography',
            'fields' => array('family','style'),
            'priority' => 11
        ))
    );

    // H1 size
    $wp_customize->add_setting(
        'h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => dhc_customize_default_options2('h1_size'),
        )       
    );
    $wp_customize->add_control( 'h1_size', array(
        'type'        => 'number',
        'priority'    => 13,
        'section'     => 'flat_typography',
        'label'       => esc_html('H1 font size (px)', 'dhc'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );

    // H2 size
    $wp_customize->add_setting(
        'h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           =>  dhc_customize_default_options2('h2_size'),
        )       
    );
    $wp_customize->add_control( 'h2_size', array(
        'type'        => 'number',
        'priority'    => 14,
        'section'     => 'flat_typography',
        'label'       => esc_html('H2 font size (px)', 'dhc'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );

    // H3 size
    $wp_customize->add_setting(
        'h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => dhc_customize_default_options2('h3_size'),
        )       
    );
    $wp_customize->add_control( 'h3_size', array(
        'type'        => 'number',
        'priority'    => 15,
        'section'     => 'flat_typography',
        'label'       => esc_html('H3 font size (px)', 'dhc'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );

    // H4 size
    $wp_customize->add_setting(
        'h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           =>  dhc_customize_default_options2('h4_size'),
        )       
    );
    $wp_customize->add_control( 'h4_size', array(
        'type'        => 'number',
        'priority'    => 16,
        'section'     => 'flat_typography',
        'label'       => esc_html('H4 font size (px)', 'dhc'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );

    // H5 size
    $wp_customize->add_setting(
        'h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           =>  dhc_customize_default_options2('h5_size'),
        )       
    );
    $wp_customize->add_control( 'h5_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'flat_typography',
        'label'       => esc_html('H5 font size (px)', 'dhc'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );

    // H6 size
    $wp_customize->add_setting(
        'h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           =>  dhc_customize_default_options2('h6_size'),
        )       
    );
    $wp_customize->add_control( 'h6_size', array(
        'type'        => 'number',
        'priority'    => 18,
        'section'     => 'flat_typography',
        'label'       => esc_html('H6 font size (px)', 'dhc'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );

    // Heading Menu fonts
    $wp_customize->add_setting('dhc_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'menu_fonts', array(
        'label' => esc_html('Menu fonts', 'dhc'),
        'section' => 'flat_typography',
        'settings' => 'dhc_options[info]',
        'priority' => 19
        ) )
    );

    $wp_customize->add_setting(
        'menu_font_name',
        array(
            'default' => dhc_customize_default_options2('menu_font_name'),
                'sanitize_callback' => 'esc_html',
        )
    );
    $wp_customize->add_control( new Typography($wp_customize,
        'menu_font_name',
        array(
            'label' => esc_html( 'Font name/style/sets', 'dhc' ),
            'section' => 'flat_typography',
            'type' => 'typography',
            'fields' => array('family','style','size','line_height'),
            'priority' => 20
        ))
    );

    $wp_customize->add_setting(
        'layout_version',
        array(
            'default'           => dhc_customize_default_options2('layout_version'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( 
        'layout_version',
        array(
            'type'      => 'select',           
            'section'   => 'colors',
            'priority'  => 7,
            'label'         => esc_html('Layout version', 'dhc'),
            'choices'   => array(
                'wide'           =>  esc_html('Wide','dhc'),
                'boxed'         =>   esc_html('Boxed','dhc'),
        ))
    );

    // Sidebars
    $wp_customize->add_control( new dhc_Info( $wp_customize, 'layout_body', array(
        'label' => esc_html('SIDEBAR', 'dhc'),
        'section' => 'colors',
        'settings' => 'dhc_options[info]',
        'priority' => 10
        ) )
    );    

    // Desc
    $wp_customize->add_control( new dhc_Desc_Info( $wp_customize, 'desc_color_scheme', array(
        'label' => esc_html('Select the position of sidebar that you wish to display.','dhc'),
        'section' => 'colors',
        'settings' => 'dhc_options[info]',
        'priority' => 11
        ) )
    );   

     $wp_customize->add_setting(
        'page_layout',
        array(
            'default'           => dhc_customize_default_options2('page_layout'),
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control(
        'page_layout',
        array (
            'type'      => 'select',           
            'section'   => 'colors',
            'priority'  => 12,
            'label'         => esc_html('List Sidebar Position', 'dhc'),
            'choices'   => array (
                'sidebar-right' =>  esc_html( 'Sidebar Right','dhc' ),
                'sidebar-left'=>   esc_html( 'Sidebar Left','dhc' ),
                'fullwidth'=>   esc_html( 'Full Width','dhc' ),
        ))
    );

    $wp_customize->add_setting (
        'page_sidebar_list',
        array(
            'default'           => dhc_customize_default_options2('page_sidebar_list'),
            'sanitize_callback' => 'esc_html',
        )
    );

    $wp_customize->add_control( new DropdownSidebars($wp_customize,
        'page_sidebar_list',
        array(
            'type'      => 'dropdown',           
            'section'   => 'colors',
            'priority'  => 13,
            'label'         => esc_html('List Sidebar Position', 'dhc'),            
        ))
    );

   
}
add_action( 'customize_register', 'dhc_customize_register' );

/**
 * Sanitize
 */

// Text
function dhc_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

// Background size
function dhc_sanitize_bg_size( $input ) {
    $valid = array(
        'cover'     => esc_html('Cover', 'dhc'),
        'contain'   => esc_html('Contain', 'dhc'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Blog Layout
function dhc_sanitize_blog( $input ) {
    $valid = array(
        'sidebar-right'    => esc_html( 'Sidebar right', 'dhc' ),
        'sidebar-left'    => esc_html( 'Sidebar left', 'dhc' ),
        'fullwidth'  => esc_html( 'Full width (no sidebar)', 'dhc' )

    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// dhc_sanitize_pagination
function dhc_sanitize_pagination ( $input ) {
    $valid = array(
        'pager'     => esc_html('Pager','dhc'),
        'numeric'         =>  esc_html('Numeric','dhc'),
        'pager-numeric'         =>  esc_html('Pager & Numeric','dhc'),
        'loadmore' =>  esc_html__( 'Load More', 'dhc' )      
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// dhc_sanitize_layout_version
function dhc_sanitize_layout_version ( $input ) {
    $valid = array(
        'boxed' => esc_html__('Boxed', 'dhc'),
        'wide' => esc_html__('Wide', 'dhc')          
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// dhc_sanitize_related_post
function dhc_sanitize_related_post ( $input ) {
    $valid = array(
        'simple_list' => esc_html__('Simple List', 'dhc'),
        'grid' => esc_html__('Grid', 'dhc')        
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Footer widget areas
function dhc_sanitize_fw( $input ) {
    $valid = array(
        '0' => esc_html__('footer_default', 'dhc'),
        '1' => esc_html__('One', 'dhc'),
        '2' => esc_html__('Two', 'dhc'),
        '3' => esc_html__('Three', 'dhc'),
        '4' => esc_html__('Four', 'dhc')
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Header style sanitize
function dhc_sanitize_headerstyle( $input ) {
    $valid = dhc_predefined_header_styles();
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Checkboxes
function dhc_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

// dhc_sanitize_grid_post_related
function dhc_sanitize_grid_post_related( $input ) {
    $valid = array(        
       'blog-two-columns'     => esc_html( '2 Columns', 'dhc' ),
        'blog-three-columns'     => esc_html( '3 Columns', 'dhc' ),
        'blog-four-columns'     => esc_html( '4 Columns', 'dhc' ),        
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// dhc_sanitize_grid_post
function dhc_sanitize_grid_post ( $input ) {
    $valid = array(        
        'two'     => esc_html( '2 Columns', 'dhc' ),
        'three'     => esc_html( '3 Columns', 'dhc' ),
        'four'     => esc_html( '4 Columns', 'dhc' ),     
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// dhc_sanitize_footer_widget
function dhc_sanitize_footer_widget ( $input ) {
    $valid = array(        
        1     => esc_html( '1 Columns', 'dhc' ),
        2     => esc_html( '2 Columns', 'dhc' ),
        3     => esc_html( '3 Columns', 'dhc' ),
        4     => esc_html( '4 Columns', 'dhc' ),       
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}



// dhc_sanitize_layout_product
function dhc_sanitize_layout_product( $input ) {
    $valid = array(        
        'fullwidth'         => esc_html( 'No Sidebar', 'dhc' ),
        'sidebar-right'           => esc_html( 'Sidebar Right', 'dhc' ),
        'sidebar-left'         => esc_html( 'Sidebar Left', 'dhc' )
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function dhc_load_customizer_style() {   
    wp_register_style( 'dhc_customizer_css', dhc_LINK .'css/admin/customizer.css', false, '1.0.0' );
    wp_register_style( 'font_awesome', dhc_LINK .'css/font-awesome.css', false, '1.0.0' );   
    wp_enqueue_style( 'dhc_customizer_css' );
    wp_enqueue_style( 'font_awesome' );  
    wp_enqueue_script('jquery-ui');
    wp_enqueue_script( 
          'choosen',            //Give the script an ID
          dhc_LINK .'js/admin/3rd/chosen.jquery.min.js',//Point to file
          array( 'jquery'),    //Define dependencies
          '',                       //Define a version (optional) 
          true                      //Put script in footer?
    );
    wp_enqueue_script( 
          'dhc_customizer_js',            //Give the script an ID
          dhc_LINK .'js/admin/customizer.js',//Point to file
          array( 'jquery','customize-preview' ),    //Define dependencies
          '',                       //Define a version (optional) 
          true                      //Put script in footer?
    );

    wp_enqueue_style( 'choosen', dhc_LINK . 'css/chosen.css', array(), true ); 
}

add_action( 'admin_enqueue_scripts', 'dhc_load_customizer_style' );
