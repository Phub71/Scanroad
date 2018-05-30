<?php
// Register action to declare required plugins
add_action( 'tgmpa_register', 'dhc_recommend_plugin' );
function dhc_recommend_plugin() {
 
    $plugins = array(
        array(
           'name'               => 'dhc',
           'slug'               => 'dhc',
           'source'             => dhc_DIR . 'inc/plugins/dhc.zip',
           'required'           => true,           
        ),        

        array(
           'name'               => 'Revslider',
           'slug'               => 'revslider',
           'source'             => dhc_DIR . 'inc/plugins/revslider.zip',
           'version'            => '5.4.5.1',
           'required'           => true,           
        ),

        array(
            'name'               => 'WPBakery Visual Composer',
            'slug'               => 'js_composer',
            'source'             => dhc_DIR . 'inc/plugins/js_composer.zip',
            'version'            => '5.4.7',
            'required'           => true,            
        ), 

        array(
            'name'               => 'Contact Form 7',
            'slug'               => 'contact-form-7',
            'required'           => false,            
        ),  

        array(
            'name'               => 'Mailchimp',
            'slug'               => 'mailchimp-for-wp',            
            'version'            => '4.1.5',
            'required'           => false,            
        ),   

           
    );  
 
    tgmpa( $plugins);
 }

