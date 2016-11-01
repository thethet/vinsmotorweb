<?php
ob_start();
define( 'UPLOADS', 'wp-content/'.'uploads' ); 
//hide admin bar
add_filter('show_admin_bar' , '__return_false');
$template_url= get_template_directory_uri();
define('ASSETS_VERSION','1.0');
define('CUSTOM_POST_TYPE','car');
define('TAXONOMY_BRAND_TYPE','brand');
/* -------------------------------------------------------------------------------- */
/* load css function
/* -------------------------------------------------------------------------------- */
function de_include_css()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, '1.0', 'screen');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', false, '1.0', 'screen');   
	wp_enqueue_style('tabstyles', get_template_directory_uri() . '/css/responsive.css', false, '1.0', 'screen');   
	wp_enqueue_style('tabstyles', get_template_directory_uri() . '/css/tabstyles.css', false, '1.0', 'screen');   
}

/* -------------------------------------------------------------------------------- */
/* call css
/* -------------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'de_include_css');
?>

<?php 
/* register menu /* 
-------------------------------------------------------------------------------- */

register_nav_menus(array(
					 'main_menu' => 'Main Menu', //header
					 'sub_menu' => 'Sub Menu', //our cars menu
					 'footer_menu' => 'Footer Menu',
					 ));
					 
/* register sidebar /* 
-------------------------------------------------------------------------------- */
/*-------------------------------------
	Sidebar Register To Build Widgets
-------------------------------------*/
if(function_exists('register_sidebar')){
	register_sidebar( array(
	'name'          => 'footer 1',
	'id'            => 'footer-1',	
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>'  
	));

	register_sidebar( array(
	'name'          => 'footer 2',
	'id'            => 'footer-2',
	'class'         => 'post-links',		
	)); 
	register_sidebar( array(
	'name'          => 'footer 3',
	'id'            => 'footer-3',	
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
	)); 
	register_sidebar( array(
	'name'          => 'footer 4',
	'id'            => 'footer-4',	
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
	)); 
	register_sidebar( array(
	'name'          => 'footer 5',
	'id'            => 'footer-5',	
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
	)); 

}

/* 
	Buildig Widgets
*/
class My_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'contact-us', //Base ID
			__( 'Contact', 'text_domain'), //Name
			array('description'=> __('Contact info Widget', 'text_domain'), )//Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		//var_dump($instance);
	?>

		<li><a href="#"><i class="fa fa-map-marker"></i>  <?php echo $instance['address']; ?>	</a></li>
		<li><a href="#"><i class="fa fa-phone"></i><?php echo $instance['phone']; ?></a></li>
		<li><a href="#"><i class="fa fa-envelope-o"></i>  <?php echo $instance['gmail']; ?></a></li>
			

	
<?php
}
	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$address = ! empty( $instance['address'] ) ? $instance['address'] : __( '100 Jalan Sultan, Sultan Plaza, #08-04/05, Singapore 199001', 'text_domain' );
		$phone = ! empty( $instance['phone'] ) ? $instance['phone'] : __( 'Tel: (65) 6391 3901', 'text_domain' );
		$gmail = ! empty( $instance['gmail'] ) ? $instance['gmail'] : __( 'contact@innov8te.com.sg', 'text_domain' );
		?>

		<p>
		<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address:' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>"  value="<?php echo esc_attr( $address ); ?>">100 Jalan Sultan, Sultan Plaza, #08-04/05, Singapore 199001</textarea>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone:' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>"  value="<?php echo esc_attr( $phone ); ?>">Tel: (65) 6391 3901</textarea>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'gmail' ); ?>"><?php _e( 'Gmail' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'gmail' ); ?>" name="<?php echo $this->get_field_name( 'gmail' ); ?>"  value="<?php echo esc_attr( $gmail ); ?>"> contact@innov8te.com.sg</textarea>
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
		$instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';	
		$instance['gmail'] = ( ! empty( $new_instance['gmail'] ) ) ? strip_tags( $new_instance['gmail'] ) : '';

		return $instance;
	}
}
add_action( 'widgets_init', function(){
     register_widget( 'My_Widget' );
});
// To add active class
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
    if( in_array('current-menu-item', $classes) ){
            $classes[] = 'active';
    }
  return $classes;
}
// To add featured image
add_theme_support('post-thumbnails',array('post','page','car','services'));
	add_image_size( 'full-size', 1920, 400, true );
	add_image_size( 'featured-large', 1920, 400, true ); 
	
  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      //echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

   if ( ! function_exists( 'my_pagination' ) ) :
	function my_pagination() {
		global $wp_query;

		$big = 999999999; // need an unlikely integer
		
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
	}
	endif; 
	add_action( 'init', 'my_add_excerpts_to_pages' );
	function my_add_excerpts_to_pages() {
		 add_post_type_support( 'page', 'excerpt' );
	}

?>
<?php
// [bartag foo="foo-value"]
function bartag_func( $atts ) {
    $a = shortcode_atts( array(
        'foo' => 'something',
        'bar' => 'something else',
    ), $atts );

    return "foo = {$a['foo']}";
}
add_shortcode( 'bartag', 'bartag_func' );
?>