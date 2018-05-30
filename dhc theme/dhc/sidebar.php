<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package dhc
 */
?>

<div id="secondary" class="widget-area" role="complementary">
	<div class="sidebar">
	<?php
		$sidebar = dhc_choose_opt( 'blog_sidebar_list' );

		if ( is_page() ) {			
			$sidebar= dhc_choose_opt( 'page_sidebar_list' );			
		}	  

        dhc_dynamic_sidebar ( $sidebar ); 
	?>
	</div>
</div><!-- #secondary -->
