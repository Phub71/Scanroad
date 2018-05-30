<?php
/*
Template Name: Blog
*/
defined( 'ABSPATH' ) or die();
get_header(); ?>
<?php 
$sidebar_layout = dhc_choose_opt('page_layout');
$class[] = $sidebar_layout;
?>
<div class="col-md-12">
    <div id="primary" class="content-area <?php echo esc_attr(implode(" ",$class));?>">
        <?php
        global $paging_style;
        $layouts = dhc_choose_opt('blog_archive_layout');
        $grid_columns = dhc_choose_opt('blog_grid_columns');
        $paging_style = dhc_choose_opt('blog_archive_pagination_style');
        $total = dhc_choose_opt('blog_posts_per_page');
        $content_length = dhc_choose_opt('blog_archive_post_excepts_length');        
        $show_readmore = dhc_choose_opt('blog_archive_readmore');
        $readmore_text = dhc_choose_opt('blog_archive_readmore_text');
        $hide_readmore = 'no';
        if ( $show_readmore == 0 ) {
            $hide_readmore = 'yes';
        }
        $orderby = dhc_choose_opt('blog_order_by');
        $order = dhc_choose_opt('blog_order_direction');
        
        $args = array(
            'layout' => $layouts,
            'grid_columns' => $grid_columns,
            'content_length' => $content_length,
            'hide_readmore' => $hide_readmore,           
            'readmore_text' => $readmore_text,
            'order'     => $order,
            'orderby'   => $orderby,
            'limit' => $total
            );       
            ?>

            <?php echo dhc_VCExtend::dhc_posts( $args ) ?>
            <div class="clearfix"></div>
            <?php
            global $paging_for ;    
            $paging_for = 'blog';   
            get_template_part( 'tpl/pagination' );              
            ?>
        </div>   <!-- #primary -->   
        <?php get_sidebar();?>

    </div><!-- /.col-md-12 -->
    <?php get_footer(); ?>
