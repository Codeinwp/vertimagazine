<?php
/**
 * The template for displaying Archive pages.
 *
 *
 * @package vertiMagazine theme
 */
?>
<?php get_header();?>

	<div id="wrap">
		<div id="content">
			<div class="archivetitle"><?php single_cat_title(); ?></div>
			
			<?php 
				if (have_posts()) : while (have_posts()) : the_post();  //Get posts
			?>
			<div class="post">
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
				<div class="excerpt"><?php the_excerpt(); ?></div>
				<div class="readmore"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">read more</a></div><!--/readmore-->
			</div><!--/post-->
			<?php endwhile; ?>
   
			<div class="pagination">
			<?php
					if(function_exists('wp_pagenavi')) { 
						wp_pagenavi(); 
					}
					else {
			?>		
						<div class="prev"><?php next_posts_link( __( 'prev', 'vertiMagazine' ) ); ?></div>
	    				<div class="next"><?php previous_posts_link( __( 'next', 'vertiMagazine' ) ); ?></div>
            <?php        
					}
			?>
    		</div><!-- /pagination-->
	        <?php else : ?>
            404 Nothing here. Sorry.
	        <?php endif; ?>
			
		</div><!--/content-->
		<?php get_sidebar(); ?>
	</div><!--/wrap-->
<?php get_footer(); ?>