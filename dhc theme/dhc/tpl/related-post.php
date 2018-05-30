<?php
if ( ! get_theme_mod( 'show_related_post' ) )
    return;

$args = array(
    'limit'         => get_theme_mod( 'number_related_post', 3 ),
    'layout'        => get_theme_mod( 'related_post_style', 'blog-grid' ),
    'grid_columns'  => get_theme_mod( 'grid_columns_post_related', 'blog-three-columns' ),
    'hide_readmore' => 'no',
    'content_length'=> dhc_choose_opt('blog_archive_post_excepts_length'),
    'readmore_text' => dhc_choose_opt('blog_archive_readmore_text'),
    'exclude'       => get_the_ID()
);
$tags = (array) get_the_tags();
$categories = (array) get_the_category();

if ( empty( $tags ) && empty( $categories ) )
    return;

$args['tag']      = wp_list_pluck( $tags, 'slug' );
$args['category'] = wp_list_pluck( $categories, 'slug' );
?>
<section class="related-post related-posts-box <?php echo esc_attr ( get_theme_mod( 'grid_columns_post_related', 'blog-three-columns' ) ); ?>">
    <div class="box-wrapper">
        <h3 class="box-title"><?php esc_html_e( 'Related Posts', 'dhc' ) ?></h3>
        <div class="box-content">
            <?php echo dhc_VCExtend::dhc_posts( $args ) ?>
        </div>
    </div>
</section>