<?php
	


// Is tag name
function compcurrtag($tagname) {
    global $post;

    $posttags = get_the_tags();
    if ($posttags) {
        foreach($posttags as $tag) {
            if($tag->name == $tagname) {
                return true;
            } 
        }
    }
    return false;
}


//Show list category in curent post
function showcatsinpost() {
    global $post;

    $strcats = '';
    $categories = get_the_category($post->ID);
    foreach($categories as $category) {
        if($category->term_id != 10) {
            $strcats .= '<li><strong><a href="'. get_category_link($category->term_id) .'">'.$category->name.'</a></strong>,</li>'; 
        }
    }
    return $strcats;
}


//Show list tag in current post
function showtagsinpost() {
    global $post;

    $strtags = '';
    $posttags = get_the_tags();
    if ($posttags) {
      foreach($posttags as $tag) {
        $strtags .= '<li><a href="'. get_tag_link($tag->term_id) .'" rel="tag">'. $tag->name .'</a><span class="kigou">,</span></li>';
      }
    }
    return $strtags;
}


/*** Show Taxonomy in Post ***/
function showtaxsinpost($taxslug) {
    global $post;
    if( !$taxslug ) {
        $taxslug = 'category';
    }
    $strtaxs = '';
    $taxonomies = wp_get_post_terms( $post->ID, $taxslug);
    foreach($taxonomies as $taxonomy) {
        $classtax = 'cat1';
        if($taxonomy->description) {
            $classtax = $taxonomy->description;
        }
        $strtaxs .= '<span class="' .$classtax. '">' .$taxonomy->name. '</span>';
    }
    return $strtaxs;
}


/*** Show List Taxonomy ***/
function showlisttax($taxslug) {
    if( !$taxslug ) {
        $taxslug = 'category';
    }
    $strtaxs = '';
    $taxonomies = get_terms( $taxslug );
    foreach($taxonomies as $taxonomy) {
        $strtaxs .= '<button class="filter" data-filter=".' .$taxonomy->slug. '">' .$taxonomy->name. '</button>';
    }
    return $strtaxs;
}


/*** Show List Category ***/
function showlistcat() {
    $categories = get_categories();
    $strcats = '';
    foreach($categories as $category) {
        $strcats .= '<li><a href="'. get_category_link($category->term_id) .'">'.$category->name.'</a></li>';
    }
    return $strcats;
}


/*** Show List Tax Post Type ***/
function listtaxPosttype($taxslug, $posttype='post') {
    if( !$taxslug ) {
        $taxslug = 'category';
    }
    $strtaxs = '';
    $taxonomies = get_terms( $taxslug );
    foreach($taxonomies as $taxonomy) {
        $taxlink = get_term_link($taxonomy);
        $keyval = '?';
        if( parse_url($taxlink, PHP_URL_QUERY) ) {
            $keyval = '&';
        }
        $strtaxs .= '<li><a href="' .$taxlink.$keyval.'post_type='.$posttype. '">'.$taxonomy->name.'</a></li>';
    }
    return $strtaxs;
}


//PAGING FUNCTION

// *** Paging Template Function *** //
function mfntemp_pagination( $postquery = '' ) {
    global $paged, $wp_query;
    
    $translate['next'] = '>';
    $translate['prev'] = '<';
    
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;  
    
    if( empty( $paged ) ) $paged = 1;
    $prev = $paged - 1;             
    $next = $paged + 1;
    
    $end_size = 1;
    $mid_size = 2;
    $show_all = false;
    $dots = false;

    $mainquery = $wp_query;
    if( isset($postquery) && $postquery ) {
        $mainquery = $postquery;
    }

    if( ! $total = $mainquery->max_num_pages ) $total = 1;
    
    if( $total > 1 )
    {
        echo '<div class="pager">';
        echo '<center>';
        
        if( $paged >1 ){
            echo '<a class="next page-numbers" href="'. previous_posts(false) .'">'. $translate['prev'] .'</a>';
        }

        for( $i=1; $i <= $total; $i++ ){
            if ( $i == $current ){
                echo '<span class="page-numbers current">'. $i .'</span>';
                $dots = true;
            } else {
                if ( $show_all || ( $i <= $end_size || ( $current && $i >= $current - $mid_size && $i <= $current + $mid_size ) || $i > $total - $end_size ) ){
                    echo '<a class="page-numbers" href="'. get_pagenum_link($i) .'">'. $i .'</a>';
                    $dots = true;
                } elseif ( $dots && ! $show_all ) {
                    echo '<span class="page-numbers dots">...</span>';
                    $dots = false;
                }
            }
      }
      
      if( $paged < $total ){
          echo '<a class="next page-numbers" href="'. next_posts(0,false) .'">'. $translate['next'] .'</a>';
      }

      echo '</center>';
      echo '</div>'."\n";
    }
}


// Get Offset paging
function getopffset( $postpage = 0 ){
    $pagenum = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $postperpage = get_option('posts_per_page');
    if( $postpage != 0 ) {
        $postperpage = $postpage;
    }
    return ($pagenum-1)*$postperpage;
}