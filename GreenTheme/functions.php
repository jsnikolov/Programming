<?php
/**
 * Adding the Open Graph in the Language Attributes
 */
function add_opengraph_doctype( $output ) {
	return $output . ' prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"';
}
add_filter('language_attributes', 'add_opengraph_doctype', 10, 1);

/**
 * Adding the Open Graph and SEO Meta Info 
 */

function add_meta_tags() {
	$site_name = get_bloginfo('name');
	$description = get_bloginfo('description');
	$title = '';
	$type = '';
	$url = '';
	$image = '';
	$keywords = 'литература, разкази, поезия, проза, роман, книги, писатели, муза, автори, читалня, библиотека, книжарница, цитати, откъси, коментари, новини, култура, фейсбук, двата бука, dvatabuka';
	
	switch (true){
		/* HOME */
		case is_home() : 
			$title = get_bloginfo('name');
			$type = 'website';
			$url = get_bloginfo('url');
			$image = get_template_directory_uri() . '/images/fb-logo-dvata-buka.png';
			break;
		/* SINGLE */
		case is_single() :
			$title = get_the_title() . ' | ' . get_bloginfo('name');
			$type = 'article';
			$url = get_permalink();
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
				
			$description = $excerpt;
			if(has_post_thumbnail( $post_ID )) {
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post_ID ), 'medium' );
				$image = esc_attr( $thumbnail[0] );
			}
			$post_tags = get_the_tags();
			$list_of_tags = '';
			if ($post_tags) {
				foreach($post_tags as $tag) {
					$list_of_tags .= $tag->name . ', ';
				}
			}
			$list_of_tags .= 'двата бука, dvatabuka';
			$keywords = $list_of_tags;
		break;
		/* CATEGORY */
		case is_category() : 
			$title = single_cat_title( '', false );
			$type = 'other';
			$url = get_category_link(get_cat_ID( $title));
			$args = array(
					'excerpt'           => category_description(),
					'count'				=> 400,
					'read_more'      	=> '',
					'end_string_format' => '...',
					'p_tag'				=> false,
					'cpecialchars'		=> true
			);
			$description = get_excerpt($args);
			$image = get_template_directory_uri() . '/images/fb-logo-dvata-buka.png';
			$keywords = '';
		break;
		/* PAGE */
		case is_page() : 
			$title = get_the_title() . ' | ' . get_bloginfo('name');
			$type = 'page';
			$url = get_permalink();
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
				
			$description = $excerpt;
			if(has_post_thumbnail( $post_ID )) {
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post_ID ), 'medium' );
				$image = esc_attr( $thumbnail[0] );
			}
			$post_tags = get_the_tags();
			$list_of_tags = '';
			if ($post_tags) {
				foreach($post_tags as $tag) {
					$list_of_tags .= $tag->name . ', ';
				}
			}
			$list_of_tags .= 'двата бука, dvatabuka';
			$keywords = $list_of_tags;
		break;
		/* TAGS */
		case is_tag() : 
			$title = single_tag_title('', false);
			$type = 'tags';
			$url = get_tag_link(get_term_by('slug',$title ,'post_tag')->term_id);
			$image = '';
			$description = 'Архив с етикет ' . $title;
			$keywords = $title;
		break;
		case is_archive() :  
				if ( is_day() ){
					$date = get_the_date('d F Y');
				}
				elseif ( is_month() ){
					$date = get_the_date('F Y');
				}
				elseif ( is_year() ){
					$date = get_the_date('Y');
				}
			$title = 'Archive - ' . $date;
			$type = 'archive';
			$description = 'Архив - ' . $date;
			$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$image = '';
			$robots = '<meta name="robots" content="noindex, follow" />';
		break;
		case is_404() :
				echo '<meta name="description" content="404 not found" />';
				return ;
			break;
		default :  
			$title = 'Archive';
			$type = 'archive'; 
			$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$image = '';
			$robots = '<meta name="robots" content="noindex, follow" />';
		break;
	
	}
	
	$meta_tags = '<meta name="description" content="' . $description . '" />
				  <meta name="keywords" content="'.$keywords.'" />';
	
	$fb_meta_tags =	'<meta property="og:site_name" content="' . $site_name . '"/>
						<meta property="og:title" content="' . $title . '"/>
						<meta property="og:type" content="'. $type .'"/>
						<meta property="og:url" content="' . $url . '"/>
						<meta property="og:description" content="' . $description . '"/>
						<meta property="og:image" content="' . $image . '"/>
						<meta property="fb:admins" content="1125466857"/>
						<meta property="fb:app_id" content="[FB_APP_ID]" />';
	
	if(is_home() || is_category() || is_tag() ){
		echo '<link href="'.$url.'" rel="canonical">';
	}
	if(isset($robots)){
		echo $robots . $meta_tags . $fb_meta_tags;
	}
	else{
		echo $meta_tags . $fb_meta_tags;
	}
}
add_action( 'wp_head', 'add_meta_tags' );

/**
* End Open Graph Attributes
*/


if ( ! isset( $content_width ) ) {
	$content_width = 650;
}

if ( ! function_exists( 'greentheme_setup' ) ) :
	function greentheme_setup() {
		load_theme_textdomain( 'greentheme', get_template_directory() . '/languages' );
		
		/**
		 * add_image_size
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'main-news', 255, 204, true); // Ratio 5:4
		add_image_size( 'citat', 150, 120, true); // Ratio 5:4
		add_image_size( 'news', 185, 185, true); // Ratio 1:1
		add_image_size( 'category-main-news', 100, 100, true); // Ratio 1:1
		add_image_size( 'top-offer', 90, 140, true); // Ratio 9:14
		add_image_size( 'korica', 180, 280, true); // Ratio 9:14
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
	
	// Loads JavaScript file with functionality specific to GreenTheme.
	wp_enqueue_script( 'greentheme-analytics', get_template_directory_uri() . '/script/google-analytics.js');
	wp_enqueue_script( 'greentheme-mCustomScrollbar', get_template_directory_uri() . '/script/jquery.mCustomScrollbar.concat.min.js', array('jquery'));
	wp_enqueue_script( 'greentheme-mScrollbar', get_template_directory_uri() . '/script/mScrollbar.js', array('jquery'), '', true );

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
 *   Custom excerpt "read more link"
 */
function new_excerpt_more( $more ) {
	return ' [...] <a href="'.get_permalink().'" title="'.get_the_title().'" class="read-more">Виж още ...</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
