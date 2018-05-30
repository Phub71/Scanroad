<?php
class dhc_Testimonial_widgets extends WP_Widget {
    /**
     * Holds widget settings defaults, populated in constructor.
     *
     * @var array
     */
    protected $defaults;

    /**
     * Constructor
     *
     * @return dhc_Testimonial_widgets
     */


    function dhc_testimonial_widget_load() {    
        wp_enqueue_style( 'wp-color-picker' );        
        wp_enqueue_script( 'wp-color-picker' );    
    }
    function __construct() {
        $this->defaults = array(
            'title' 	=> 'dhc: Testimonial', 
            'autoplay'        => '',
            'show_control'    => false,
            'show_direction'    => false,            
            'style'    => 'style1',
            'exclude'    => '',
            'limit'    => 3,
            'slides_per_view'  => 1,
            'class'           => '',
            'autoid'           => '',
            'background'             => ''
            );
        add_action( 'load-widgets.php', array(&$this, 'dhc_testimonial_widget_load') );

        parent::__construct(
            'widget_dhc_testimonial',
            esc_html__( 'dhc - Testimonial', 'dhc' ),
            array(
                'classname'   => 'widget-dhc-testimonial',
                'description' => esc_html__( 'Testimonial', 'dhc' )
                )
            );
    }

    /**
     * Display widget
     */
    function widget( $args, $instance ) {

        $instance = wp_parse_args( $instance, $this->defaults );
        extract($args);
        extract($instance);
        $instance['class'] .= ' '.esc_attr($autoid);
        $instance['slides_per_view'] = 1;
        echo $before_widget;
        if ( !empty($title) ) echo $before_title.esc_html($title).$after_title;
        echo dhc_shortcode_testimonial_slider($instance);
        echo '<style> ';
        printf('.%1$s {
            background: %2$s;
        }',esc_attr($autoid),esc_attr($background));
        echo ' </style>';

        echo $after_widget;
}

    /**
     * Update widget
     */
    function update( $new_instance, $old_instance ) {

        $instance               = $old_instance;
        $instance['title']      = strip_tags( $new_instance['title'] );
        $instance['style']      =  ($new_instance['style']);
        $instance['autoplay']      =  intval($new_instance['autoplay']);
        $instance['show_direction']      =  intval($new_instance['show_direction']);
        $instance['show_control']      =  intval($new_instance['show_control']);
        $instance['exclude']      =  ($new_instance['exclude']);
        $instance['limit']      =  intval($new_instance['limit']);
        $instance['class']      =  ($new_instance['class']);
        $instance['background']      =  ($new_instance['background']);
        $instance['autoid']      =  $instance['autoid'] == '' ? 'dhc_'.current_time('timestamp') : $instance['autoid'];
        return $instance;
    }

    /**
     * Widget setting
     */
    function form( $instance ) {

        $instance = wp_parse_args( $instance, $this->defaults );
        ?>
        <script type='text/javascript'>
            jQuery(document).ready(function($) {
                $('.dhc_color_picker').wpColorPicker();
            });
        </script>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dhc' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>

         <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'background' ) ); ?>"><?php esc_html_e( 'Background:', 'dhc' ); ?></label><br/>
            <input class="widefat dhc_color_picker" id="<?php echo esc_attr( $this->get_field_id( 'background' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['background'] ); ?>">
        </p>

        <?php $styles = array(
            'style1' => esc_html__('Style 1','dhc'),
            'style2' => esc_html__('Style 2','dhc'),
            'style3' => esc_html__('Style 3','dhc'),
            ); ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e( 'Select style:', 'dhc' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>">
                    <?php               
                    foreach ($styles as $key => $style) {
                        printf('<option value="%1$s" %3$s>%2$s</option>', esc_attr($key), esc_attr($style),($key == $instance['style']  ? 'selected="selected"' : ''));
                    }               
                    ?>
                </select>
            </p>

            <p>
                <input class="checkbox" value="1" type="checkbox" <?php checked( $instance['show_control'] ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_control' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_control' ) ); ?>" />
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_control' ) ); ?>"><?php esc_html_e( 'Show Control ?', 'dhc' ) ?></label>
            </p>       

            <p>
                <input class="checkbox" value="1" type="checkbox" <?php checked( $instance['show_direction'] ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_direction' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_direction' ) ); ?>" />
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_direction' ) ); ?>"><?php esc_html_e( 'Show Direction ?', 'dhc' ) ?></label>
            </p>   

            <p>
                <input class="checkbox" value="1" type="checkbox" <?php checked( $instance['autoplay'] ); ?> id="<?php echo esc_attr( $this->get_field_id( 'autoplay' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'autoplay' ) ); ?>" />
                <label for="<?php echo esc_attr( $this->get_field_id( 'autoplay' ) ); ?>"><?php esc_html_e( 'Auto Play ?', 'dhc' ) ?></label>
            </p>       
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>"><?php esc_html_e( 'Limit:', 'dhc' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limit' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['limit'] ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'exclude' ) ); ?>"><?php esc_html_e( 'Exclude:', 'dhc' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'exclude' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'exclude' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['exclude'] ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'class' ) ); ?>"><?php esc_html_e( 'Class:', 'dhc' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'class' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'class' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['class'] ); ?>">
            </p>
            <p>
             
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'autoid' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'autoid' ) ); ?>" type="hidden" value="<?php echo esc_attr( $instance['autoid'] ); ?>">
            </p>


            <?php
        }

    }

    add_action( 'widgets_init', 'dhc_testimonial_widget' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function dhc_testimonial_widget() {
    register_widget( 'dhc_Testimonial_widgets' );
}


