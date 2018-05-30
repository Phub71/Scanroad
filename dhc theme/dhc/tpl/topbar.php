<?php 
// Ignore ouput topbar when it isn't enabled
$top_status = dhc_choose_opt('topbar_enabled');
$top_content = dhc_choose_opt('top_content');
$top_content_right = dhc_choose_opt('top_content_right');
if ( $top_status != 1 ) return;
?>
<!-- Top -->
<div class="dhc-top <?php echo esc_attr( dhc_choose_opt('header_style') ) ?>">    
    <div class="container">
        <div class="container-inside">
        	<div class="content-left">
            <?php
            	echo wp_kses_post($top_content);
            ?>
            </div><!-- /.col-md-7 -->

            <div class="content-right">
            <?php     
                 if ( dhc_choose_opt('enable_social_link') == 1 ):
                    dhc_render_social();    
                endif;              
                if ( dhc_choose_opt('enable_content_right_top') == 1 ):
                    echo wp_kses_post( $top_content_right );
                endif;
            ?>
            </div><!-- /.col-md-5 -->

        </div><!-- /.container -->
    </div><!-- /.container -->        
</div><!-- /.top -->
