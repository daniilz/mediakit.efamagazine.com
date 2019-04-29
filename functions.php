<?php
/**
 * efamk functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package efamk
 */

if ( ! function_exists( 'efamk_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function efamk_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on efamk, use a find and replace
	 * to change 'efamk' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'efamk', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'efamk' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'efamk_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'efamk_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function efamk_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'efamk_content_width', 640 );
}
add_action( 'after_setup_theme', 'efamk_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function efamk_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'efamk' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'efamk' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'efamk_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function efamk_scripts() {
	wp_enqueue_style( 'efamk-style', get_stylesheet_uri() );

	wp_enqueue_script( 'efamk-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'efamk-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'efamk_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}*/

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

/********* Row Page ********/
function display_row_page ($posttype){

if ($posttype) {
$args = array( 'post_type' =>  $posttype, 'posts_per_page' => 4);

$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <div class="event">
        <div style="width:40%;float:right;margin-top:30px;">

            <?php
            if (get_post_meta( get_the_ID(), 'right_image', true )) {
                $img = get_post_meta( get_the_ID(), 'right_image', true ); 
                
                $bottom_link = get_post_meta(get_the_ID(), 'bottom_link', true);
                if ($bottom_link) { 
                ?>
                <a href="<?php the_field('bottom_link'); ?>">
                <?php } ?>
                <?php
                echo pods_image($img['ID'],full); 
                if ($bottom_link) { 
                ?>
                </a>
                <?php } ?>
                <?php
            } 
            ?>

        </div>

        <div style="width:55%; float:left;margin-right:10px;">


            <h2><?php the_title(); ?></h2>


            <?php the_content(); ?>
            <br>
            <?php
            $bottom_link = get_post_meta(get_the_ID(), 'bottom_link', true);
            if ($bottom_link) { 
            ?>
            <a href="<?php the_field('bottom_link'); ?>" class="row_link"><?php the_field('link_text'); ?> &raquo;</a>
            <?php } ?>

        </div>

        <br clear="all" />
    </div>
    
    <?php 
    // If not last post add horizontal line
    if (($loop->current_post +1) != ($loop->post_count)) {  ?>
        <hr class="divider-medium" />
    <?php }
    ?>

    <?php endwhile; 
}
}

function remove_empty_p( $content ) {
    $content = force_balance_tags( $content );
    $content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
    $content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
    return $content;
}


add_filter('the_content', 'remove_empty_p', 20, 1);


add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars )
{
	// Uncomment to view format of $toolbars
	/*
	echo '< pre >';
		print_r($toolbars);
	echo '< /pre >';
	die;
	*/

	// Add a new toolbar called "Very Simple"
	// - this toolbar has only 1 row of buttons
	//$toolbars['Very Simple' ] = array();
	//$toolbars['Very Simple' ][1] = array('bold' , 'italic' , 'underline' );

	// Edit the "Full" toolbar and remove 'code'
	// - delet from array code from http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
	//if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
	//{
	//    unset( $toolbars['Full' ][2][$key] );
	//}

	// remove the 'Basic' toolbar completely
	unset( $toolbars['Basic' ] );

	// return $toolbars - IMPORTANT!
	return $toolbars;
}