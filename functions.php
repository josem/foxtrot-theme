<?php

// enables wigitized sidebars
if ( function_exists('register_sidebar') ) {

	// Sidebar Widget
	// Location: the sidebar
	register_sidebar(array('name'=>'Sidebar',
		'before_widget' => '<div class="widget-area widget-sidebar"><ul>',
		'after_widget' => '</ul></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

// custom menu support
add_theme_support( 'menus' );

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'header-menu' => 'Header Menu',
		  'sidebar-menu' => 'Sidebar Menu',
		  'footer-menu' => 'Footer Menu',
		  'logged-in-menu' => 'Logged In Menu'
		)
	);
}

// removes detailed login error information for security
add_filter('login_errors',create_function('$a', "return null;"));

// Removes Trackbacks from the comment cout
add_filter('get_comments_number', 'comment_count', 0);

function comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}

// custom excerpt ellipses for 2.9+
function custom_excerpt_more($more) {
	return 'Read More &raquo;';
}

add_filter('excerpt_more', 'custom_excerpt_more');


// no more jumping for read more link
function no_more_jumping($post) {
	return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
}

add_filter('excerpt_more', 'no_more_jumping');


// category id in body and post class
function category_id_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category)
		$classes [] = 'cat-' . $category->cat_ID . '-id';
	return $classes;
}

add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');


function new_excerpt_more($more) {
	global $post;
	return '<p class="read_more_wrapper"><a href="'. get_permalink($post->ID) . '">Read more →</a></p>';
}

add_filter('excerpt_more', 'new_excerpt_more');

?>