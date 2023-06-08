<?php
/**
 * sharksbilliardleague functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sharksbilliardleague
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sharksbilliardleague_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on sharksbilliardleague, use a find and replace
		* to change 'sharksbilliardleague' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sharksbilliardleague', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'sharksbilliardleague' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sharksbilliardleague_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'sharksbilliardleague_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sharksbilliardleague_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sharksbilliardleague_content_width', 640 );
}
add_action( 'after_setup_theme', 'sharksbilliardleague_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sharksbilliardleague_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sharksbilliardleague' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sharksbilliardleague' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sharksbilliardleague_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sharksbilliardleague_scripts() {
	wp_enqueue_style( 'sharksbilliardleague-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'sharksbilliardleague-style', 'rtl', 'replace' );

	wp_enqueue_script( 'sharksbilliardleague-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sharksbilliardleague_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*
 * -----------------------------------------------------------------------------
 * Load Stylesheets
 * -----------------------------------------------------------------------------
*/
function load_stylesheets() {
  wp_register_style( 'slick', get_template_directory_uri() . '/assets/css/slick/slick.css', array(), 1, 'all');
  wp_enqueue_style('slick');

	wp_register_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css', array(), 1, 'all');
  wp_enqueue_style('reset');

	wp_register_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), 1, 'all');
  wp_enqueue_style('main');

	wp_register_style( 'mobile', get_template_directory_uri() . '/assets/css/mobile.css', array(), 1, 'all');
  wp_enqueue_style('mobile');

	wp_register_style( 'font', get_template_directory_uri() . '/assets/css/font.css', array(), 1, 'all');
  wp_enqueue_style('font');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

/*
 * -----------------------------------------------------------------------------
 * Load Javascripts
 * -----------------------------------------------------------------------------
*/
function load_scripts() {
  wp_register_script('yourjsfile', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), true);
  wp_enqueue_script('yourjsfile');

  wp_register_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array(), 1, 1, 1);
  wp_enqueue_script('slick');

  wp_register_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), 1, 1, 1);
  wp_enqueue_script('scripts');
}
add_action('wp_enqueue_scripts', 'load_scripts');




add_action('admin_head', 'wpds_custom_admin_post_css');
function wpds_custom_admin_post_css() {

		global $post_type;

		if ($post_type == 'sharksadvertisements') {
				echo "<style>#edit-slug-box {display:none;}</style>";
		}
}

function sharksadvertisements_disable_new_posts() {
	// Hide sidebar link
	global $submenu;
	unset($submenu['edit.php?post_type=sharksadvertisements'][10]);
	// Hide link on listing page
	if (isset($_GET['post_type']) && $_GET['post_type'] == 'sharksadvertisements') {
		echo '<style type="text/css">
		#favorite-actions, .add-new-h2, .tablenav, .page-title-action, .trash { display:none; }
		</style>';
	}
}
add_action('admin_menu', 'sharksadvertisements_disable_new_posts');

// HIDE ADD NEW BUTTON IN CUSTOM POST TYPE
$args = array(
	'label'               => __( 'Custom Post Type', 'text_domain' ),
	'description'         => __( 'Custom Post Type', 'text_domain' ),
	'capability_type' => 'custom_post_type',
	'map_meta_cap'=>true,
	'capabilities' => array(
			'create_posts' => true
	)
);
register_post_type( 'custom_post_type', $args );


add_action('load-post.php', 'remove_add_button');

function remove_add_button() {
   if( get_post_type($_GET['post']) == 'sharksadvertisements' ) {
     global $wp_post_types;

     $wp_post_types['sharksadvertisements']->map_meta_cap = true;
     $wp_post_types['sharksadvertisements']->cap->create_posts = false;
   }
}

// HIDE TOOLBAR TO ALL USER EXCEPT ADMIN
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}


// CUSTOM REGISTRATION PAGE
/*
*register form by redpishi.com
*[register role="subscriber"] role: shop_manager | customer | subscriber | contributor | author | editor | administrator
*/
function red_registration_form($atts) {
	$atts = shortcode_atts(array('role' => 'subscriber',), $atts, 'register');
 
	$role_number = $atts["role"];

	if ($role_number == "shop_manager" ) { 
		$reg_form_role = (int) filter_var(AUTH_KEY, FILTER_SANITIZE_NUMBER_INT); 
	}  elseif ($role_number == "customer" ) { 
		$reg_form_role = (int) filter_var(SECURE_AUTH_KEY, FILTER_SANITIZE_NUMBER_INT); 
	} elseif ($role_number == "contributor" ) { 
		$reg_form_role = (int) filter_var(NONCE_KEY, FILTER_SANITIZE_NUMBER_INT); 
	} elseif ($role_number == "author" ) { 
		$reg_form_role = (int) filter_var(AUTH_SALT, FILTER_SANITIZE_NUMBER_INT); 
	} elseif ($role_number == "editor" ) { 
		$reg_form_role = (int) filter_var(SECURE_AUTH_SALT, FILTER_SANITIZE_NUMBER_INT); 
	} elseif ($role_number == "administrator" ) { 
		$reg_form_role = (int) filter_var(LOGGED_IN_SALT, FILTER_SANITIZE_NUMBER_INT);
	} else { 
		$reg_form_role = 1001; 
	} 
 
 if(!is_user_logged_in()) { 
	 $registration_enabled = get_option('users_can_register');
	 if($registration_enabled) {
		 $output = red_registration_fields($reg_form_role);
	 } else {
		 $output = __('<p>User registration is not enabled</p>');
	 }
	 return $output;
 }  $output = __('<p>You already have an account on this site, so there is no need to register again.</p>');
 return $output;
}

add_shortcode('register', 'red_registration_form');

function red_registration_fields($reg_form_role) {	?> 
<?php ob_start(); ?>
	<form id="red_registration_form" action="" method="POST">
		
		<div class="section-signin-wrap">
			<a href="<?php echo home_url(); ?>" class="nav-logo">
				<img src="<?= get_template_directory_uri().'/assets/logo.svg' ?>" alt="Sharsk logo">
			</a>

			<div class="wrap-login">
				<h2 class="mb-1">SIGNUP</h2>

				<?php red_register_messages(); ?>

				<div>
					<label for="red_user_login"><?php _e('Username'); ?></label>
					<input name="red_user_login" id="red_user_login" class="red_input" placeholder="" type="text"/>
				</div>
				<div>
					<label for="red_user_email"><?php _e('Email'); ?></label>
					<input name="red_user_email" id="red_user_email" class="red_input" placeholder="" type="email"/>
				</div>
				<div>
					<label for="password"><?php _e('Password'); ?></label>
					<input name="red_user_pass" id="password" class="red_input" placeholder="" type="password"/>
				</div>
				<div>
					<label for="password_again"><?php _e('Password Confirmation'); ?></label>
					<input name="red_user_pass_confirm" id="password_again" placeholder="" class="red_input" type="password"/>
				</div>

				<span class="terms-and-conition">By pressing SIGN UP you agree with the Terms &amp; <br> Condition and Privacy Rules of SHARKS</span>

				<div class="mt-1">
					<input type="hidden" name="red_csrf" value="<?php echo wp_create_nonce('red-csrf'); ?>"/>
					<input type="hidden" name="red_role" value="<?php echo $reg_form_role; ?>"/>
					<input type="submit" id="wp-submit" class="button" value="<?php _e('SIGN UP'); ?>"/>
				</div>

				<p class="text-center mt-1">Already have an account? <a href="/login">Login</a></p>
			</div>
		</div>

		
	</form>  

	<script>
		$('#red_user_login').focus();
	</script>
	 
	 <style>
		.red_errors {
			width: 100%;
			max-width: 365px;
			margin: auto;
			line-height: 1.4em;
			color: #ff5a4e;
			margin-bottom: 15px;
		}
	
	</style>
<?php return ob_get_clean(); }

function red_add_new_user() {
	 if (isset( $_POST["red_user_login"] ) && wp_verify_nonce($_POST['red_csrf'], 'red-csrf')) {
		 $user_login		= sanitize_user($_POST["red_user_login"]);
		 $user_email		= sanitize_email($_POST["red_user_email"]);
		 $user_pass		= $_POST["red_user_pass"];
		 $pass_confirm 	= $_POST["red_user_pass_confirm"];
	 $red_role 		= sanitize_text_field( $_POST["red_role"] );	
		 
	 if ($red_role == (int) filter_var(AUTH_KEY, FILTER_SANITIZE_NUMBER_INT) ) { $role = "shop_manager"; }  elseif ($red_role == (int) filter_var(SECURE_AUTH_KEY, FILTER_SANITIZE_NUMBER_INT) ) { $role = "customer"; } elseif ($red_role == (int) filter_var(NONCE_KEY, FILTER_SANITIZE_NUMBER_INT) ) { $role = "contributor"; } elseif ($red_role == (int) filter_var(AUTH_SALT, FILTER_SANITIZE_NUMBER_INT)  ) { $role = "author"; } elseif ($red_role ==  (int) filter_var(SECURE_AUTH_SALT, FILTER_SANITIZE_NUMBER_INT) ) { $role = "editor"; }   elseif ($red_role == (int) filter_var(LOGGED_IN_SALT, FILTER_SANITIZE_NUMBER_INT) ) { $role = "administrator"; } else { $role = "subscriber"; }
		 
		 if(username_exists($user_login)) {
				 red_errors()->add('username_unavailable', __('Username already taken'));
		 }
		 if(!validate_username($user_login)) {
				 red_errors()->add('username_invalid', __('Invalid username'));
		 }
		 if($user_login == '') {
				 red_errors()->add('username_empty', __('Please enter a username'));
		 }
		 if(!is_email($user_email)) {
				 red_errors()->add('email_invalid', __('Invalid email'));
		 }
		 if(email_exists($user_email)) {
				 red_errors()->add('email_used', __('Email already registered'));
		 }
		 if($user_pass == '') {
				 red_errors()->add('password_empty', __('Please enter a password'));
		 }
		 if($user_pass != $pass_confirm) {
				 red_errors()->add('password_mismatch', __('Passwords do not match'));
		 }    
		 $errors = red_errors()->get_error_messages();    
		 if(empty($errors)) {         
				 $new_user_id = wp_insert_user(array(
								 'user_login'		=> $user_login,
								 'user_pass'	 		=> $user_pass,
								 'user_email'		=> $user_email,
								 'user_registered'	=> date('Y-m-d H:i:s'),
								 'role'				=> $role
						 )
				 );
				 if($new_user_id) {
						 wp_new_user_notification($new_user_id);              
						 wp_set_auth_cookie(get_user_by( 'email', $user_email )->ID, true);
						 wp_set_current_user($new_user_id, $user_login);	
						 do_action('wp_login', $user_login, wp_get_current_user());            
						 wp_redirect(home_url()); exit;
				 }         
		 } 
 }
}
add_action('init', 'red_add_new_user');
function red_errors(){
	 static $wp_error; 
	 return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}
function red_register_messages() {
 if($codes = red_errors()->get_error_codes()) {
	 echo '<div class="red_errors">';
			foreach($codes as $code){
					 $message = red_errors()->get_error_message($code);
					 echo '<span class="error">' . $message . '</span><br/>';
			 }
	 echo '</div>';
 }	
}


// CUSTOM LOGIN PAGE

add_filter( 'the_content', 'redpihi_custom_login' );
function redpihi_custom_login( $content ) {
$fullScreen = 1;	
$loging_users = '<p>Hello '.wp_get_current_user()->user_login.'! You are logged in.</p>';
if (is_page(get_page_by_title( 'login' )->ID)) {  
	if (is_user_logged_in()) {
	
		return	$content.$loging_users;	  } else {   
if ($fullScreen == 1) echo '<style> </style>';	?>

<div class="section-signin-wrap">
	<a href="<?php echo home_url(); ?>" class="nav-logo">
		<img src="<?= get_template_directory_uri() . './assets/logo.svg' ?>" alt="Sharsk logo">
	</a>

	<div class="wrap-login">
		<h2 class="mb-1">HI! LET'S LOGIN <br> YOUR ACCOUNT</h2>

		<?php	wp_login_form( 
			array( 
				'echo' => true ,
				'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] .'/' ,
				'label_email' => __( 'Your Email ' ),
				'label_password' => __( 'Your Password' ),
				'label_remember' => __( 'Remember Me' )
			)
		);}?> 
	
		<!-- <a href="#" class="text-center">Forgot Password</a> -->
		<div class="or">or</div>

		<a href="/register" class="btn btn-orange mt-1">SIGN UP FOR AN ACCOUNT</a>
	</div>
</div>


	
<style>
</style>

<script>
const urlParams = new URLSearchParams(window.location.search); 
const login = urlParams.get('login');
if (login == "failed") { 
	
 }
$('#user_login').focus();
</script>
  
<?php } else {
	return $content ;
}
}


// WIP LOGIN PAGE REDIRECTION AND VALIDATIONS

/**
 * Custom Login Page Actions
 */
// Change the login url sitewide to the custom login page
add_filter( 'login_url', 'custom_login_url', 10, 2 );
// Redirects wp-login to custom login with some custom error query vars when needed
add_action( 'login_head', 'custom_redirect_login', 10, 2 );
// Updates login failed to send user back to the custom form with a query var
add_action( 'wp_login_failed', 'custom_login_failed', 10, 2 );
// Updates authentication to return an error when one field or both are blank
add_filter( 'authenticate', 'custom_authenticate_username_password', 30, 3);
// Automatically adds the login form to "login" page
add_filter( 'the_content', 'custom_login_form_to_login_page' );

/**
 * Custom Login Page Functions
 */
function custom_login_url( $login_url='', $redirect='' )
{
    $page = get_page_by_path('login');
    if ( $page )
    {
        $login_url = get_permalink($page->ID);

        if (! empty($redirect) )
            $login_url = add_query_arg('redirect_to', urlencode($redirect), $login_url);
    }
    return $login_url;
}
function custom_redirect_login( $redirect_to='', $request='' )
{
    if ( 'wp-login.php' == $GLOBALS['pagenow'] )
    {
        $redirect_url = custom_login_url();

        if (! empty($_GET['action']) )
        {
            if ( 'lostpassword' == $_GET['action'] )
            {
                return;
            }
            elseif ( 'register' == $_GET['action'] )
            {
                $register_page = get_page_by_path('register');
                $redirect_url = get_permalink($register_page->ID);
            }
        }
        elseif (! empty($_GET['loggedout'])  )
        {
            $redirect_url = add_query_arg('action', 'loggedout', custom_login_url());
        }

        wp_redirect( $redirect_url );
        exit;
    }
}
function custom_login_failed( $username ) {
    $referrer = wp_get_referer();

    if ( $referrer && ! strstr($referrer, 'wp-login') && ! strstr($referrer, 'wp-admin') )
    {
        if ( empty($_GET['loggedout']) )
        wp_redirect( add_query_arg('action', 'failed', custom_login_url()) );
        else
        wp_redirect( add_query_arg('action', 'loggedout', custom_login_url()) );
        exit;
    }
}
function custom_authenticate_username_password( $user, $username, $password )
{
    if ( is_a($user, 'WP_User') ) { return $user; }

    if ( empty($username) || empty($password) )
    {
        $error = new WP_Error();
        $user  = new WP_Error('authentication_failed', __('<strong>ERROR</strong>: Invalid username or incorrect password.'));

        return $error;
    }
}
function custom_login_form_to_login_page( $content )
{
    if ( is_page('login') && in_the_loop() )
    {
        $output = $message = "";
        if (! empty($_GET['action']) )
        {
            if ( 'failed' == $_GET['action'] )
                $message = "There was a problem with your username or password.";
            elseif ( 'loggedout' == $_GET['action'] )
                $message = "You are now logged out.";
            elseif ( 'recovered' == $_GET['action'] )
                $message = "Check your e-mail for the confirmation link.";
        }

        if ( $message ) $output .= '<div class="message"><p>'. $message .'</p></div>';
        $output .= wp_login_form('echo=0&redirect='. site_url());
        $output .= '<a href="'. wp_lostpassword_url( add_query_arg('action', 'recovered', get_permalink()) ) .'" title="Recover Lost Password">Lost Password?</a>';

        $content .= $output;
    }
    return $content;
}


// DISABLE SUBSCRIBER USER TO DASHBOARD PAGE
add_action('admin_init', 'disable_dashboard');

function disable_dashboard() {
    if (current_user_can('subscriber') && is_admin()) {
			wp_redirect(home_url()); exit;
    }
}


