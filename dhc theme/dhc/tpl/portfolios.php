<?php
/*
Template Name: Portfolio
*/
get_header(); ?>

<div class="col-md-12">    
    <div class="dhc-portfolio">
        <?php
        global $paging_style;
        $show_filter = dhc_choose_opt('show_filter_portfolio');
        $columns = dhc_choose_opt('portfolio_grid_columns');
        $limit = dhc_choose_opt('portfolio_post_perpage');
        $style = dhc_choose_opt('portfolio_style');
        $paging_style = dhc_choose_opt('portfolio_archive_pagination_style');
        $category_order = dhc_choose_opt('portfolio_category_order')  ;
        $orderby = dhc_choose_opt('portfolio_order_by');
        $order = dhc_choose_opt('portfolio_order_direction');
        
        $show_filter = ( $show_filter == 1 ) ? 'yes' : 'no';    
        $exclude = dhc_choose_opt('portfolio_exclude')       ;
        
        $args = array(
            'style' => $style,
            'limit' => $limit,
            'columns' => $columns,
            'cat_order' => $category_order,
            'show_filter' => $show_filter,
            'orderby'   => $orderby,
            'order' => $order,  
            'exclude' => $exclude
            );       
        ?>

        <?php echo dhc_VCExtend::dhc_portfolio( $args ) ?>
    </div><!-- /.portfolio-container -->   
</div><!-- /.col-md-12 -->


<div class="col-md-12">
    <?php
    global $paging_for ;    
    $paging_for = 'portfolio';   
    get_template_part( 'tpl/pagination' );              
    ?>   
</div>
<?php get_footer(); ?>

