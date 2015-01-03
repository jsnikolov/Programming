<?php
/**
 * Adding the Open Graph in the Language Attributes
 */
function add_opengraph_doctype( $output ) {
	return $output . ' prefix="og: http://ogp.me/ns#"';
}
add_filter('language_attributes', 'add_opengraph_doctype', 10, 1);

/**
 * Adding the Open Graph Meta Info 
 */

function insert_meta_info_in_head() {
	$keywords = 'литература, разкази, поезия, проза, роман, книги, писатели, муза, автори, читалня, библиотека, книжарница, цитати, откъси, коментари, новини, култура, фейсбук, двата бука, dvatabuka';
	if ( !is_singular()){
		echo '<meta name="description" content="' . get_bloginfo('description') . '" />';
		echo '<meta name="keywords" content="'.$keywords.'" />';
		echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>';
		echo '<meta property="og:title" content="' . get_bloginfo('name') . '"/>';
		echo '<meta property="og:url" content="' . get_bloginfo('url') . '/"/>';
		echo '<meta property="og:type" content="website"/>';
		echo '<meta property="og:image" content="' . get_template_directory_uri() . '/images/fb-logo-dvata-buka.png"/>';
		echo '<meta property="og:description" content="' . get_bloginfo('description') . '"/>';
	}
	else{
		if (have_posts()): 
			while(have_posts()): 
				the_post(); 
					$post_ID =  get_the_ID();
					$content = get_the_content();
					$args = array(
							'excerpt'           => $content,
							'count'				=> 400,
							'read_more'      	=> '',
							'end_string_format' => '...',
							'p_tag'				=> false,
							'cpecialchars'		=> true
					);
					$excerpt = get_excerpt($args);
		endwhile;
		endif;

		echo '<meta name="description" content="' . $excerpt . '"/>';
		$posttags = get_the_tags();
		$listOfTags = '';
		if ($posttags) {
			foreach($posttags as $tag) {
				$listOfTags .= $tag->name . ', ';
			}
		}
		echo '<meta name="keywords" content="'. $listOfTags . "двата бука, dvatabuka" . '" />';
		echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>';
		echo '<meta property="og:title" content="' . get_the_title() . ' | ' . get_bloginfo('name') . '"/>';
		echo '<meta property="og:url" content="' . get_permalink() . '/"/>';
		echo '<meta property="og:type" content="article"/>';
		if( has_post_thumbnail() ) {
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post_ID), 'main-news');
			echo '<meta property="og:image" content="' . esc_attr( $thumbnail[0] ) . '"/>';
		}
		echo '<meta property="og:description" content="' . $excerpt . '"/>';
	}
		echo '<meta property="fb:app_id" content="727236860684064" />';
		echo '<meta property="fb:admins" content="1125466857"/>';
}
add_action( 'wp_head', 'insert_meta_info_in_head' );

/**
* End Open Graph Attributes
*/

if ( ! isset( $content_width ) ) {
	$content_width = 650;
}

if ( ! function_exists( 'greentheme_setup' ) ) :
	function greentheme_setup() {
		load_theme_textdomain( 'GreenTheme', get_template_directory() . '/languages' );
		
		/**
		 * add_image_size
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'main-news', 270, 200, true);
		add_image_size( 'news', 185, 185, true);
		add_image_size( 'category-main-news', 100, 100, true);
		add_image_size( 'citat', 155, 126, true);
		add_image_size( 'top-offer', 90, 140, true);
	
		/**
		 * register_nav_menu
		 */
		register_nav_menus( array(
			'top-nav'   => __( 'Book top-nav' ),
			'menu' => __( 'Book menu', 'GreenTheme' ),
			'side-menu' => __( 'Book side-menu', 'GreenTheme' )
		) );
	}
endif; // greentheme_setup
add_action( 'after_setup_theme', 'greentheme_setup' );

/**
 * register_sidebar
 */
function greentheme_widgets_init() {

	register_sidebar(array(
	'name' => __( 'Right Sidebar', 'Green Theme' ),
	'id' => 'right-sidebar',
	'description' => __( 'Widgets in right side.', 'Green Theme'),
	'before_widget' => '<div class="container-top-15">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<div class="category-title-right"><h3>',
	'after_title'   => '</h3></div><div class="list">',
	));
}
add_action( 'widgets_init', 'greentheme_widgets_init' );

/**
 * Add new taxonomy, make it hierarchical (like categories)
 */
function create_admin_taxonomies() {
	$labels = array(
			'name'              => _x( 'Admin Order', 'taxonomy general name' ),
			'singular_name'     => _x( 'AdminOrder', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Admin Order' ),
			'all_items'         => __( 'All Admin Order' ),
			'parent_item'       => __( 'Parent' ),
			'parent_item_colon' => __( 'Parent:' ),
			'edit_item'         => __( 'Редактиране' ),
			'update_item'       => __( 'Update Admin Order' ),
			'add_new_item'      => __( 'Добави нов' ),
			'new_item_name'     => __( 'New Genre Name' ),
			'menu_name'         => __( 'Admin Order' ),
	);

	$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'adminorder' ),
	);

	register_taxonomy( 'adminorder', 'post', $args );
}
add_action( 'init', 'create_admin_taxonomies');

/**
 * img_caption_shortcode
 */
function my_img_caption_shortcode( $empty, $attr, $content ){
	$attr = shortcode_atts( array(
			'id'      => '',
			'align'   => 'alignnone',
			'width'   => '',
			'caption' => ''
	), $attr );

	if ( 1 > (int) $attr['width'] || empty( $attr['caption'] ) ) {
		return '';
	}

	if ( $attr['id'] ) {
		$attr['id'] = 'id="' . esc_attr( $attr['id'] ) . '" ';
	}
	return '<div ' . $attr['id'] . 'class="img-box '
			. esc_attr( $attr['align'] ) . '" '
					. 'style="width: ' . ((int) $attr['width'] ) . 'px;">'
							. do_shortcode( $content )
							. '<div class="img-description">'
									. $attr['caption'] . '</div></div>';
}
add_filter( 'img_caption_shortcode', 'my_img_caption_shortcode', 10, 3 );

/**
 * Enqueue scripts and styles for the front end.
 */
function greentheme_scripts_styles() {
	wp_enqueue_script('jquery');
	
	// Loads JavaScript file with functionality specific to GreenTheme.
	wp_enqueue_script( 'greentheme-analytics', get_template_directory_uri() . '/script/google-analytics.js');
	wp_enqueue_script( 'greentheme-mCustomScrollbar', get_template_directory_uri() . '/script/jquery.mCustomScrollbar.concat.min.js');
	wp_enqueue_script( 'greentheme-mScrollbar', get_template_directory_uri() . '/script/mScrollbar.js', array(), '', true );
	
	// Loads our main stylesheet.
	wp_enqueue_style( 'greentheme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'greentheme-style-scroll-bar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'greentheme-ie', get_template_directory_uri() . '/css/ie-style.css' );
	wp_style_add_data( 'greentheme-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'greentheme_scripts_styles' );

/**
 *   Custom excerpt length by the characters
 */
function get_excerpt($args){
	$read_more = '<a href="'.get_permalink().'" title="'.get_the_title().'" class="read-more">Виж още ...</a>';
	$end_string_format = ' [...]';
	
	$param = array(
		'excerpt'           => (isset($args['excerpt'])) ? $args['excerpt'] : '',
		'count'				=> (isset($args['count'])) ? $args['count'] : 100,
		'read_more'      	=> (isset($args['read_more'])) ? $args['read_more'] : $read_more,
		'end_string_format' => (isset($args['end_string_format'])) ? $args['end_string_format'] : $end_string_format,
		'p_tag'				=> (isset($args['p_tag'])) ? $args['p_tag'] : false,
		'cpecialchars'		=> (isset($args['cpecialchars'])) ? $args['cpecialchars'] : false,
	);
	
	$excerpt = strip_shortcodes( $param['excerpt'] );
	$excerpt = strip_tags($excerpt);
	if($param['cpecialchars']){
		$excerpt = htmlspecialchars($excerpt);
	}
	$length = strlen($excerpt);
	if($length > $param['count']){
		$excerpt = substr($excerpt, 0, $param['count']);
		$excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
		$excerpt .= $param['end_string_format'].$param['read_more'];
	}
	else{
		$excerpt = substr($excerpt, 0, $length);
	}
	if($param['p_tag']){
		$excerpt = '<p>'.$excerpt.'</p>';
	}
	else {
		$excerpt = $excerpt;
	}
	return $excerpt;
}

/**
 *   Custom excerpt length by the words 
 */
function my_excerpt($excerpt_length = 55, $linkMore = false, $id = false, $echo = true) {
	 
	$text = '';
	$excerpt_more= '';
	
	if($id) {
		$the_post = & get_post( $my_id = $id );
		$text = ($the_post->post_excerpt) ? $the_post->post_excerpt : $the_post->post_content;
	} else {
		global $post;
		$text = ($post->post_excerpt) ? $post->post_excerpt : get_the_content('');
	}

	$text = strip_shortcodes( $text );
	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]&gt;', $text);
	$text = strip_tags($text /*, '<strong>, <em>'*/);
	if($linkMore){
		$excerpt_more = '...'.'<a class="rm" href="'.get_permalink().'">Read more</a>';
	}
	
	$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
	if ( count($words) > $excerpt_length ) {
		array_pop($words);
		$text = implode(' ', $words);
		$text = $text . $excerpt_more;
	} else {
		$text = implode(' ', $words);
	}
	if($echo)
		echo apply_filters('the_content', $text);
	else
		return $text;
}

function get_my_excerpt($excerpt_length = 55, $id = false, $echo = false) {
	return my_excerpt($excerpt_length, $id, $echo);
}
