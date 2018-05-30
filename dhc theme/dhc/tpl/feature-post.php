<?php
$feature_post = '';
global $dhc_thumbnail;
switch ( get_post_format() ) {	
	case 'gallery':
	$size = 'dhc-blog';
	$images = dhc_decode(dhc_meta( 'gallery_images'));

	if ( empty( $images ) )
		break;

	wp_enqueue_script( 'jquery-flexslider' );
	?>		
	<div class="featured-post blog-slider" data-auto="false" data-effect="slide" data-direction="horizotal">
		<div class="flexslider">
			<ul class="slides">
				<?php 
				if ( !empty( $images ) && is_array( $images ) ) {
					foreach ( $images as $image ) {
						echo '<li>';             
						echo wp_get_attachment_image($image,$dhc_thumbnail);
						echo '</li>';                                 
					}
				} 
				?> 
			</ul>
		</div>
	</div><!-- /.feature-post -->
	<?php 
	break;
	case 'video':	
	$video = dhc_meta('video_url');
	if ( !$video ) 
		break;
	global $_wp_additional_image_sizes;
	$video_size = array( 
		'height' => $_wp_additional_image_sizes[$dhc_thumbnail]['height']
		);
		$end = "";
		if ( has_post_thumbnail() ){
			$feature_post .= '<div class="dhc_video_embed">';
			$feature_post .= '<a href="#">'.get_the_post_thumbnail(null,$dhc_thumbnail).'<div class="dhc_video_button"><i class="fa fa-play" aria-hidden="true"></i></div></a>';
			$end = "</div>";
		}

		if ( filter_var( $video, FILTER_VALIDATE_URL ) ) { // display oEmbed HTML if a url exists
			if ( $oembed = @wp_oembed_get( $video,$video_size ) )
				$feature_post .= $oembed;
		} else { // display oEmbed HTML if a embed code exists
			$feature_post = $video;
		}
		$feature_post .= $end;
		break;
		default:

		$size = is_single() ? 'dhc-blog-single' : $dhc_thumbnail;
		
		$thumb = get_the_post_thumbnail( get_the_ID(), $size );
		if ( empty( $thumb ) )
			return;

		$feature_post .= '<a href="' . esc_url( get_permalink() ) . '">';
		$feature_post .= get_the_post_thumbnail( get_the_ID(), $size );
		$feature_post .= '</a>';
	}

	if ( $feature_post )
		echo '<div class="featured-post">' . $feature_post . '</div>';
	?>