<?php
namespace BayeastBlog;

require_once( 'helpers/BlogListingHelper.php' );

class BayeastBlog {
    private $blogListingHelper;

    function __construct() {
        add_action( 'rest_api_init', array($this, 'register_rest_endpoint') );
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts') );
    }

    //register our portfolio listing endpoint with WP's API
    //this will create the endpoint /wp-json/projects/v1/get_portfolio_listing
    function register_rest_endpoint(){
        register_rest_route('blogs/v1', '/blogs_list/', array(
          'methods' => 'POST',
          'callback' => array($this, 'get_blog_listing'),
          'args' => array (
            'filter' => array (
                'required' => true,
                'default' => 'All'
            ),
            'search' => array (
                'required' => true,
                'default' => ''
            ),
            'paged' => array (
              'required' => false
            ),
            'ppp' => array(
              'required' => false
            )
          )
        ));
    }

    function enqueue_scripts(){
        //include our ProjectHelper JS object
        //if(is_page_template('page-news.php')){
          if(is_page_template('page-news.php')){
            wp_enqueue_script( 'load_more_blog', get_template_directory_uri() . '/theme_infrastructure/CustomEndpoints/Blog/js/BayeastBlog.js');
          }
          //expose our endpoint and relevant API vars to our javascript
          wp_localize_script( 'load_more_blog', 'rest_object',
            array(
              'api_nonce' => wp_create_nonce( 'wp_rest' ),
              'api_url'   => site_url('/wp-json/rest/v1/'),
              'get_blog_listing' => site_url('/wp-json/blogs/v1/blogs_list'),
            )
          );
        //}
    }

    //function that's actually executed when the endpoint is hit
    public function get_blog_listing($request){
        $params = $request->get_params();
        //make sure we create a new project listing helper for each request
        if(!empty($this->blogListingHelper)){
            $this->blogListingHelper = null;
        }

        $this->blogListingHelper = new \BayeastBlog\Helpers\BlogListingHelper();
        $response = $this->blogListingHelper->getBlogListing($params);
        return new \WP_REST_Response( array('blog_data' => $response), 200 );
    }

}
new BayeastBlog();
