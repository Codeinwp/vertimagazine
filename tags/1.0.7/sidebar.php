<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package vertiMagazine theme
 */
?>
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="sidebar" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #sidebar -->
	<?php endif; ?>
