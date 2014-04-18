<?php
/**
 * Displaying 404 pages (Not Found).
 *
 * @package vertiMagazine theme
 */
?>
<?php get_header(); ?>

	<div id="wrap">
		<div id="content">
			<p><?php _e( 'Oops! That page can&rsquo;t be found.', 'vertiMagazine' ); ?></p>
			<p><?php _e( 'It looks like nothing was found at this location', 'vertiMagazine' ); ?></p>		
		</div><!-- #content -->
        <?php get_sidebar(); ?>
	</div><!-- #wrap -->
    
<?php get_footer(); ?>