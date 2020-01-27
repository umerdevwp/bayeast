<?php
/**
 * The template for displaying all projects
 *
 * Template Name: Video Gallery
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */
 get_header();

 ?>
 <div id="primary" class="content-area">
 	<main id="main" class="site-main">
   <?php get_template_part( 'template-parts/hero' );?>

    	<div class="posts-group">
     		<div class="posts-filter_container">
     		</div>

        <div class="post-category_container container">
          <h2 class="category-title"></h2>
          <p class="category-description"></p>
        </div>

        <div class="posts-sort_container">
        </div>

     		<div class="video-listing_container container">

     		</div>

         <div class="posts-pagination_container container">
     		</div>
    	</div>
 	</main><!-- #main -->
 </div><!-- #primary -->
 <?php
 // get_sidebar();
 get_footer();
