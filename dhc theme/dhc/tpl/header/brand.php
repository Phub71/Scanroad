<?php
$logo_site = dhc_get_opt('site_logo');
$logo_height = dhc_choose_opt('logo_height');
$logo_retina_site = dhc_choose_opt('site_retina_logo');
$logo_margin_top = dhc_choose_opt('logo_margin_top');
if ( $logo_site ) : ?>
    <div id="logo" class="logo" style="margin-top: <?php echo esc_attr( $logo_margin_top ) ?>px;">                  
        <a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php bloginfo('name'); ?>">
            <img class="site-logo" src="<?php echo esc_url($logo_site); ?>" alt="<?php bloginfo('name'); ?>" height="<?php echo esc_attr($logo_height); ?>" data-retina="<?php echo esc_url( $logo_retina_site ); ?>" />
        </a>
    </div>
<?php else : ?>
    <div class="site-infomation">
        <h1 class="site-title"><a href="<?php echo esc_url( home_url('/') ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>           
        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>   
    </div><!-- /.site-infomation -->          
<?php endif; ?>


