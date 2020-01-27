<?php
/**
 * Template part for the Hero Area
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */

?>

<?php if( get_field('payment_portal_link_url', 'option') ):  ?>
  <div class="payment-portal">
    <div class="container">
      <h2><?php echo the_field('payment_portal_headine', 'option'); ?></h2>
      <a href="<?php echo the_field('payment_portal_link_url', 'option'); ?>" target="_blank"><?php echo the_field('payment_portal_link_label', 'option'); ?></a>
    </div>
  </div><!-- .hero-area -->
<?php endif; ?>
