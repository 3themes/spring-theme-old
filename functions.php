<?php

function spring_theme_init()
{
	// Add support for theme translations
	load_theme_textdomain( 'spring_theme', get_template_directory() . '/languages' );

	//enqueue all the things! (modernizr, jQuery, hoverIntent, SuperFish, comment-reply)
	add_action('wp_enqueue_scripts', 'spring_enqueue_scripts');

	//add some helpers to poor old IE
	add_action('wp_head', 'spring_add_ie_helpers');

	//clean up the head
	spring_remove_default_wp_actions();

	//register custom menus
	spring_register_menus();

	//set image max width
	spring_set_max_image_width();

	//add thumbnail support and set widths
	spring_post_thumbnail_support();

	//add post format support
	spring_post_format_support();

	//add html5 support
	spring_html5_support();

	// Link post thumbnail to post permalink
	add_filter('post_thumbnail_html', 'spring_post_image_html', 10, 3);

	//initialize the sq widget
	add_action('init', 'spring_widgets_init');

	// Remove width/height attribute on inserted images
	add_filter('post_thumbnail_html', 'spring_remove_width_attribute', 10);

	// Images are sized via CSS or inline style="" attribute by user.
	add_filter('image_send_to_editor', 'spring_remove_width_attribute', 10);

    // This theme uses wp_nav_menu() in # location.
	// TODO: Add to header.php
	// TODO: Implement on live site
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'spring_theme' ),
    ) );
    
	// automatic feeds
	add_theme_support('automatic-feed-links');
}

//thumbs up, lets go!
spring_theme_init();

//enqueue scripts
function spring_enqueue_scripts()
{
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-2.6.3.dev.js' );
	wp_enqueue_script( 'jquery', get_site_url() . '/wp-includes/js/jquery/jquery.js', '', '', true );
	wp_enqueue_script( 'hoverintent', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'springjs', get_template_directory_uri() . '/js/spring.js', array( 'jquery' ), '', true );

	if (is_singular()) {
		wp_enqueue_script( 'comment-reply', get_site_url() . '/wp-includes/js/comment-reply.js', '', '', true );
	}

    wp_enqueue_style( 'springfonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400|Source+Code+Pro' );
	wp_enqueue_style( 'springstyles', get_stylesheet_uri() );
}

function spring_enqueue_styles() {

}

//add IE8 helper scripts to header
function spring_add_ie_helpers()
{
	echo '
            <!--[if lt IE 9]>
                <script src="' . get_template_directory_uri() . '/js/selectivizr-min.js"></script>
                <script src="' . get_template_directory_uri() . '/js/imgsizer.js"></script>
            <![endif]-->
        ';
}

//remove some simple (and default) wp actions
function spring_remove_default_wp_actions()
{
	// http://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
}

//enable custom menus
//register menus
function spring_register_menus()
{
	if (function_exists('register_nav_menus')) {
		register_nav_menus(
			array(
				'header_menu' => __( 'Header Menu', 'spring_theme' ) //,
				//'footer_menu' => __( 'Footer Menu', 'spring_theme' )
			)
		);
	}
}

//set max image width if content_width isn't set.
function spring_set_max_image_width()
{
	if (!isset($content_width)) {
		$content_width = 1200;
	}
}

//add post thumbnail support
//set post thumbnail size
function spring_post_thumbnail_support()
{
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(1200, 600);
}

//add post format support
function spring_post_format_support()
{
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio'));
}

//link post thumbnail to post permalink
function spring_post_image_html($html, $post_id, $post_image_id)
{
	return '<a href="' . get_permalink($post_id) . '" title="' .
	esc_attr(get_post_field('post_title', $post_id)) . '">' . $html . '</a>';
}

//enable sidebar widget support
//declare sidebar areas
function spring_widgets_init()
{
	register_sidebar(
		array(
			'name' => __('Main Sidebar', 'spring_theme'),
			'id' => 'sidebar-1',
			'before_widget' => '<article class="widget">',
			'after_widget' => '</article><hr />',
			'before_title' => '<h1>',
			'after_title' => '</h1>',
		)
	);
}

//add HTML5 support in search form, comment form, and comment list
function spring_html5_support() {
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
}

//remove width and height attributes from images added to content via the editors
function spring_remove_width_attribute($html)
{
	return preg_replace('/(width|height)="\d*"\s/', "", $html);
}

// Print the meta data display when a post was posted so we can reuse it
function spring_posted_on()
{
	printf( __( '<time class="updated" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'spring_theme' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'Posts by %s', 'spring_theme' ), get_the_author() ) ),
		get_the_author()
	);
}