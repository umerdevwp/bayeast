<?php
/**
 * Template part for the Homepage Logged In Hero Slider
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */
$gallery = get_field('logged_in_hero_slides');
if ($gallery) {
    $sum             = sizeOf($gallery);
    $index           = rand(0, $sum - 1);
    $backgroundImage = $gallery[$index]['logged_in_hero_background']['url'];
    $heading         = $gallery[$index]['hero_slide_heading'];
    $caption         = $gallery[$index]['hero_slide_content'];
    $buttonText      = $gallery[$index]['hero_slide_button_text'];
    $buttonLink      = $gallery[$index]['hero_slide_button_link'];
}
?>
<section class="logged-in-home-hero" style="background-image: url('<?php echo $backgroundImage; ?>')">
  <div class="container">
  	<div class="logged-in-home-hero__content">
      <?php if ($heading) :?>
  		    <h1><?php echo $heading; ?></h1>
      <?php endif; ?>
      <?php if ($caption) :?>
  		    <p><?php echo $caption; ?> </p>
      <?php endif; ?>
      <?php if ($buttonText) :?>
    		<a class="button-inverse" href="<?php echo $buttonLink; ?>">
          	<?php echo $buttonText; ?>
    		</a>
      <?php endif; ?>
  	</div>
  </div>
</section>
