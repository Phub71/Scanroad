<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package finance
 */

get_header();
$sidebar_layout = dhc_choose_opt('page_layout');
$class[] = $sidebar_layout;
?>
<div class="col-md-12">

	<div id="primary" class="content-area <?php echo esc_attr(implode(" ",$class));?>">
		<main id="main" class="post-wrap" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php 
	get_sidebar();
	?>

</div><!-- /.col-md-12 -->

<?php get_footer(); ?>
