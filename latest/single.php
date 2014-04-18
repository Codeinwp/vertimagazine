<?php
/**
 * The Template for displaying all single posts.
 *
 * @package vertiMagazine theme
 */
?>
<?php get_header(); ?>
<div id="wrap">
	<div id="content">

		<?php get_template_part( 'loop', 'single' ); ?>

	</div><!-- #content -->
    <?php get_sidebar(); ?>
</div><!-- #wrap -->
<?php get_footer(); ?>