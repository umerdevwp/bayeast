<?php
/**
 * Template part for the Homepage Logged Out Hero Area
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */

$logged_out_hero_image   = wp_get_attachment_url(get_post_thumbnail_id(get_queried_object_id()));
$logged_out_hero_heading = get_field('logged_out_hero_heading');
$logged_out_hero_content = get_field('logged_out_hero_content');
?>
<section class="home-hero" style="background-image: url('<?php echo $logged_out_hero_image; ?>')">
	<div class="container">
		<h1 class="home-hero__header">
			<?php echo $logged_out_hero_heading; ?>
		</h1>
		<p class="home-hero__content">
			<?php echo $logged_out_hero_content; ?>
		</p>
		<div class="home-hero__buttons">
			<?php
					if( have_rows('logged_out_hero_buttons') ): while ( have_rows('logged_out_hero_buttons') ) : the_row(); ?>
						<a class="button-inverse" href="<?php the_sub_field('logged_out_hero_button_link'); ?>">
							<?php the_sub_field('logged_out_hero_button_text'); ?>
						</a>
					<?php endwhile;
					endif;
			?>
		</div>
	</div>
	<div class="home-hero__overlay"></div>
</section>
