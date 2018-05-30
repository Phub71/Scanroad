<?php
/**
 * DHC header
 *
 * @package DHC
 */

if ( ! function_exists( 'dhc_header' ) ) :
function dhc_header() {		
	get_template_part( 'tpl/topbar');
	get_template_part( 'tpl/site-header');
}
endif;