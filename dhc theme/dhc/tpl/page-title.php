<?php 
    if ( is_page() && is_page_template( 'tpl/front-page.php' ) )
        return;

    $title = esc_html__( 'Archives', 'dhc' );

    if ( is_home() ) {
        $title = esc_html__( 'Home', 'dhc' );
    } elseif ( is_singular() ) {
        $title = get_the_title();
    } elseif ( is_search() ) {
        $title = sprintf( esc_html__( 'Search results for &quot;%s&quot;', 'dhc' ), get_search_query() );
    } elseif ( is_404() ) {
        $title = esc_html__( 'Not Found', 'dhc' );
    } elseif ( is_author() ) {
        the_post();
        $title = sprintf( esc_html__( 'Author Archives: %s', 'dhc' ), get_the_author() );
        rewind_posts();
    } elseif ( is_day() ) {
        $title = sprintf( esc_html__( 'Daily Archives: %s', 'dhc' ), get_the_date() );
    } elseif ( is_month() ) {
        $title = sprintf( esc_html__( 'Monthly Archives: %s', 'dhc' ), get_the_date( 'F Y' ) );
    } elseif ( is_year() ) {
        $title = sprintf( esc_html__( 'Yearly Archives: %s', 'dhc' ), get_the_date( 'Y' ) );
    } elseif ( is_tax() || is_category() || is_tag() ) {
        $title = single_term_title( '', false );
    }
?>

<!-- Page title -->
<div class="page-title <?php echo esc_attr( dhc_choose_opt('pagetitle_style') ); ?>">
    <?php if ( dhc_get_opt( 'page_title_overlay' ) == 1 ) : ?>
    <div class="overlay"></div>   
    <?php endif; ?>

    <div class="container"> 
        <div class="row">
            <div class="col-md-12 page-title-container">
                <?php if ( dhc_get_opt( 'page_title_heading' ) == 1 ): ?>
                    <div class="page-title-heading">
                        <h1 class="title"><?php echo esc_html( $title ); ?></h1>
                    </div><!-- /.page-title-captions --> 
                <?php endif; ?>

                <?php 
                if ( get_theme_mod( 'breadcrumb_enabled', 1 ) == 1 ):

                    dhc_breadcrumb_trail( array(
                        'separator'   => get_theme_mod( 'breadcrumb_separator', '>' ),
                        'show_browse' => true,
                        'labels'      => array(
                        'browse'  => get_theme_mod( 'breadcrumb_prefix', esc_html__( 'You are here:', 'dhc' ) ),
                            'home'    => esc_html__( 'Home', 'dhc' )
                        )
                    ) );
                
                endif;                       
               ?>                 
            </div><!-- /.col-md-12 -->  
        </div><!-- /.row -->  
    </div><!-- /.container -->                      
</div><!-- /.page-title --> 