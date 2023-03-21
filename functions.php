<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );
function google_fonts() {
    wp_enqueue_style( 'google-fonts', "https://fonts.googleapis.com/css?family=Montserrat", false );
}
add_action( 'wp_enqueue_scripts', 'google_fonts' );

function wpb_custom_new_menu() {
	register_nav_menus(
	  array(
		'my-custom-menu' => __( 'Primary Menu' ),
		'extra-menu' => __( 'Secondary Menu' )
  
	  )
	);
  }
  add_action( 'init', 'wpb_custom_new_menu' );
  
		//Register Widgets
	function kinsta_register_widgets() {
   
	  register_sidebar( array(
	   'name' => __( 'After Content Widget Area', 'kinsta' ),
	   'id' => 'after-content-widget-area',
	   'description' => __( 'Widget area after the content', 'kinsta' ),
	   'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	   'after_widget' => '</div>',
	   'before_title' => '<h3 class="widget-title">',
	   'after_title' => '</h3>',
	 
	  ) );
	  register_sidebar( array(
		'name' => __( ' Content Widget Area', 'kinsta' ),
		'id' => 'content-widget-area',
		'description' => __( 'Widget area after the content', 'kinsta' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	  
	   ) );
	   register_sidebar( array(
		'name' => __( 'Widget Area', 'kinsta' ),
		'id' => 'widget-area',
		'description' => __( 'Widget area after the content', 'kinsta' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	  
	   ) );
	   register_sidebar( array(
		'name' => __( 'Widget Area-blog', 'kinsta' ),
		'id' => 'widget-area-blog',
		'description' => __( 'Widget area after the content', 'kinsta' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	  
	   ) );
	   register_sidebar( array(
		'name' => __( 'Widget Area-about', 'kinsta' ),
		'id' => 'widget-area-about',
		'description' => __( 'Widget area after the content', 'kinsta' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	  
	   ) );
	   register_sidebar( array(
		'name' => __( 'Widget Area-about-image', 'kinsta' ),
		'id' => 'widget-area-about-image',
		'description' => __( 'Widget area after the content', 'kinsta' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	  
	   ) );
	   register_sidebar( array(
		'name' => __( 'Widget Area-about-description', 'kinsta' ),
		'id' => 'widget-area-about-description',
		'description' => __( 'Widget area after the content', 'kinsta' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	  
	   ) );
	   register_sidebar( array(
		'name' => __( ' Content Widget footer', 'kinsta' ),
		'id' => 'content-widget-footer',
		'description' => __( 'Widget area after the content', 'kinsta' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
  
	   ));
	   register_sidebar( array(
		'name' => __( ' Content Widget social icon', 'kinsta' ),
		'id' => 'content-widget-social-icon',
		'description' => __( 'Widget area after the content', 'kinsta' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	   ));
	 }
	 
	 add_action( 'widgets_init', 'kinsta_register_widgets' );

	 function news_post(){

		$html = '<div class="tfc-news-main">';
		$args = array(
		'post_type'=> 'post',
		);
		$result = new WP_Query( $args );
		if ( $result-> have_posts() ) : 
			while ( $result->have_posts() ) : $result->the_post(); 
			 $html .= '<div class="tfc-news-cocktails">
						<div class="tfc-news-img"><a href="'.get_the_permalink().'">' .get_the_post_thumbnail(). '</a></div>
						<div class="tfc-news-content-main">
						<div class="tfc-news-haeding">'.get_the_title() . '</div>
						<div class="tfc-date-comment">' .get_the_date() . '</div>
						<div class="tfc-news-pharagraph">'. wp_trim_words( get_the_content(),25, '.' ).'</div>
						</div>
						</div>';
			  endwhile; 
			  endif; wp_reset_postdata();
				$html .= '</div>';
				echo $html;
	  }
	    add_action('categorypost','news_post');


	  function get_breadcrumb() {
		echo '<a class="create-account-title-h1" href="'.home_url().'" rel="nofollow">Home</a>';
		if (is_category() || is_single()) {
			echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
			the_category(' &bull; ');
				if (is_single()) {
					echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
					the_title();
				}
		} elseif (is_page()) {
			echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
			echo '<div class="create-account-title-content">';
	        echo '<a class="create-account-title-h1" href="'.the_title().'"rel="nofollow"></a>';
		echo '</div>';
			
		} elseif (is_search()) {
			echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
			echo '"<em>';
			echo the_search_query();
			echo '</em>"';
		}
	}
	 add_action('breadcrumb','get_breadcrumb');