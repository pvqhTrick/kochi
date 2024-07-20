<?php
/**
 * 
 * My Theme Function
 *
 */


// DEFINE
if (!isset($content_width))
	$content_width = 604;

define('THEME_URL', get_stylesheet_directory_uri());
define('HOME_URL', get_home_url());

if (version_compare($GLOBALS['wp_version'], '3.6-alpha', '<'))
	require get_template_directory() . '/inc/back-compat.php';

 add_action('after_setup_theme', 'mytheme_setup');

// THEME SETUP
function mytheme_setup()
{
	load_theme_textdomain('mytheme', get_template_directory() . '/languages');

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support('automatic-feed-links');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu('primary', __('Navigation Menu', 'mytheme'));

	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(604, 270, true);

	// This theme uses its own gallery styles.
	add_filter('use_default_gallery_style', '__return_false');
}


///////// FILTER

// ADD TITTLE
add_filter('wp_title', 'mytheme_wp_title', 10, 2);
function mytheme_wp_title($title, $sep)
{ 
	global $paged, $page;

	if (is_feed())
		return $title;

	// Add the site name.
	$title .= get_bloginfo('name', 'display');

	// Add the site description for the home/front page.
	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page()))
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if (($paged >= 2 || $page >= 2) && !is_404())
		$title = "$title $sep " . sprintf(__('Page %s', 'mytheme'), max($paged, $page));

	return $title;
}

// EXCERPT LENGTH
add_filter( 'excerpt_length', 'kochi_hung_excerpt_length', 100 );
function kochi_hung_excerpt_length( $length ) {
	global $post;
	if($post->post_type === 'post'){
		return 10;
	}
	return $length;
}


add_filter( 'excerpt_more', 'kochi_hung_excerpt_more' );	
function kochi_hung_excerpt_more( $more ) {
    global $post;
	if($post->post_type === 'post'){
		return '...';
	}
	return $more;
}
///////// ACTION

// LOADING CSS AND JS 
add_action('wp_enqueue_scripts', 'load_assets');
function load_assets()
{
	if (is_home() || is_front_page()) {
		wp_enqueue_style('index-style', get_template_directory_uri() . '/css/index.css');
	} elseif (is_single()) {
		wp_enqueue_style('single-style', get_template_directory_uri() . '/css/detail.css');
	} elseif (is_page('list')) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/css/list.css');
	} else{
		wp_enqueue_style('index-style', get_template_directory_uri() . '/css/list.css');
	}

	wp_enqueue_style('maincommoncss', get_theme_file_uri() . '/css/common.css');
	wp_enqueue_style('mainjquerycss', get_theme_file_uri() . '/css/jquery.bxslider.css');

	wp_enqueue_script('jqueryjs', get_theme_file_uri() . "/js/jquery-1.11.0.min.js", array(), '1.0', array('in_footer' => false));
	wp_enqueue_script('jquerybxsliderjs', get_theme_file_uri() . "/js/jquery.bxslider.min.js", array('jqueryjs'), '1.0', array('in_footer' => false));
	wp_enqueue_script('mainjs', get_theme_file_uri() . "/js/script.js", array('jqueryjs'), '1.0', array('in_footer' => false));
}


// ADD IMAGE SIZE
add_action('after_setup_theme', 'kochi_image_sizes');
function kochi_image_sizes() {
    add_image_size('sight-item', 301, 232, true);
    // add_image_size('single', 301, 232, true);
}

///////// FUNCTION

// POST NAVIGATION
if (!function_exists('mytheme_post_nav')):
	function mytheme_post_nav()	
	{
		global $post;

		$previous = get_adjacent_post(false, '', true);
		$next = get_adjacent_post(false, '', false);

		if (!$next && !$previous)
			return;
		?>
		<nav class="navigation post-navigation" role="navigation">
			<div class="slider-page">
				<?php previous_post_link('<p class="prev">%link</p>', '前へ'); ?>

				<?php next_post_link('<p class="next">%link</p>', '次へ'); ?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
endif;

// THEME PAGINATION FUNCTION
function theme_pagination($post_query = null)
{
	global $paged, $wp_query;

	$translate['next'] = '次へ';
	$translate['prev'] = '前へ';

	if (empty($paged))
		$paged = 1;
	$prev = $paged - 1;
	$next = $paged + 1;

	$end_size = 1;
	$mid_size = 2;
	$show_all = false;
	$dots = false;

	$pagi_query = $wp_query;
	if (isset($post_query) && $post_query) {
		$pagi_query = $post_query;
	}

	if (!$total = $pagi_query->max_num_pages)
		$total = 1;

	if ($total > 1) {
		echo '<div class="slider-page">';
		

		if ($paged > 1) {
			echo '<p class="prev"><a href="' . previous_posts(false) . '">' . $translate['prev'] . '</a></p>';
		}
		echo '<ul>';
		for ($i = 1; $i <= $total; $i++) {
			if ($i == $paged) {
				echo '<li class="active"><a>' . $i . '</a></li>';
				$dots = true;
			} else {
				if ($show_all || ($i <= $end_size || ($paged && $i >= $paged - $mid_size && $i <= $paged + $mid_size) || $i > $total - $end_size)) {
					echo '<li><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
					$dots = true;
				} elseif ($dots && !$show_all) {
					echo '<li class="dots"><a>...</a></li>';
					$dots = false;
				}
			}
		}
		echo '</ul>';
		if ($paged < $total) {
			echo '<p class="next"><a href="' . next_posts(0, false) . '">' . $translate['next'] . '</a></p>';
		}

		
		echo '</div>';
	}
}

// FUNCTION NAVIGATION
function kochi_hung_menu_nav(){
	$menu_name = 'primary'; 
	$locations = get_nav_menu_locations(); 
	
	if (isset($locations[$menu_name])):
		$menu_id = $locations[$menu_name]; 
		$menu_items = wp_get_nav_menu_items($menu_id);
		if ($menu_items):
			echo 	'<div class="mainMenu">';
			echo	'<ul class="menu">';
				foreach ($menu_items as $item):?>
					<li class ="<?php echo implode('', $item->classes); ?>"><a href=<?php echo esc_url($item->url)?>><?php echo esc_html($item->title) ?></a></li>
				<?php endforeach;
			echo	'</ul>';
			echo	'</div>';
		endif; 
	endif;  
}

// FUNCTION CHECK IS THAT A NEW POST
function is_new_post( $postId=null, $days = 3 ){
	$post_date = get_the_date('U', $postId);//UNIX trả về giây
    $current_date = current_time('timestamp');
    $dateUnitFormat = $current_date - $post_date;
    $days_diff = round($dateUnitFormat / (60 * 60 * 24));
	// var_dump( $post_date , $dateUnitFormat, $days_diff);
	return $days_diff<=$days ? true : false;
}

// GET DEFAULT IMAGE
function the_default_thumbnail(){
	echo '<img src="' .get_theme_file_uri() . ('/img/common/img_item_default'). '">';
}
