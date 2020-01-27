<?php
/**
 * The template for displaying all pages
 *
 * Template Name: Community Info & Statistics
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */


get_header();
?>

<?php get_template_part( 'template-parts/hero' );?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php $args = array(
        'post_type' => 'community',
        'posts_per_page' => -1,
    );

    $locations_query = new WP_QUERY($args);

    if ( $locations_query->have_posts() ) {

    ob_start(); ?>

    <div class="acf-map" style="overflow: hidden; position: relative;">

        <?php while ( $locations_query->have_posts() ) {
            $locations_query->the_post();
            $address = get_field('address');
            $type_icon = get_stylesheet_directory_uri().'/images/gray-marker.png';
            ?>

            <div class="marker" data-lat="<?php echo $address['lat']; ?>" data-lng="<?php echo $address['lng']; ?>" data-img="<?php echo $type_icon; ?>">
							<div class="community-info">
								<div class="container">
									<?php
										$title = get_the_title();
									?>

									<h2><?php echo $title; ?></h2>

									<?php if( have_rows('statistic') ): ?>
										<div class="community_stats">
											<?php while ( have_rows('statistic') ) : the_row(); ?>
												<div class="stat">
											    <span class="stat_number"><?php the_sub_field('number'); ?></span>
													<span class="stat_label"><?php the_sub_field('title'); ?></span>
												</div>
										  <?php endwhile; ?>
										</div>
										<?php else :
										endif;
									?>

									<?php if( have_rows('pdf_files') ): ?>
										<div class="community_pdfs">
											<?php while ( have_rows('pdf_files') ) : the_row();
												$file = get_sub_field('pdf_file'); ?>
												<a href="<?php echo $file['url']; ?>" class="button" download><?php the_sub_field('pdf_title'); ?><i class="fas fa-download"></i></a>
											<?php endwhile; ?>
										</div>
										<?php else :
										endif;
									?>

									<div id="demoTab">

										 <?php	if( have_rows('tabbed_content') ): ?>
											 <ul class="tabs">
												 <?php
													 $i = 1;
													 while ( have_rows('tabbed_content' ) ) : the_row();
														 echo '<li rel="tab-' . $i . '">' . get_sub_field( "tab_label" ) . '</li>';
														 $i++;
													 endwhile;
												 ?>
											 </ul>
											 <?php $i = 1; ?>


											 <div class="tab_container">


												 <?php while ( have_rows('tabbed_content') ) : the_row();

													 echo '<span class="tab_drawer_heading" rel="tab-' . $i . '">' . get_sub_field( "tab_label") .'</span>';

													 echo '<div id="tab-' . $i . '" class="tab_content">';

														 $tabContent = get_sub_field('tab_content'); ?>

															 <?php echo $tabContent; ?>


													 <?php echo '</div>';
													 $i++;
												 endwhile; ?>
											 </div>

										 <?php else :
												 // no rows found
										 endif;?>
								 </div>

								</div>
							</div>
            </div>



    	<?php } ?>
    </div>

    <?php wp_reset_postdata();

    }?>

		<div class="community-content"></div>


		</main><!-- #main -->
	</div><!-- #primary -->


<?php

get_footer();
