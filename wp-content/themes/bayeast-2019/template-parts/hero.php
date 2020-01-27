<?php
/**
 * Template part for the Hero Area
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */

?>
<?php
$heroContent = get_field('hero_content');
$additionalContent = get_field('additional_content');
$page_id = get_queried_object_id();
$heroImage = wp_get_attachment_url(get_post_thumbnail_id($page_id));

?>
<div class="hero-area <?php if ($additionalContent) : ?>has-additional-content<?php endif; ?>" style="background-image: url('<?php echo $heroImage; ?>')">
  <div class="container">
    <div class="hero-area_hero-content">
      <?php the_title( '<h1>', '</h1>' ); ?>
      <?php if ($heroContent) :
        echo $heroContent;
      endif;?>
    </div>
    <?php if ($additionalContent) : ?>
      <div class="hero-area_additional-content">
        <?php echo $additionalContent; ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="hero-overlay"></div>
</div><!-- .hero-area -->
