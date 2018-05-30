<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package dhc
 */

/*
 * Render comment list
 */
function dhc_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
    
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment_wrap clearfix">
			<div class="gravatar">					
				<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, 80 ); ?>
            </div>
			<div class='comment_content'>

				<footer class="comment_meta">
					<?php printf( '<h6 class="comment_author">%s</h6>', get_comment_author_link()); ?><?php edit_comment_link(esc_html__('(Edit)', 'dhc' ),'  ','') ?>
                    <?php
                    $d = 'F j, Y';
					$comment_date = get_comment_date( $d );
					?>
					<div class="clearfix"></div>
					<span class="comment_time"><?php echo esc_attr( $comment_date ); ?></span>
					<span class="comement_reply"><?php 
						comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</span>
				</footer>

				<div class='comment_text'>
					<?php comment_text() ?>
				<?php if ($comment->comment_approved == '0') : ?>
					<span class="unapproved"><?php esc_html_e( 'Your comment is awaiting moderation.', 'dhc') ?></span>
				<?php endif; ?>
				</div>

			</div>
		</article>
<?php
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

		<?php if ( have_comments() ) : ?>
		<div class="comment-list-wrap">

			<h2 class="comment-title"><?php echo esc_html__( 'COMMENTS', 'dhc' )?>
			</h2>

			<ol class="comment-list">
				<?php wp_list_comments( array( 'callback' => 'dhc_comments' ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav class="navigation comment-navigation" role="navigation">
					<h5 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'dhc' ); ?></h5>

					<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'dhc' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'dhc' ) ); ?></div>
				</nav>
			<?php endif; ?>

			<?php if ( !comments_open() && get_comments_number() ) : ?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'dhc' ); ?></p>
			<?php endif; ?>
			</div><!-- /.comment-list-wrap -->

		<?php endif; ?><!-- have_comments -->

	<?php
	if ( comments_open() ) {
		$commenter = wp_get_current_commenter();
		$aria_req = get_option( 'require_name_email' ) ? " aria-required='true'" : '';
		$comment_args = array(
			'title_reply'          => esc_html__( 'LEAVE REPLY', 'dhc' ),
			'id_submit'            => 'comment-reply',
			'label_submit'         => esc_html__( 'Post Comment', 'dhc' ),
			'class_form'		   => 'clearfix',
			
			'fields'               => apply_filters( 'comment_form_default_fields', array(
				'comment' => '<div class="comment-right"><fieldset class="message">
										<textarea id="comment-message" placeholder="Comment" name="comment" rows="8" tabindhc="4"></textarea>
									</fieldset></div>',
				'author' => '<div class="comment-left">
								<fieldset class="name-container">									
								<input type="text" id="author" placeholder="Name" class="tb-my-input" name="author" tabindhc="1" value="' . esc_attr( $commenter['comment_author'] ) . '" size="32"' . $aria_req . '>
							</fieldset></div>',
				'email'  => '<fieldset class="email-container">									
								<input type="text" id="email" placeholder="Email" class="tb-my-input" name="email" tabindhc="2" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="32"' . $aria_req . '>
							</fieldset>',			    
			) ),
			
			'comment_notes_after'  => '',
			'comment_notes_before' => '',
		);

		$comment_args2 = array(
			'title_reply'          => esc_html__( 'LEAVE REPLY', 'dhc' ));

		comment_form($comment_args2);
	}
	?><!-- comments_open -->

</div><!-- #comments -->
