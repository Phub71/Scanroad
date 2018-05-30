<!-- Header -->
<header id="header" class="header widget-header <?php echo esc_attr( dhc_choose_opt('header_style') ) ?>" >
    <div class="container nav">
        <div class="row">
            <div class="col-md-12">
                <div class="header-wrap">
                    <?php get_template_part( 'tpl/header/brand'); ?>

                     <?php get_template_part( 'tpl/header/navigator'); ?>
                     <div class="wrap-header-content">
                        <?php echo wp_kses_post(dhc_choose_opt ('header_content'));?>                      
                    </div><!-- wrap-widget-header -->

                    <?php if ( dhc_choose_opt('header_searchbox') == 1 ) :?>
                    <div class="show-search">
                        <a href="#"><i class="fa fa-search"></i></a>         
                    </div> 
                    <?php endif;?>
                    <div class="submenu top-search widget_search">
                        <?php get_search_form(); ?>
                    </div> 
                </div>

                
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->    
</header><!-- /.header -->

    