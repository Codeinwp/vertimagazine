<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package vertiMagazine theme
 */
?>
<?php get_header(); ?>

	<div id="wrap">
		<div id="content">
        	<?php 
				if (have_posts()) : while (have_posts()) : the_post();  //Get posts
			?>
            <div class="post">
				
				<?php 
					$titlupost = get_the_title();
					$posturl = get_permalink();
				?>
				
				<div class="date">in 
					<?php
					$category = get_the_category(); 
					if(!empty($category))
						echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
					?> 
					- <?php the_time('d M, Y') ?>
				</div>
				<div class="author">by <?php the_author(); ?> <span> - <?php comments_number( 'no comments', 'one comment', '% comments' ); ?></span></div><div class="clearfix"></div>
				<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
				<div class="content">
                	<?php the_content(); ?>
                </div>
			</div><!--/post-->
			<?php comments_template( '', true ); ?>
			<?php endwhile; ?>
	        <?php else : ?>
            404 Nothing here. Sorry.
	        <?php endif; ?>
        </div>
       	<?php get_sidebar(); ?>
	</div><!--/wrap-->
<?php get_footer(); ?>