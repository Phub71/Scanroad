<?php
if ( ! function_exists( 'dhc_body_classes' ) ) {
	add_filter( 'body_class', 'dhc_body_classes' );

	function dhc_body_classes( $classes ) {		

		if ( dhc_meta('enable_custom_topbar') == 1 ) {
			if (dhc_meta( 'topbar_enabled' ) == 1 )	{	
				$classes[] = 'has-topbar';
			}			
		}
		else {
			if ( dhc_get_opt( 'topbar_enabled') == 1 )
				$classes[] = 'has-topbar';		
		}

		if ( dhc_choose_opt('header_sticky') == 1 ) {	
			$classes[] = 'header_sticky';
		}

		if ( dhc_choose_opt('onepage_nav_script') == 1 ) {
			$classes[] = 'enable-onepage-template';
		}

		if ( dhc_get_opt('blog_archive_layout') != '' ) {
			$classes[] = dhc_get_opt('blog_archive_layout');
		}		

		if ( dhc_get_opt('blog_grid_layout') != '' ) {
			$classes[] = dhc_get_opt('blog_grid_layout');
		}	


		/**
		 * Portfolio template
		 */
		if ( is_page_template( 'tpl/portfolio.php' ) ) $classes[] = 'page-portfolio';

		/**
		 * Full-Width layout template
		 */
		if ( is_page_template( 'tpl/page_fullwidth.php' ) ) $classes[] = 'page-fullwidth';
		$classes[] =  dhc_choose_opt('layout_version');

		/**
		 * Full Width Sidebar Position
		 */
		$classes[] = dhc_choose_opt( 'page_layout' );

		return $classes;
	}
}


