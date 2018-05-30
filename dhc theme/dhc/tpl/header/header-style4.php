<!-- Header -->
<header id="header" class="header widget-header <?php echo esc_attr( dhc_choose_opt('header_style') ) ?>" >
    <div class="container sticky_hide">
        <div class="row">
            <div class="col-md-12">
                <div class="header-wrap clearfix">
                    <?php get_template_part( 'tpl/header/brand'); ?>

                    <div class="wrap-header-content">
                        <?php echo wp_kses_post(dhc_choose_opt ('header_content'));?>                      
                    </div><!-- wrap-widget-header -->
                </div>                
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->    


    <!-- Mainnav -->
    <div class="container dhc-relative">
        <div class="nav header-style2 header-style4 ">
            <?php get_template_part( 'tpl/header/navigator'); ?>
            <?php if ( dhc_choose_opt('header_searchbox') == 1 ) :?>
            <div class="show-search">
                <a href="#"><i class="fa fa-search"></i></a>         
            </div> 
            <?php endif;?>
            <?php  dhc_render_social();    ?>
            <div class="submenu top-search widget_search">
                <?php get_search_form(); ?>
            </div> 
        </div> 
    </div><!-- /.container -->    

</header><!-- /.header -->