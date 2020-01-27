<?php
/**
 * Single Event Meta (Additional Fields) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/pro/modules/meta/additional-fields.php
 *
 * @package TribeEventsCalendarPro
 * @version 4.4.28
 */

if ( ! isset( $fields ) || empty( $fields ) || ! is_array( $fields ) ) {
	return;
}



?>

<div class="tribe-events-additional">


	<?php foreach ( $fields as $name => $value ): ?>
		<div class="tribe-events-additional-info">
			<?php
				// This can hold HTML. The values are cleansed upstream
				echo $value;
			?>
		</div>
	<?php endforeach ?>
</div>
