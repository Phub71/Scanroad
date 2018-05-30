<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package dhc
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	

	<?php get_template_part( 'tpl/feature-post'); ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dhc' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'dhc' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
