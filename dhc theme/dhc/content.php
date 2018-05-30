<?php
/**
 * @package dhc
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
	<div class="main-post entry-border">
		<?php get_template_part( 'tpl/feature-post'); ?>	
		<?php if (dhc_choose_opt('blog_archive_layout') == 'blog-grid') {
			dhc_render_meta();
		}
		?>
		<div class="content-post">
			<div class="entry-box-title clearfix">
				<div class="wrap-entry-title">
					<?php if (dhc_choose_opt('blog_archive_layout') != 'blog-grid') {
						dhc_render_meta();
					}
					?>

					<?php
					if ( is_singular('post') ) :						
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					endif;
					?>				
				</div><!-- /.wrap-entry-title -->
			</div>		
			<?php if ( (dhc_choose_opt( 'blog_archive_readmore' ) == 1 && is_home() ) || (dhc_choose_opt('blog_archive_readmore') == 1 && is_archive() ) ) : ?>
				<?php dhc_render_post(dhc_choose_opt('blog_archive_layout'),dhc_choose_opt( 'blog_archive_readmore_text'));?>
			<?php else :  ?>
				<?php  dhc_render_post(dhc_choose_opt('blog_archive_layout')) ?>
			<?php  endif; ?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dhc' ),
				'after'  => '</div>',
				) );
				?>
			</div><!-- /.entry-post -->

		</div><!-- /.main-post -->
	</article><!-- #post-## -->
