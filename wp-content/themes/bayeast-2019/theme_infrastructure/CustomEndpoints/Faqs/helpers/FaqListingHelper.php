<?php
namespace BayeastFaqs\Helpers;
/**
*
* This class handles the front-end login form for users.
**/
class FaqListingHelper
{
    const POSTS_PER_PAGE = 12; //used as default ppp value
    const POSTS_PER_PAGE_MAX = 15;
    const PAGED = 1; //used as default page number
    const PAGED_MAX = 20; //20 is completely arbitrary

    private $filter_html;
    private $params;

    function __construct(){

    }

    //build our entire portfolio listing (filters, listing, pagination)
    //we send our html data as three separate values for modularity. if we want to move them around for some reason we can
    //'filter_html', 'blogs_html', and 'pagination_html' will be pulled from the response and assigned to their respective containers
    public function getFaqListing($params){
      $post_data = array();

      //save this internally so we're not regenerating it every time we make a reques
      if(empty($this->filter_html)){
        $this->filter_html = $this->getFilterHTML();
      }
      $post_data['filter_html'] = $this->filter_html;

      //assign cleaned params to internal variable so we can use them to generate our listing and pagination
      $this->params = $this->getCleanParams($params);
      $blogs_html = $this->loadMore($this->params);
      $post_data["faq_html"] = $blogs_html;

      $pagination_html = $this->getPaginationHTML($this->params);
      $post_data['pagination_html'] = $pagination_html;

      return $post_data;
    }

    //build HTML for the blog listing
    private function loadMore($params){
        //make sure we are using the corrent query args
        $blogArgs = $this->getQueryArgs($params);
        $blogs_html = '';
        $blogQuery = new \WP_Query($blogArgs);

        //add count whether or not we have posts
        $post_text = $blogQuery->found_posts > 0 ? ' posts' : ' post';

          $blogs_html .= '<ul class="faq-list">';
            if($blogQuery->have_posts()){
                while($blogQuery->have_posts()){
                    $blogQuery->the_post();


                      $blogs_html .= $this->getBlogEntryHTML(get_the_ID());

                }
            }else{
                $blogs_html .= '<div class="no-results"><h2>No FAQs found.</h2></div>';
            }
        $blogs_html .= '</ul>';

        return $blogs_html;
    }

    //build HTML for the pagination below the listing
    private function getPaginationHTML($params){
      // $blogArgs = $this->getQueryArgs($params, false);
      // $blogQuery = new \WP_Query($blogArgs);
      // //if we don't have a posts_per_page set for some reason just throw everything on a single page
      // //otherwise get the ceiling of our total posts divided by our post_per_page param (always rounded up. Ex: 1.1 rounded up to 2)
      // $page_count = empty($params['posts_per_page']) ? 1 : ceil($blogQuery->found_posts / $params['posts_per_page']);
      // //if we have a paged param that's the page we're on, otherwise we're just on the first page
      // $current_page = empty($params['paged']) ? 1 : $params['paged'];
      //
      // $prev_page = $current_page - 1;
      // $next_page = $current_page + 1;
      // $prev_disable_class = '';
      // $next_disable_class = '';
      // if($prev_page <= 0){
      //   $prev_disable_class = ' disabled';
      //   $prev_page = 1;
      // }
      // if($current_page+1 > $page_count){
      //   $next_disable_class = ' disabled';
      //   $next_page = $page_count + 1;
      // }
      //
      // $html = '';
      //   $html .= '<a href="#" class="pagination_link pagination_prev' . $prev_disable_class . '" data-page=' . $prev_page . '><i class="fa fa-caret-left"></i></a>';
      //   $html .= '<span class="pagination_link selected"  data-page=' . $current_page . '>' . $current_page . '</span>';
      //   $html .= '<span class="pagination_total">of ' . $page_count . '</span>';
      //   $html .= '<a href="#" class="pagination_link pagination_next' . $next_disable_class . '" data-page=' . $next_page . '><i class="fa fa-caret-right"></i></a>';
      // return $html;
    }

    //make sure our params aren't total garbage
    private function getCleanParams($params){
      $cleanParams = array();
      if(!empty($params['page'])){
        //parse string value to int or use default values
        $paged = $this->paramToInt($params["page"], self::PAGED, self::PAGED_MAX, self::PAGED);
        $cleanParams['paged'] = $paged;
      }

      if(!empty($params['ppp'])){
        //parse string value to int or use default values
        $ppp = $posts_per_page = $this->paramToInt($params["ppp"], 0, self::POSTS_PER_PAGE_MAX, self::POSTS_PER_PAGE);
        $cleanParams['posts_per_page'] = $ppp;
      }

      if(!empty($params['filter'])){
        $cleanParams['filter'] = htmlspecialchars($params['filter']);
      }


      if(!empty($params['search'])){
        $cleanParams['search'] = htmlspecialchars($params['search']);
      }



      return $cleanParams;
    }

    private function getQueryArgs($params, $has_post_limit = true){
      $blogArgs = array();
      $posts_per_page = -1;
      //this will be false when for our pagination query
      //we need to know the total amount of projects to properly build our pagination
      //if we don't want to limit the posts returned, don't add the posts_per_page or paged params to the query
      if($has_post_limit){
        $blogArgs['paged'] = $params['paged'];
        $posts_per_page = $params['posts_per_page'];
      }
      $blogArgs['post_type'] = 'faq';
      $blogArgs['posts_per_page'] = $posts_per_page;

      //if we are filtering on design or type we need to add each as a taxonomy sub query (these use custom taxonomies)
      if(!empty($params['search'])){
        $blogArgs['s'] = htmlspecialchars($params["search"]);
      }

      if(!empty($params['filter'])){
        $blogArgs['tax_query'] = array(
          array(
            'taxonomy' => 'faq-category',
            'field' => 'term_id',
            'terms' => htmlspecialchars($params["filter"])
          ),
        );
      }

      return $blogArgs;
    }

    //build html for the blog listing filters
    private function getFilterHTML(){
      $catOptions = $this->getUsedCustomTaxonomyValues('faq-category');

      $filter_html = '';
      $filter_html .= '<div class="post-tags container">';
        $filter_html .= '<div class="search">';
        $filter_html .= '<input type="text" name="search" id="select-filter-search" value="" placeholder="Search All FAQs">';
        $filter_html .= '</div>';
        $filter_html .= '<div class="select">';
          $filter_html .= '<select id="select-filter-blogs">';
            $filter_html .= '<option selected value="all">Select a Category</option>';
            if(!empty($catOptions)){
              foreach($catOptions as $option){
                $filter_html .= '<option value="' . $option->id . '">' . $option->name . '</option>';
              }
            }
          $filter_html .= '</select>';
        $filter_html .= '</div>';
        $filter_html .= '<a class="blog-filter-clear"><i class="fas fa-times"></i>Clear</a>';
      $filter_html .= '</div>';

      return $filter_html;
    }

    private function getBlogEntryHTML($post_id){

      $post_title = get_the_title($post_id);
      $faqContent = get_field('faq_answer');

      $blog_html = "";
      $blog_html .= '<li class="faq">';
          $blog_html .= '<div class="collapsible">' . $post_title . '<i class="far fa-chevron-down"></i></div>';
          $blog_html .= '<div class="content">' . $faqContent . '</div>';
      $blog_html .= '</li>';

      return $blog_html;
    }


    //finds all terms that are currently tied to a post for the given taxonomy (CPT)
    //used to generate filter dropdowns
    private function getUsedCustomTaxonomyValues($taxonomy){
      global $wpdb;
      $sql = "SELECT DISTINCT terms1.term_id as id, terms1.name as name
              FROM
                wp_posts as p1
                LEFT JOIN wp_term_relationships as r1 ON p1.ID = r1.object_ID
                LEFT JOIN wp_term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id
                LEFT JOIN wp_terms as terms1 ON t1.term_id = terms1.term_id
              WHERE
                t1.taxonomy = '$taxonomy' AND p1.post_status = 'publish'
              ORDER BY name";

      $results = $wpdb->get_results($sql);
      return $results;
    }

    //convert string param to an integer, make sure values passed are valid
    private function paramToInt($param, $min, $max, $default){
      $paramString = htmlspecialchars($param);
      //if htmlspecialchars returns falsey, return the default value passed in
      if(!empty($paramString)){
        $paramInt = intval($paramString);
        //if the param could not be converted to an int or is out of the allowed range of values, return default
        //otherwise return the param as an int
        if(!empty($paramInt) && $paramInt > $min && $paramInt < $max){
          return $paramInt;
        }
      }

      return $default;
    }

}
