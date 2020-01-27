<?php
/**
 * Template part for Quick Links
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */


?>
<?php
  // check if the repeater field has rows of data
  if( have_rows('quick_link_repeater') ): ?>

    <div class="image-with-text_links">

      <?php // loop through the rows of data
        while ( have_rows('quick_link_repeater') ) : the_row();
        $linkLabel = get_sub_field('link_label');
        $linkURL = get_sub_field('link_url'); ?>

        <?php if ( get_sub_field('link_behavior') == 'standard-link' ) : ?>

          <?php if ($linkLabel) : ?>
            <a href="<?php echo $linkURL; ?>" class="quick-link"><?php echo $linkLabel; ?></a>
          <?php endif; ?>

        <?php elseif ( get_sub_field('link_behavior') == 'pdf-download' ) : ?>

          <?php if ($linkLabel) : ?>
            <a href="<?php echo $linkURL; ?>" class="quick-link" download ><?php echo $linkLabel; ?><i class="fas fa-download"></i></a>
          <?php endif; ?>

        <?php elseif ( get_sub_field('link_behavior') == 'new-tab' ) : ?>

          <?php if ($linkLabel) : ?>
            <a href="<?php echo $linkURL; ?>" class="quick-link" target="_blank"><?php echo $linkLabel; ?><i class="fas fa-external-link-alt"></i></a>
          <?php endif; ?>

        <?php endif; ?>

      <?php endwhile; ?>

    </div>

  <?php else :

      // no rows found

  endif; ?>
