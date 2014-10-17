<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package vertiMagazine theme
 */
?>

<footer>
		<div id="footer_center">
			<div class="footer_item">
				<?php 
					$logo_jos = cwp('logo_jos');
					if(isset($logo_jos) && $logo_jos != ""):
						?>
						<div class="footer_logo">
							<img src="<?php echo $logo_jos; ?>" alt="<?php bloginfo('description'); ?>"/>
						</div>	
						<?php
					endif;
				?>	
				<div class="footer_contact">
					<?php 
						$phone = cwp('phone'); 
						if(isset($phone) && $phone != ''):
							echo '<div class="call"><span>Call us</span><br />'.$phone.'</div>';
						endif;
						$email = cwp('email');
						if(isset($email) && $email != ""):
							echo '<div class="email"><span>Email us</span><br />'.$email.'</div>';
						endif;
					?>
				</div><!--/footer_contact-->
				<?php
					$copyright = cwp('copyright');
					if(isset($copyright) && $copyright != ""):
						?>
						<div class="copyright">
							<?php echo $copyright; ?>
							<a href="https://themeisle.com/themes/vertimagazine/" target="_blank">VertiMagazine</a><?php _e(' powered by ','vertiMagazine'); ?><a href="http://wordpress.org/" target="_blank"><?php _e('WordPress','cwp'); ?></a>				
						</div>
						<?php
					endif;
				?>
			</div><!--/footer_item-->
            <div class="footer_item">
			<?php if ( is_active_sidebar( 'sidebar-footer-1' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
			<?php endif; ?>
            </div>
            <div class="footer_item">
			<?php if ( is_active_sidebar( 'sidebar-footer-2' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
			<?php endif; ?>
            </div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>