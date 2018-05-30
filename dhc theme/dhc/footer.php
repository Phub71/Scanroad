<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package dhc
 */
?>

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- #content -->

    <!-- Footer -->
    <footer class="footer <?php (dhc_meta( 'footer_class' ) != "" ? esc_attr( dhc_meta( 'footer_class' ) ):'') ;?>">      
        <div class="container">
            <div class="row"> 
             <div class="footer-widgets">
                <?php
               
                $columns = dhc_widget_layout(dhc_choose_opt('footer_widget_areas'));

                //var_dump($columns);
                //echo get_theme_mod('footer_widget_areas');

                foreach ($columns as $key => $column) {?>
                    <div class="col-md-<?php dhc_esc_attr($column);?> col-sm-6">
                        <?php 
                            $key = $key +1;
                            $widget = "footer-".$key;
                            dhc_dynamic_sidebar($widget);
                        ?>
                    </div>
                <?php }?>
               
                </div><!-- /.footer-widgets -->           
            </div><!-- /.row -->    
        </div><!-- /.container -->   
    </footer>

    <!-- Bottom -->
    <div class="bottom">
        <div class="container">           
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">                        
                        <?php echo wp_kses_post(dhc_choose_opt( 'footer_copyright')); ?>
                    </div>

                    <?php if ( dhc_choose_opt( 'go_top') == 1 ) : ?>
                        <!-- Go Top -->
                        <a class="go-top show">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    <?php endif; ?>                    
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>    
</div><!-- /#boxed -->
<?php wp_footer(); ?>
</body>
</html>
