<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package vertiMagazine theme
 */
?>
<?php get_header(); ?>

	<div id="wrap">
		<div id="content">
        	<?php

			if ( is_home() ) {
			    // This is a homepage
			} elseif( is_search() )  {
			    echo "<div class='archivetitle'>Search: ".get_search_query()."</div>";
			} else {
				echo "";
			}
			?>
        	<?php 
				$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'order' => 'DESC',
					'paged' => $page
				);
				query_posts( $args );
			
				if (have_posts()) : while (have_posts()) : the_post();  //Get posts
			?>
            <div <?php post_class(); ?>>
				
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
				<?php	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail("small");
} 
				?>
				<div class="excerpt"><?php the_excerpt(); ?></div>
				<div class="readmore"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">read more</a></div><!--/readmore-->
                <p><?php the_tags(); ?></p>
                <?php wp_link_pages(); ?>
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
        </div>    
       	<?php get_sidebar(); ?>
	</div><!--/wrap-->
<?php get_footer(); ?>