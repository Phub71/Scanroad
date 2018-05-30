<?php
function dhc_portfolio_pagination( $pages = '', $range = 2 ) {  
    $showitems = ($range * 2)+1;  

    global $paged;
    if ( empty($paged) ) $paged = 1;

    if ( $pages == '' ) {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if ( !$pages ) {
            $pages = 1;
        }
    }   

    if ( 1 != $pages ) {
        echo "<div class='portfolio-pagination'>";

        if ( $paged > 2 && $paged > $range+1 && $showitems < $pages )
            echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
        if ( $paged > 1 && $showitems < $pages )
            echo "<a class='prev' href='".get_pagenum_link($paged - 1)."'><i class='fa fa-angle-double-left'>Prev</i></a>";

        for ( $i=1; $i <= $pages; $i++ ) {
            if ( 1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ) ) {
                echo ( $paged == $i )
                    ? "<span class='current'>".$i."</span>"
                    : "<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
            }
        }

        if ( $paged < $pages && $showitems < $pages )
            echo "<a class='next' href='".get_pagenum_link($paged + 1)."'>Next<i class='fa fa-angle-double-right' aria-hidden='true'></i>
</a>";  
        if ( $paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages )
            echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";

        echo "</div>\n";
    }
}

function dhc_loadmore_pagi( $pages = '', $range = 1 ) {
    global $paged;
    $showitems = ($range);  

    if( empty($paged) ) $paged = 1;

    if( $pages == '' ) {
        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if ( !$pages )
            $pages = 1;
    }   

    if ( 1 != $pages ) {
        echo "";
        if ( $paged > 2 && $paged > $range+1 && $showitems < $pages ) echo "";

        if ( $paged > 1 && $showitems < $pages ) echo "";

        for ( $i=1; $i <= $pages; $i++ ) {
                if ( 1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range+1) || $pages <= $showitems ) ) {
                echo ( $paged == $i ) ? "" : "<a class='dhc-button' href='" . get_pagenum_link($i) . "'>" . esc_html__('Load more', 'dhc') . "</a>";
            }
        }
        echo "\n";
    }
}