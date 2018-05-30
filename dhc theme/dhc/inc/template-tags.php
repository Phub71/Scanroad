<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package dhc
 */

if ( ! function_exists( 'dhc_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time, post categories and author.
 */


function dhc_widget_layout($columns) {
	$layout = array();
	switch ($columns) {
		case 1:
			$layout = array(12);
			break;
		case 2:
			$layout = array(6,6);
			break;
		case 3:
			$layout = array(4,4,4);
			break;
		case 4:
			$layout = array(4,2,3,3);
			break;
		
	}
	return $layout;
}

function dhc_posted_on() {
?>
	<ul class="meta-left">	
		<li class="post-date">
			<?php echo get_the_date();?>
		</li>
		<li class="post-author">
			<?php
			printf(
				'<span class="author vcard">By<a class="url fn n" href="%s" title="%s" rel="author"> %s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
				esc_attr( sprintf( esc_html__( 'View all posts by %s', 'dhc' ), get_the_author() ) ),
				get_the_author()
			);
			?>
		</li>

		<?php
		echo '<li class="post-categories">';
			the_category( ', ' );
		echo '</li>';
		?>		

<?php 	
	echo '</ul>';	
}
endif;

if ( ! function_exists( 'dhc_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function dhc_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', ', ' );
		if ( $tags_list && is_single() ) {
			printf( '<div class="tags-links"><strong>Tags:</strong>' . esc_html__( ' %1$s', 'dhc' ) . '</div>', 
				$tags_list );
		}
	}
	echo '<div class="social-share-article">';
		get_template_part('tpl/social-share');
	echo '</div>';
	edit_post_link( esc_html__( 'Edit', 'dhc' ), '<div class="clearboth"><span class="edit-link">', '</span></div>' );
}
endif;

if ( ! function_exists( 'flat_post_navigation' ) ) :
function dhc_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'dhc' ); ?></h2>
		<ul class="nav-links clearfix">
			<?php
			if ( is_attachment() ) :
				previous_post_link( '<li>%link</li>', sprintf( '<span class="meta-nav">%s</span> %%title', esc_html__( 'Published In', 'dhc' ) ) );
			else :
				previous_post_link( '<li class="previous-post">%link</li>', sprintf( '<span class="meta-nav">%s</span> %%title', esc_html__( 'Previous Post', 'dhc' ) ) );
				next_post_link( '<li class="next-post">%link</li>', sprintf( '<span class="meta-nav">%s</span> %%title', esc_html__( 'Next Post', 'dhc' ) ) );
			endif;
			?>
		</ul><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;