<?php
/*
 *  Author: cuongvv
*/
include_once("inc/mega-menus.php");
include_once("inc/breadcrumb-navigation.php");
include_once("inc/pagination.php");
//include_once("inc/visual-term-description-editor.php");
//include_once("inc/widgets.php");


/*add_filter( 'woocommerce_get_price_html', 'my_price_html', 100, 2 );

function my_price_html( $price, $product ){
	if(is_product()) : 
		return 'Giá: ' . str_replace( '<ins>', 'Giảm giá: <ins>', $price );
	endif;
}*/





/**
 * Add new register fields for WooCommerce registration.
 *
 * @return string Register fields HTML.
 */
function wooc_extra_register_fields() {
	?>

	<p class="form-row form-row-first">
	<label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
	</p>

	<p class="form-row form-row-last">
	<label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
	</p>

	<div class="clear"></div>

	<p class="form-row form-row-wide">
	<label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
	</p>

	<?php
}

add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );

/**
 * Validate the extra register fields.
 *
 * @param  string $username          Current username.
 * @param  string $email             Current email.
 * @param  object $validation_errors WP_Error object.
 *
 * @return void
 */
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
	if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
		$validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
	}

	if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
		$validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
	}


	if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
		$validation_errors->add( 'billing_phone_error', __( '<strong>Error</strong>: Phone is required!.', 'woocommerce' ) );
	}
}

add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );


/**
 * Save the extra register fields.
 *
 * @param  int  $customer_id Current customer ID.
 *
 * @return void
 */
function wooc_save_extra_register_fields( $customer_id ) {
	if ( isset( $_POST['billing_first_name'] ) ) {
		// WordPress default first name field.
		update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );

		// WooCommerce billing first name.
		update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
	}

	if ( isset( $_POST['billing_last_name'] ) ) {
		// WordPress default last name field.
		update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );

		// WooCommerce billing last name.
		update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
	}

	if ( isset( $_POST['billing_phone'] ) ) {
		// WooCommerce billing phone
		update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
	}
}

add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );





// remove Order Notes from checkout field in Woocommerce
add_filter( 'woocommerce_checkout_fields' , 'alter_woocommerce_checkout_fields' );
function alter_woocommerce_checkout_fields( $fields ) {
     //unset($fields['billing']['billing_first_name']); // remove the customer's First Name for billing
     //unset($fields['billing']['billing_last_name']); // remove the customer's last name for billing
     unset($fields['billing']['billing_company']); // remove the option to enter in a company
     //unset($fields['billing']['billing_address_1']); // remove the first line of the address
     //unset($fields['billing']['billing_address_2']); // remove the second line of the address
     unset($fields['billing']['billing_city']); // remove the billing city
     unset($fields['billing']['billing_postcode']); // remove the ZIP / postal code field
     unset($fields['billing']['billing_country']); // remove the billing country
     unset($fields['billing']['billing_state']); // remove the billing state
     //unset($fields['billing']['billing_email']); // remove the billing email address - note that the customer may not get a receipt!
    // unset($fields['billing']['billing_phone']); // remove the option to enter in a billing phone number
     //unset($fields['shipping']['shipping_first_name']);
     //unset($fields['shipping']['shipping_last_name']);
     unset($fields['shipping']['shipping_company']);
     //unset($fields['shipping']['shipping_address_1']);
     //unset($fields['shipping']['shipping_address_2']);
     unset($fields['shipping']['shipping_city']);
     unset($fields['shipping']['shipping_postcode']);
     unset($fields['shipping']['shipping_country']);
     unset($fields['shipping']['shipping_state']);
     unset($fields['account']['account_username']); // removing this or the two fields below would prevent users from creating an account, which you can do via normal WordPress + Woocommerce capabilities anyway
     unset($fields['account']['account_password']);
     unset($fields['account']['account_password-2']);
     //unset($fields['order']['order_comments']); // removes the order comments / notes field
     return $fields;
}




// Add save percent next to sale item prices.
/*add_filter( 'woocommerce_sale_price_html', 'woocommerce_custom_sales_price', 10, 2 );
function woocommerce_custom_sales_price( $price, $product ) {
    $percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
    return $price . sprintf( __(' Giảm %s', 'woocommerce' ), $percentage . '%' );
}*/




// Change empty price
function custom_empty_price( $price, $product ) {
	return __( 'Liên hệ', 'WooCommerce' ) ;
}
add_filter( 'woocommerce_variable_empty_price_html', 'custom_empty_price', 10, 2 );
add_filter( 'woocommerce_empty_price_html', 'custom_empty_price', 10, 2 );



function sk_wcmenucart() {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	//if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'main-menu' !== $args->theme_location )
		//return $menu;

	ob_start();
		global $woocommerce;
		$viewing_cart = __('Xem giỏ hàng', 'hoaquasay');
		$start_shopping = __('Giỏ hàng', 'hoaquasay');
		$cart_url = $woocommerce->cart->get_cart_url();
		$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('(%d) Sản phẩm', '(%d) Sản phẩm', $cart_contents_count, 'hoaquasay'), $cart_contents_count);
		//$cart_total = $woocommerce->cart->get_cart_total();
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		// if ( $cart_contents_count > 0 ) {
			if ($cart_contents_count == 0) {
				$menu_item = '<div class="woocommerce-cart-product">
				<a class="woocommerce-cart-item" href="'. $shop_page_url .'" title="'. $start_shopping .'"><b>Giỏ hàng</b><br/>';
			} else {
				$menu_item = '<div class="woocommerce-cart-product">
				<a class="woocommerce-cart-item" href="'. $cart_url .'" title="'. $viewing_cart .'"><b>Giỏ hàng</b><br/>';
			}

			$menu_item .= '<i class="fa fa-shopping-cart"></i> ';

			$menu_item .= $cart_contents;
			//$menu_item .= $cart_contents.' '. $cart_total; old
			$menu_item .= '</a></div>';
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		 //}
		echo $menu_item;
	//$social = ob_get_clean();
	//return $menu . $social;

}






add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);

function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
        if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}




add_filter( 'wpcf7_support_html5_fallback', '__return_true' );
/**
*Loai bo Sticky post ra khoi Query
*
*/ 
add_action('pre_get_posts','wpse74620_ignore_sticky');
function wpse74620_ignore_sticky($query){
	if(is_home()&& $query->is_main_query())
		$query->set('ignore_sticky_posts',true);
}


function excerpt_home_length( $length ) {
	global $get_meta;
	
	if( !empty( $get_meta[ 'home_exc_length' ][0] ) )
		return $get_meta[ 'home_exc_length' ][0];
	else 
		return 30;
}


function excerpt_home(){
	add_filter( 'excerpt_length', 'excerpt_home_length', 999 );
	echo get_the_excerpt();
}


	/*
	*  function dem so luot view
	*/
    function setpostview($postID){
		$count_key ='post_views_count';
		$count = get_post_meta($postID, $count_key,true);
		if($count==''){
			$count =0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key,'0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
	
	function getpostviews($postID){
		$count_key ='post_views_count';
		$count = get_post_meta($postID, $count_key,true);
		if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key,'0');
			return"0 View";
		}
		return $count.' Lượt xem';
	}
	/*
	*  function register_nav_menus
	*/
	register_nav_menus( array(
		'main-menu' => 'Main Menu',
		'primary-menu' => 'Primary Menu',
		'footer-menu' => 'Footer Menu'
		
	) ); 
	

add_image_size ('featured_thumbnail' , 284, 180,  true); 
add_image_size ('category_thubnail' , 185, 125,  true);
add_image_size ('post_thumbnail' , 115, 86,  true);
add_image_size ('most_thumbnail' , 62,42,  true);
add_image_size ('small_thumbnail' , 82,62,  true);	
	
if (!isset($content_width))
{
    $content_width = 1000;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
   add_theme_support( 'post-thumbnails', array( 'post', 'page', 'movie', 'product' ) );
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 600, '300', true); // Medium Thumbnail

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0',true); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1',true); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!
		
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    //if (is_page('pagenamehere')) {
        //wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
       // wp_enqueue_script('scriptname'); // Enqueue it!
    //}
	//wp_register_script('jquery-1.10.2', get_template_directory_uri() . '/js/jquery-1.10.2.js', array('jquery'), '1.10.2'); // Conditional script(s)
     // wp_enqueue_script('jquery-1.10.2'); // Enqueue it!
		
	wp_register_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.10.2',true); // Conditional script(s)
        wp_enqueue_script('bootstrap.min'); // Enqueue it
			
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    //wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
   // wp_enqueue_style('normalize'); // Enqueue it!
	
	wp_register_style('bootstrap.min', get_template_directory_uri() . '/style/bootstrap.min.css', array(), '3.3.4', 'all');
    wp_enqueue_style('bootstrap.min'); // Enqueue it!
	
    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('style'); // Enqueue it!
	
	wp_register_style('font-awesome', get_template_directory_uri() . '/style/font-awesome.css', array(), '4.3.0', 'all');
    wp_enqueue_style('font-awesome'); // Enqueue it!
	
	wp_register_style('woocommerce-layout-override', get_template_directory_uri() . '/style/woocommerce-layout-override.css', array(), '', 'all');
    wp_enqueue_style('woocommerce-layout-override'); // Enqueue it!
	
	wp_register_style('woocommerce-override', get_template_directory_uri() . '/style/woocommerce-override.css', array(), '', 'all');
    wp_enqueue_style('woocommerce-override'); // Enqueue it!

}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area Footer First', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-first',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
	
	register_sidebar(array(
        'name' => __('Widget Area Footer Second', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-second',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '...<br/><a rel="nofollow" class="read-more" href="' . get_permalink($post->ID) . '">' . __('Xem chi tiết', 'html5blank') . ' >></a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
//function enable_threaded_comments()
//{
    //if (!is_admin()) {
        //if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            //wp_enqueue_script('comment-reply');
        //}
    //}
//}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
//add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
//add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

//to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

	// Shortcode Demo with simple <h2> tag
	function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
	{
		return '<h2>' . $content . '</h2>';
	}

	function custom_excerpt_length( $length ) {
		return 45;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	//add excerpt in page
	add_action( 'init', 'my_add_excerpts_to_pages' );
		function my_add_excerpts_to_pages() {

			add_post_type_support( 'page', 'excerpt' );

		}

  function showalltags() {
	$catid = get_cat_ID(single_cat_title("",false));
	$catobj = get_category($catid);
	$catslug = $catobj->slug;
	$catParentID = $catobj->parent;//var_dump($catslug);
	
	$tags = get_tags();
	$html='';
	$html .="<div class='postsTags'>";
	
		foreach ($tags as $tag){
			$tag_link = esc_url(get_tag_link($tag->term_id));
			
			if( $catParentID !=0 ){
				
				$html .= "<a href='{$tag_link}?names={$catslug}&tags={$tag->slug}' title='{$tag->name}' class='{$tag->slug}'>";
				$html .= "{$tag->name}</a>";
				
			}
		}
		
	$html .="</div>";
	
	echo $html;
 
}
	/**
	 * Xoa cot mo ta mac dinh trong admin category
	 *
	 */
	function jw_remove_taxonomy_description($columns)
	{

	 if ( !isset($_GET['taxonomy']) || $_GET['taxonomy'] != 'category' )
	 return $columns;
	 
	 // Xoa bo cot mo ta
	 if ( $posts = $columns['description'] ){ unset($columns['description']); }
	 return $columns;
	}
	add_filter('manage_edit-category_columns','jw_remove_taxonomy_description');	
	
	//wpseo_canonical
	add_filter( 'wpseo_canonical', '__return_false' );
	
	
	/**
	* Them Font Size trong Editor Tinnymce  
	*
	*/
	function register_additional_button($buttons) {
	   array_unshift($buttons, 'fontsizeselect' ,'sup', 'sub');
	   return $buttons;
	}
	add_filter('mce_buttons_2', 'register_additional_button');
	
	
		// Remove each style one by one
		/*add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
		function jk_dequeue_styles( $enqueue_styles ) {
			//unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
			unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
			//unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
			return $enqueue_styles;
		}

		// Or just remove them all in one line
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );*/

?>