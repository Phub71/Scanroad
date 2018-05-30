<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codhc.wordpress.org/Template_Hierarchy
 *
 * @package finance
 */

get_header(); ?>
<?php 
	$blog_layout = dhc_get_opt('blog_archive_layout');	
	$imgs = array(
		'blog-grid' => 'dhc-blog-grid',
		'blog-list' => 'dhc-blog',
		'blog-list-small' => 'dhc-blog-listsmall'
		);
	$class_names = array(
		1 => 'blog-one-column',
		2 => 'blog-two-columns',
		3 => 'blog-three-columns',
		4 => 'blog-four-columns',
		);		
	global $dhc_thumbnail;
	$dhc_thumbnail = $imgs[$blog_layout];
	$class[] = 'blog-archive';
	$class[] = $blog_layout;
	//$class[] =  $class_names[$columns];
?>
<div class="col-md-12">

	<div id="primary" class="content-area ">
		<main id="main" class="post-wrap" role="main">
		<?php if ( have_posts() ) : ?>		
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_type() );
				?>

			<?php endwhile; ?>
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		</main><!-- #main -->
		<div class="clearfix">
		<?php
			global $paging_style, $paging_for;
			$paging_for = 'blog';
	        $paging_style = dhc_choose_opt('blog_archive_pagination_style');		        
			get_template_part( 'tpl/pagination' );				
		?>
		</div>
	</div><!-- #primary -->

	<?php 
	if ( dhc_choose_opt( 'blog_layout') != 'fullwidth' ) :
	get_sidebar();
	endif;
	?>
</div><!-- /.col-md-12 -->

<?php get_footer(); ?>
