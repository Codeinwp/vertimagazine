<?php
/*
Template Name: Full width page
*/
?>
<?php get_header(); ?>

	<div id="wrap">
		<div id="content-fullwidth">
        	<?php 
				if (have_posts()) : while (have_posts()) : the_post();  //Get posts
			?>
            <div class="post">
				
				<?php 
					$titlupost = get_the_title();
					$posturl = get_permalink();
				?>
				
				<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
				<div class="content">
                	<?php the_content(); ?>
                </div>
			</div><!--/post-->
			
			<?php endwhile; ?>
	        <?php else : ?>
            404 Nothing here. Sorry.
	        <?php endif; ?>
        </div>
       	
	</div><!--/wrap-->
<?php get_footer(); ?>